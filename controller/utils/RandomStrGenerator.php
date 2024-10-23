<?php
namespace API\Controller;

use API\Controller\Config;
use function API\Fetch\listCompanyId;

class RandomStrGenerator
{
    public static function generate($len_of_gen_str)
    {
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $var_size = strlen($chars);
        $united = '';
        for ($x = 0; $x < $len_of_gen_str; $x++) {
            $random_str = $chars[rand(0, $var_size - 1)];
            $united = $united . $random_str;
        }
        return $united;
    }
    public static function generateNumbers($len_of_gen_str)
    {
        $chars = "1234567890";
        $var_size = strlen($chars);
        $united = '';
        for ($x = 0; $x < $len_of_gen_str; $x++) {
            $random_str = $chars[rand(0, $var_size - 1)];
            $united = $united . $random_str;
        }
        return $united;
    }
    public static function generateComplex($len_of_gen_str)
    {
        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz!@#$%&*()_-+1234567890";
        $var_size = strlen($chars);
        $united = '';
        for ($x = 0; $x < $len_of_gen_str; $x++) {
            $random_str = $chars[rand(0, $var_size - 1)];
            $united = $united . $random_str;
        }
        return $united;
    }

    public static function generateAsset()
    {
        $companySession = $_SESSION["company_id"];
        $len_of_gen_str = 6;
        $company = listCompanyId($companySession);

        if (isset($company["error"])){
            return "ERRO! Contacte o Suporte.";
        }else {
            $companyPrefix = $company["nome"][0] . $company["nome"][1] . $company["nome"][2];
            $companyPrefix = strtoupper($companyPrefix);
        }
        
        $chars = "1234567890";
        $var_size = strlen($chars);
        $united = '';
        for ($x = 0; $x < $len_of_gen_str; $x++) {
            $random_str = $chars[rand(0, $var_size - 1)];
            $united = $united . $random_str;
        }

        $assetCode = $companyPrefix . $companySession .  $united;
        return $assetCode;
    }
}