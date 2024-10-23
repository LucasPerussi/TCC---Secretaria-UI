<?php

namespace API\Model;

use API\Model\Database;
use API\Model\Sanitize;


class UserModel
{
    private $user;
    private $username;
    private $dbConnection;
    private $logsDBConnection;


    public function __construct()
    {
        if (isset($_SESSION["user_id"])) {
            $this->user = $_SESSION["user_id"];
            $this->username = $_SESSION["username"];
        }
        $this->dbConnection = Database::connect();
    }

    public function updateUserPicture($url)
    {
        $url = Sanitize::clean($url, "picture url", "updateUserPicture");

        return UserDAO::Update("usr_picture", $url, "updateUserPicture", $this->user);
    }

    public function login($email, $password)
    {
        $url = Sanitize::clean($email, "email", "login");


        // implementar funcao de request de login para a api
        return true;
    }
}
