<?php
namespace API\Model;

use API\Controller\Config;

class Logger
{
    public static function log($user, $operation, $function, $status)
    {
        // $conn = mysqli_connect(Config::SERVERNAME, Config::USERNAME, Config::DB_PASSWORD, Config::LOGS_DB_NAME);

        // if (!$conn) {
        //     return ("Connection failed: " . mysqli_connect_error());
        // }
    
        // $user = mysqli_real_escape_string($conn, $user);
        // $operation = mysqli_real_escape_string($conn, $operation);
        // $function = mysqli_real_escape_string($conn, $function);
        // $status = mysqli_real_escape_string($conn, $status);

        // $sql = "INSERT INTO " . Config::TABLE_LOGS . "
        // (log_user, log_operation, log_function, log_status) VALUES
        // ('$user', '$operation', '$function', '$status');";

        // if (mysqli_query($conn, $sql)) {
        //     return "sucesso!";
        // } else {
        //     $error_msg = mysqli_error($conn);
        //     $error = true;
        //     return $error_msg;
        // }
    }
}