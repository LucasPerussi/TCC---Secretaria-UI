<?php
namespace API\Model;
use API\Model\Logger;
use API\Model\Database;
use API\Controller\Config;

class UserDAO
{
    public static function Update($campo, $valor, $function, $user){
        $conn = Database::connect();
        $sql = "UPDATE " . Config::TABLE_USERS . " SET $campo = '$valor' WHERE usr_id = '$user'";
        if (mysqli_query($conn, $sql)) {
            Logger::log($_SESSION["user_id"] ?? 9999, $sql, "UserDAO UPDATE -  $function", "OK");
            return true;
        } else {
            Logger::log($_SESSION["user_id"] ?? 9999, mysqli_error($conn), "UserDAO UPDATE - $function", "ERROR");
            return false;
        } 
    }  

    public static function UpdateByUsername($campo, $valor, $function, $user){
        $conn = Database::connect();
        $sql = "UPDATE " . Config::TABLE_CARD . " SET $campo = '$valor' WHERE crd_user = '$user'";
        if (mysqli_query($conn, $sql)) {
            Logger::log($_SESSION["user_id"] ?? 9999, $sql, "UserDAO UPDATE -  $function", "OK");
            return true;
        } else {
            Logger::log($_SESSION["user_id"] ?? 9999, mysqli_error($conn), "UserDAO UPDATE - $function", "ERROR");
            return false;
        } 
    } 
    
    public static function DualUpdate($campo, $valor, $campo2, $valor2, $function, $user){
        $conn = Database::connect();
        $sql = "UPDATE " . Config::TABLE_USERS . " SET $campo = '$valor', $campo2 = '$valor2' WHERE usr_id = '$user'";
        if (mysqli_query($conn, $sql)) {
            Logger::log($_SESSION["user_id"] ?? 9999, $sql, "UserDAO DualUpdate -  $function", "OK");
            return true;
        } else {
            Logger::log($_SESSION["user_id"] ?? 9999, mysqli_error($conn), "UserDAO DualUpdate - $function", "ERROR");
            return false;
        }
    }

    public static function Delete($function, $user){
        $conn = Database::connect();

        $sql = "DELETE FROM " . Config::TABLE_APROVACAO . " WHERE apv_user = $user";
        if (mysqli_query($conn, $sql)) {
            Logger::log($_SESSION["user_id"] ?? 9999, $sql, "UserDAO DELETE -  $function", "OK");
            return true;
        } else {
            Logger::log($_SESSION["user_id"] ?? 9999, mysqli_error($conn), "UserDAO DELETE - $function", "ERROR");
            return false;
        }
    }

}