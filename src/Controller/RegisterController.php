<?php

namespace App\Controller;

use App\Entity\User;
use App\Event\UserRegisterEvent;
use App\Form\UserType;
use App\Security\TokenGenerator;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class RegisterController extends AbstractController
{

    /**
     * @var EventDispatcherInterface $eventDispatcher
     */
    private $eventDispatcher;

    public function __construct(EventDispatcherInterface $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    /**
     * @Route("/register", name="security_register")
     * @param Request $request
     * @param UserPasswordEncoderInterface $userPasswordEncoder
     * @return \Symfony\Component\HttpFoundation\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function register(
        Request $request,
        UserPasswordEncoderInterface  $userPasswordEncoder,
        TokenGenerator $tokenGenerator
    )
    {
        $user = new User();
        $form = $this->createForm(UserType::class, $user);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $password = $userPasswordEncoder->encodePassword($user, $user->getPlainPassword());
            $user->setPassword($password);
            $user->setConfirmationToken($tokenGenerator->getRandomSecuredToken(30));
            $user->setRoles([User::ROLE_USER]);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($user);
            $entityManager->flush();
            $userRegisterEvent = new UserRegisterEvent($user);

            $this->eventDispatcher->dispatch(
                $userRegisterEvent,
                UserRegisterEvent::NAME
            );
            return $this->redirectToRoute('micro_post_index');
        }

        return $this->render('security/register.html.twig', [
            'form' => $form->createView()
        ]);
    }
}
