<?php
namespace API\Model;

use API\Model\Database;
use API\Model\Logger;
use API\Controller\Config;

class PropertyVerifier
{
    public static function check(int $userRef): array
    {

        $conn = Database::connect();
        $userCompany = 0;
        $sql = "SELECT usr_id, usr_company FROM " . Config::TABLE_USERS . "
                WHERE usr_id = '$userRef';";

        $result = mysqli_query($conn, $sql);
        if ($result) {
            if (mysqli_num_rows($result) > 0) {
                while ($user = mysqli_fetch_assoc($result)) {
                    $userCompany = $user["usr_company"];
                }
            }
        }

        $allow_user = ($userRef == $_SESSION["user_id"]);

        $allow_company = ($userCompany == $_SESSION["company_id"]) ||
                        (isset($_SESSION["heroeAction"]) && $_SESSION["heroeAction"]);

        $allow_master = false;
        $allow_admin = false;

        if ($_SESSION["user_role"] == 2) {
            if ($_SESSION["company_id"] == 9999) {
                $allow_master = true;
                $allow_admin = true;
            } else {
                $allow_admin = true;
            }
        }

        if ($_SESSION["user_role"] != 2) {
            $allow_admin = false;
        }

        $allow = [
            "user" => $allow_user,
            "company" => $allow_company,
            "admin" => $allow_admin,
            "master" => $allow_master,
        ];

        $dados = "user " . $allow_user . " company " . $allow_company . " admin " . $allow_admin . " master " . $allow_master;
        Logger::log($_SESSION["user_id"] ?? 9999, $dados , "verifyProperty", "ANALISE" );

        return $allow;

        // return [
        //     "user" => false,
        //     "company" => false,
        //     "admin" => false,
        //     "master" => false
        // ];

    }
}