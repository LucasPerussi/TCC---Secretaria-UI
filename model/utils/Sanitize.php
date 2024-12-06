<?php

namespace API\Model;

use API\Model\Database;
use API\Model\Logger;
use API\Controller\Config;

class Sanitize
{
    public static function clean($input, $att, $function)
    {
        //$conn = Database::connect();

        // SQL SANITIZE
        //$inputSQLClean = mysqli_real_escape_string($conn, $input);

        $inputHTML_SQLClean = strip_tags($input);

        if (strcmp($input, $inputHTML_SQLClean) !== 0) {
            $inputTry = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
            Logger::log($_SESSION["user_id"] ?? 9999, "Houve uma tentativa de cadastro de script no campo $att, da função $function, que foi sanitizada! O código inserido foi: $inputTry, valor salvo: $inputHTML_SQLClean", "Sanitize", "ERROR (XSS)");
        }

        return $inputHTML_SQLClean;
    }

    public static function cleanUpAndCamelCase($name, $lastName)
    {

        // Remove caracteres especiais e mantém apenas letras e números
        $name = preg_replace('/[^a-zA-Z0-9\s]/', '', $name);
        $lastName = preg_replace('/[^a-zA-Z0-9\s]/', '', $lastName);
    
        // Remove espaços em branco antes e depois
        $name = trim($name);
        $lastName = trim($lastName);
    
        // Divide a string em partes (se houver mais de um nome ou sobrenome)
        $partesName = explode(' ', $name);
        $partesLastName = explode(' ', $lastName);
    
        // Coloca cada parte com a primeira letra maiúscula (CamelCase)
        $partesName = array_map('ucfirst', $partesName);
        $partesLastName = array_map('ucfirst', $partesLastName);
    
        // Unir os arrays corretamente
        $united = array_merge($partesName, $partesLastName);
    
        // Junta todas as partes em uma única string
        return implode('', $united);
    }
}    