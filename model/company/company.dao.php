<?php
namespace API\Model;
use API\Model\Logger;
use API\Controller\Config;

class CompanyDAO
{
    public static function Update($campo, $valor, $function, $company){
        // $conn = Database::connect();
        // $sql = "UPDATE " . Config::TABLE_COMPANY . " SET $campo = '$valor' WHERE com_id= '$company'";
        // if (mysqli_query($conn, $sql)) {
        //     Logger::log($_SESSION["user_id"] ?? 9999, $sql, "CompanyDAO UPDATE -  $function", "OK");
        //     return true;
        // } else {
        //     Logger::log($_SESSION["user_id"] ?? 9999, mysqli_error($conn), "CompanyDAO UPDATE - $function", "ERROR");
        //     return false;
        // }
    }
}