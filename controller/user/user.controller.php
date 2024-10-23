<?php

namespace API\Controller;

use API\Controller\DefaultController;
use API\Model\UserModel;


use const Siler\Config\CONFIG;

date_default_timezone_set('America/Sao_Paulo');


class User extends DefaultController
{

    private $userModel;
    private $sessionUserId;
    private $sessionUserCompany;

    public function __construct()
    {
        parent::__construct();

        $this->userModel = new UserModel();
        if (isset($_SESSION["user_id"])) {
            $this->sessionUserId = $_SESSION["user_id"];
            $this->sessionUserCompany = $_SESSION["company_id"];
        }
    }


 
    function login($email, $password)
    {
        return $this->userModel->login($email, $password);
    }

    public function updateUserPicture($url)
    {
        if ($this->userModel->updateUserPicture($url)) {
            $_SESSION["user_picture"] = $url;
            return "sucesso!";
        } else {
            return "error";
        }
    }


}
