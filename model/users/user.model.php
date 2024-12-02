<?php
namespace API\Model;

use API\Controller\Config;
use API\Model\Sanitize;

class UserModel
{
    private $user;
    private $username;

    public function __construct()
    {
        if (isset($_SESSION["user_id"])) {
            $this->user = $_SESSION["user_id"];
            // $this->username = $_SESSION["username"];
        }
    }

    public function updateUserPicture($url)
    {
        $url = Sanitize::clean($url, "picture url", "updateUserPicture");

        return UserDAO::Update("usr_picture", $url, "updateUserPicture", $this->user);
    }

    public function login($email, $password)
    {
        $email = Sanitize::clean($email, "email", "login");
        $password = Sanitize::clean($password, "password", "login");

        $url = Config::API_URL . 'auth/login';

        $data = [
            'email' => $email,
            'senha' => $password
        ];

        $result = APIRequest::postRequest($url, $data, 'login');
        return APIRequest::handleResponse($result, 'login');
    }

    public function updateUser($field, $endpoint)
    {
        $field = Sanitize::clean($field, "field", "updateUser - $endpoint");
        $endpoint = Sanitize::clean($endpoint, "endpoint", "updateUser - $endpoint");
        $user = $_SESSION["user_id"];

        $url = Config::API_URL . "users/$endpoint/$user";

        $data = [
            "$endpoint" => $field,
        ];

        return APIRequest::patchRequest($url, $data, "updateUser");
    }
    
    public function changePassword($password, $newPassword, $passwordConfirmation)
    {
        $password = Sanitize::clean($password, "password", "changePassword ");
        $newPassword = Sanitize::clean($newPassword, "newPassword", "changePassword ");
        $passwordConfirmation = Sanitize::clean($passwordConfirmation, "passwordConfirmation", "changePassword ");
        $user = $_SESSION["user_id"];

        $url = Config::API_URL . "users/id/$user/change-password";

        $data = [
            "currentPassword" => $password,
            "newPassword" => $newPassword,
            "confirmPassword" => $passwordConfirmation
        ];

        return APIRequest::patchRequest($url, $data, "changePassword");
    }

    public function signup($name,$lastName,$birth,$registro,$email,$password)
    {
        $email = Sanitize::clean($email, "email", "signup");
        $password = Sanitize::clean($password, "password", "signup");
        $registro = Sanitize::clean($registro, "registro", "signup");
        $birth = Sanitize::clean($birth, "birth", "signup");
        $lastName = Sanitize::clean($lastName, "lastName", "signup");
        $name = Sanitize::clean($name, "name", "signup");

        $url = Config::API_URL . 'auth/create';

        $data = [
            'email' => $email,
            'senha' => $password,
            'nome' => $name,
            'sobrenome' => $lastName,
            'nascimento' => $birth,
            'registro' => $registro,
        ];

        $result = APIRequest::postRequest($url, $data, 'signup');
        return APIRequest::handleResponse($result, 'signup');
    }
}
