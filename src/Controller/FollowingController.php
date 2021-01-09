<?php

namespace App\Controller;

use App\Entity\User;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Class FollowingController
 * @package App\Controller
 * @IsGranted("ROLE_USER")
 * @Route("/following")
 */
class FollowingController extends AbstractController
{
    /**
     * @Route("/follow/{id}", name="following_follow")
     * @param User $userToFollow
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function follow(User $userToFollow)
    {

        /** @var User $currentUser */
        $currentUser = $this->getUser();

        if ($userToFollow->getId() !== $currentUser->getId()) {
            $currentUser->addFollowing($userToFollow);
            $this->getDoctrine()->getManager()->flush();
        }
        return $this->redirectToRoute(
            'micro_post_user',
            ['username'=> $userToFollow->getUsername()]
        );
    }

    /**
     * @Route("/unfollow/{id}", name="following_unfollow")
     * @param User $userToUnfollow
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function unfollow(User $userToUnfollow)
    {
        /** @var User $currentUser */
        $currentUser = $this->getUser();
        $currentUser->removeFollowing($userToUnfollow);
        $this->getDoctrine()->getManager()->flush();
        return $this->redirectToRoute(
            'micro_post_user',
            ['username'=> $userToUnfollow->getUsername()]
        );
    }
}
