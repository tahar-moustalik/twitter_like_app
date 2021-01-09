<?php


namespace App\Security;

class TokenGenerator
{
    public function getRandomSecuredToken(int $length = 32)
    {
        if (!isset($length) || intval($length) <= 8) {
            $length = 32;
        }
        $token = openssl_random_pseudo_bytes($length);

        //Convert the binary data into hexadecimal representation.
        $token = bin2hex($token);

        return $token;
    }
}
