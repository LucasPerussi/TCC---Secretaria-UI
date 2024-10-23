<?php
namespace API\Controller;

use API\Controller\Config;

class CamelCase
{
    public static function Convert($string)
    {
        $string = trim($string);

        // Dividir a string em palavras
        $words = explode(' ', $string);
    
        // Transformar a primeira palavra em minúsculas
        $camelCaseString = strtolower(array_shift($words));
    
        // Capitalizar a primeira letra de cada palavra subsequente e juntar
        foreach ($words as $word) {
            $camelCaseString .= ucfirst(strtolower($word));
        }
    
        return $camelCaseString;
    }
  
}