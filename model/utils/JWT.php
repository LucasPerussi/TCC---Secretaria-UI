<?php
namespace API\Model;

use API\Model\Database;
use API\Controller\Config;
use API\Model\Logger;


class JWT
{
    public static function Generate($user)
    {
        $payload = [
            'user' => $user,
            'role' => 2,
            'expiration' => "Nunca"
        ];

        $key = "teste";
        $json = json_encode($payload);

        $jwt = \Firebase\JWT\JWT::encode($payload, $key, 'HS256');
        Logger::log(28, $json . " key: " . $key . " JWT gerado: " . $jwt, "JWT Generate", "Analise");

        return $jwt;
       
    }
}

// Framework repo: https://github.com/firebase/php-jwt