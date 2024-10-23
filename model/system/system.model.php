<?php

namespace API\Model;

use API\Model\Database;
use API\Model\Logger;
use API\Controller\Config;
use API\Model\UserModel;


use function API\Fetch\canHaveWppSupport;
use function API\Fetch\getCompanyIdByEmail;



class SystemModel
{
    private $user;
    private $company;
    private $dbConnection;
    private $dbLogsConnection;
    private $dbFilesConnection;
    private $userModel;
    private $username;

    public function __construct()
    {
        $this->userModel = new UserModel();
        if (isset($_SESSION["user_id"])) {
            $this->user = $_SESSION["user_id"];
         
        }
        $this->dbConnection = Database::connect();
    }

    // public function apikey($type, $valid, $apiKeyName, $company, $key): bool
    // {
    //     $type = Sanitize::clean($type, "type", "apikey");
    //     $valid = Sanitize::clean($valid, "valid", "apikey");
    //     $apiKeyName = Sanitize::clean($apiKeyName, "apiKeyName", "apikey");
    //     $company = Sanitize::clean($company, "company", "apikey");
    //     $key = Sanitize::clean($key, "key", "apikey");

    //     $status = 1;



    //     switch ($valid) {
    //         case 1:
    //             // 30 dias
    //             $dataAtual = new \DateTime();
    //             $dataAtual->add(new \DateInterval('P30D'));
    //             $validUntil = $dataAtual->format('Y-m-d H:i');
    //             break;
    //         case 2:
    //             // 60 dias
    //             $dataAtual = new \DateTime();
    //             $dataAtual->add(new \DateInterval('P60D'));
    //             $validUntil = $dataAtual->format('Y-m-d H:i');
    //             break;
    //         case 3:
    //             // 90 dias
    //             $dataAtual = new \DateTime();
    //             $dataAtual->add(new \DateInterval('P60D'));
    //             $validUntil = $dataAtual->format('Y-m-d H:i');
    //             break;
    //         case 4:
    //             // 6 meses
    //             $dataAtual = new \DateTime();
    //             $dataAtual->add(new \DateInterval('P6M'));
    //             $validUntil = $dataAtual->format('Y-m-d H:i');
    //             break;
    //         case 5:
    //             // 1 ano
    //             $dataAtual = new \DateTime();
    //             $dataAtual->add(new \DateInterval('P12M'));
    //             $validUntil = $dataAtual->format('Y-m-d H:i');
    //             break;
    //         case 99:
    //             // Indefinido
    //             $dataAtual = new \DateTime();
    //             $dataAtual->add(new \DateInterval('P10Y'));
    //             $validUntil = $dataAtual->format('Y-m-d H:i');
    //             break;
    //         default:
    //             return "erro";
    //             break;
    //     }

    //     $sql = "INSERT INTO " . Config::TABLE_API_KEYS . "
    //     (api_key, api_type, api_status, api_user, api_company, api_expiration_date, api_name) VALUES
    //     ('$key', '$type','$status','$this->user','$company','$validUntil', '$apiKeyName');";

    //     if (mysqli_query($this->dbConnection, $sql)) {
    //         Logger::log($_SESSION["user_id"], $sql, "MODEL - SYSTEM - apikey", "OK");
    //         return true;
    //     } else {
    //         Logger::log($_SESSION["user_id"], mysqli_error($this->dbConnection), "MODEL - SYSTEM - apikey", "ERROR");
    //         return false;
    //     }
    // }

    // public function canIHaveWhatsSupport($email): bool
    // {
    //     $companyid = getCompanyIdByEmail($email);
    //     Logger::log(9999, "Company $companyid detected from email $email", "MODEL - SYSTEM - canIHaveWhatsSupport", "OK");

    //     if ($companyid !== "none") {
    //         return canHaveWppSupport($companyid);
    //     }
    //     return false;
    // }
}
