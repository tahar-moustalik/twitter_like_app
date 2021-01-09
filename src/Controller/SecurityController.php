<?php


namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Authentication\AuthenticationUtils;

class SecurityController extends AbstractController
{


    /**
     * @Route("/login",name="security_login")
     * @param AuthenticationUtils $authenticationUtils
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function login(AuthenticationUtils $authenticationUtils)
    {
        return $this->render(
            'security/login.html.twig',
            [
            'last_username' => $authenticationUtils->getLastUsername(),
            'error' => $authenticationUtils->getLastAuthenticationError()
        ]
        );
    }

    /**
     * @Route("/logout",name="security_logout")
     */
    public function logout()
    {
    }

    /**
     * @Route("/confirm/{token}",name="security_confirm")
     */
    public function confirm(string $token, UserRepository  $userRepository)
    {
        $user = $userRepository->findOneBy([
            'confirmationToken' => $token
        ]);

        if ($user !== null) {
            $user->setEnabled(true);
            $user->setConfirmationToken('');
            $this->getDoctrine()->getManager()->flush();
        }

        return $this->render('security/confirmation.html.twig', [
            'user' => $user
        ]);
    }
}
