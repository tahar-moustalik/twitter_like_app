<?php


namespace App\Exception;

use Symfony\Component\Security\Core\Exception\AccountStatusException;

class AccountDisabledException extends AccountStatusException
{
    public function getMessageKey()
    {
        return 'Your account is disabled, check your email';
    }
}
