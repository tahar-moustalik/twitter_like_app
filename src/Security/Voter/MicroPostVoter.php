<?php

namespace App\Security\Voter;

use App\Entity\MicroPost;
use App\Entity\User;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\AccessDecisionManagerInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\User\UserInterface;

class MicroPostVoter extends Voter
{
    const MICRO_POST_EDIT = "MICRO_POST_EDIT";
    const MICRO_POST_DELETE = "MICRO_POST_DELETE";
    private $decisionManager;
    public function __construct(AccessDecisionManagerInterface  $decisionManager)
    {
        $this->decisionManager = $decisionManager;
    }
    protected function supports($attribute, $subject)
    {
        return in_array($attribute, [self::MICRO_POST_EDIT, self::MICRO_POST_DELETE])
            && $subject instanceof MicroPost;
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        if ($this->decisionManager->decide($token, [User::ROLE_ADMIN])) {
            return true;
        }
        $user = $token->getUser();
        if (!$user instanceof UserInterface) {
            return false;
        }

        // ... (check conditions and return true to grant permission) ...
        // same logic for micro post edit && delete

        return $user->getId() === $subject->getUser()->getId();
    }
}
