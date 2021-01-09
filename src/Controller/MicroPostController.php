<?php


namespace App\Controller;

use App\Entity\MicroPost;
use App\Entity\User;
use App\Form\MicroPostType;
use App\Repository\MicroPostRepository;
use App\Repository\UserRepository;
use App\Security\Voter\MicroPostVoter;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\OptimisticLockException;
use Doctrine\ORM\ORMException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class MicroPostController
 * @package App\Controller
 * @Route("/micro-post")
 */
class MicroPostController extends AbstractController
{
    /**
     * @var MicroPostRepository
     */
    private $microPostRepository;
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;
    /**
     * @var EntityManager
     */
    private $entityManager;

    /**
     * @var UserRepository
     */
    private $userRepository;


    /**
     * MicroPostController constructor.
     * @param MicroPostRepository $microPostRepository
     * @param FormFactoryInterface $formFactory
     * @param EntityManagerInterface $entityManager
     */
    public function __construct(
        MicroPostRepository  $microPostRepository,
        FormFactoryInterface $formFactory,
        EntityManagerInterface $entityManager,
        UserRepository  $userRepository
    )
    {
        $this->microPostRepository = $microPostRepository;
        $this->formFactory = $formFactory;
        $this->entityManager = $entityManager;
        $this->userRepository = $userRepository;
    }

    /**
     * @Route("/", name="micro_post_index")
     */
    public function index()
    {
        $currentUser = $this->getUser();
        $usersToFollow = [];
        if ($currentUser instanceof User) {
            $posts = $this->microPostRepository->findAllByUsers($currentUser->getFollowing());
            $usersToFollow = count($posts) === 0 ? $this->userRepository->findAllWithMoreThan5PostsExceptUser($currentUser): [];
            return $this->render('micro-post/index.html.twig', [
                'posts' => $posts,
                'usersToFollow' => $usersToFollow
            ]);
        } else {
            return $this->render('micro-post/index.html.twig', [
                'posts' => $this->microPostRepository->findBy([], ['time' => 'DESC']),
                'usersToFollow' =>  $usersToFollow
            ]);
        }
    }


    /**
     * @Route("/edit/{id}", name="micro_post_edit")
     */
    public function edit(MicroPost $microPost, Request $request)
    {
        $this->denyAccessUnlessGranted(MicroPostVoter::MICRO_POST_EDIT, $microPost);
        $form = $this->formFactory->create(MicroPostType::class, $microPost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            try {
                $this->entityManager->flush();
                $this->addFlash('success', 'Micro Post Updated');

                return $this->redirectToRoute('micro_post_index');
            } catch (OptimisticLockException $e) {
            } catch (ORMException $e) {
            }
        }
        return $this->render('micro-post/add.html.twig', [
            'form' => $form->createView(),
            'action' => "Edit"
        ]);
    }

    /**
     * @Route("/delete/{id}", name="micro_post_delete")
     * @param MicroPost $microPost
     * @throws ORMException
     * @throws OptimisticLockException
     */
    public function delete(MicroPost $microPost)
    {
        $this->denyAccessUnlessGranted(MicroPostVoter::MICRO_POST_EDIT, $microPost);
        $this->entityManager->remove($microPost);
        $this->entityManager->flush();

        $this->addFlash('success', 'Micro Post Deleted');
        return $this->redirectToRoute('micro_post_index');
    }

    /**
     * @Route("/add", name="micro_post_add")
     * @IsGranted("ROLE_USER")
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     * @throws ORMException
     */
    public function add(Request $request)
    {
        $microPost = new MicroPost();
        $microPost->setUser($this->getUser());
        $form = $this->formFactory->create(MicroPostType::class, $microPost);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $this->entityManager->persist($microPost);
            try {
                $this->entityManager->flush();
                $this->addFlash('success', 'Micro Post Created');

                return $this->redirectToRoute('micro_post_index');
            } catch (OptimisticLockException $e) {
            } catch (ORMException $e) {
            }
        }
        return $this->render('micro-post/add.html.twig', [
            'form' => $form->createView(),
            'action' => "Add"
        ]);
    }

    /**
     * @Route("/user/{username}",name="micro_post_user")
     */
    public function userPosts(User $userWithPosts)
    {
        return $this->render('micro-post/user-posts.html.twig', [
            'posts' =>  $userWithPosts->getMicroPosts(),            // lazy loading best method
            'user' => $userWithPosts
        ]);
    }

    /**
     * @Route("/{id}",name="micro_post_post")
     */
    public function post(MicroPost $microPost)
    {
        return $this->render('micro-post/post.html.twig', [
            'post' => $microPost
        ]);
    }
}
