<?php
namespace API\Model;
use API\Model\Logger;
use API\Model\LoggersDatabase;
use API\Controller\Config;

class Timeline
{
    public static function new($user, $reference, $title, $description, $type)
    {
        // $conn = LoggersDatabase::connect();

        // $user = mysqli_real_escape_string($conn, $user);
        // $reference = mysqli_real_escape_string($conn, $reference);
        // $title = mysqli_real_escape_string($conn, $title);
        // $description = mysqli_real_escape_string($conn, $description);
        // $type = mysqli_real_escape_string($conn, $type);

        // if (isset($_SESSION["company_id"])) {
        //     $company = $_SESSION["company_id"];
        // } else {
        //     $company = 9999;
        // }
        // if ($title == "Heroe in Action! 🦸🏻") {
        //     $company = 9999;
        // }

        // $sql = "INSERT INTO " . Config::TABLE_TIMELINE . "
        // (tln_user, tln_ticketReference, tln_title, tln_description, tln_type, tln_company) VALUES
        // ('$user', '$reference', '$title', '$description', '$type', '$company');";


        // if (mysqli_query($conn, $sql)) {
        //     Logger::log($user, $sql, "newTimeline", "OK");
        //     return "sucesso!";
        // } else {
        //     $error_msg =  mysqli_error($conn);
        //     Logger::log($user, $sql, "newTimeline", $error_msg);
        //     return $error_msg;
        // }
    }
}


// PRODUTOS 
// 30 - CADASTRO
// 31 - STATUS
// 32 - MOVIMENTACAO
// 34 - GALERIA
// 39 - EXCLUSAO