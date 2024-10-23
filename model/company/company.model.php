<?php

namespace API\Model;

use API\Controller\Company;
use API\Model\Database;
use API\Model\Logger;
use API\Model\CompanyDAO;
use const Siler\Config\CONFIG;
use API\Controller\Config;
use API\Controller\RandomStrGenerator;

use function API\Fetch\returnTenantByContactId;

class CompanyModel
{
    private $user;
    private $company;
    private $dbConnection;

    public function __construct()
    {
        if (isset($_SESSION["user_id"])) {
            $this->user = $_SESSION["user_id"];
            $this->company = $_SESSION["company_id"];
        }
        $this->dbConnection = Database::connect();
    }



    public function allowBcRoute($id)
    {
        $id = Sanitize::clean($id, "id", "allowBcRoute");

        if ($id == "on") {
            $value = 1;
        } else {
            $value = 0;
        }

        return CompanyDAO::Update("com_allowBC", $value, "allowBcRoute", $this->company);
    }

   
}
