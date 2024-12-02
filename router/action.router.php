<?php

namespace API\Router\Action;

use Firebase\JWT\JWT;
use Firebase\JWT\JWK;
use Firebase\JWT\Key;


use API\Model\Logger;
use API\Controller\Config;
use API\Controller\User as UserController;
use API\Controller\Company as CompanyController;
use API\Controller\Tickets as TicketsController;
use API\Controller\System as SystemController;
use API\Controller\TrainingHours\Training as TrainingController;



use Exception;

use API\Controller\CSRFToken;

use function API\Validator\JSON\fields;

date_default_timezone_set('America/Sao_Paulo');


class Route extends \API\Router\DefaultRouter

{
    public UserController $userController;
    public CompanyController $companyController;
    public TicketsController $ticketsController;
    public SystemController $systemController;
    public TrainingController $trainingController;

    public function __construct()
    {
        parent::__construct();
        $this->prefix = "/action";

        $this->userController = new UserController();
        $this->companyController = new CompanyController();
        $this->ticketsController = new TicketsController();
        $this->systemController = new SystemController();
        $this->trainingController = new TrainingController();

        $obj = $this;
    
        $this->addRoute("post", "/login", function ($args) use ($obj) {
            $obj->login();
        });
        $this->addRoute("post", "/signup", function ($args) use ($obj) {
            $obj->signup();
        });
        $this->addRoute("post", "/register-fh", function ($args) use ($obj) {
            $obj->registerFH();
        });
        $this->addRoute("post", "/updateUser/{endpoint}", function ($args) use ($obj) {
            $obj->updateUser($args['endpoint']);
        });
      
    }


    public function updateUser($endpoint)
    {
        switch ($endpoint) {
            case 'email':
                $body = $this->getBody();
                fields(["email"], $body, false);
                $field = $body["descricao"];
                echo json_encode($this->userController->updateUser($field, $endpoint));
                break;
            case 'registro':
                $body = $this->getBody();
                fields(["registro"], $body, false);
                $field = $body["registro"];
                echo json_encode($this->userController->updateUser($field, $endpoint));
                break;
            case 'nome':
                $body = $this->getBody();
                fields(["nome"], $body, false);
                $field = $body["nome"];
                echo json_encode($this->userController->updateUser($field, $endpoint));
                break;
            case 'sobrenome':
                $body = $this->getBody();
                fields(["sobrenome"], $body, false);
                $field = $body["sobrenome"];
                echo json_encode($this->userController->updateUser($field, $endpoint));
                break;
            case 'nascimento':
                $body = $this->getBody();
                fields(["nascimento"], $body, false);
                $field = $body["nascimento"];
                echo json_encode($this->userController->updateUser($field, $endpoint));
                break;
            case 'foto':
                $body = $this->getBody();
                fields(["foto"], $body, false);
                $field = $body["foto"];
                $_SESSION["user_picture"] = $body["foto"];
                echo json_encode($this->userController->updateUser($field, $endpoint));
                break;
            case 'curso':
                $body = $this->getBody();
                fields(["curso"], $body, false);
                $field = $body["curso"];
                echo json_encode($this->userController->updateUser($field, $endpoint));
                break;
            
            default:
                echo json_encode(array(
                    "error" => true,
                    "message" => "Endpoint indefinido"
                ));
                break;
        }
        return;

    }

    public function registerFH()
    {
        $body = $this->getBody();
        fields(["descricao", "data_evento", "horas_solicitadas", "tipo", "comprovante"], $body, false);

        echo json_encode($this->trainingController->registerFH($body["descricao"], $body["data_evento"], $body["horas_solicitadas"], $body["tipo"], $body["comprovante"]));
    }



    public function login()
    {
        $body = $this->getBody();
        fields(["email", "password"], $body, false);
        

        echo json_encode($this->userController->login($body["email"], $body["password"]));
    }

    public function signup()
    {

        $body = $this->getBody();
        fields(["name", "lastName", "birth", "registro", "email", "password", "password-confirmation"], $body, false);
        
        echo json_encode($this->userController->signup($body["name"],$body["lastName"],$body["birth"],$body["registro"],$body["email"],$body["password"], $body["password-confirmation"]));

    }

    public function outro()
    {
        $body = $this->getBody();
        fields(["email", "password", "csrf_token"], $body, false);

        $clientSynced = CSRFToken::validate($body["csrf_token"], "ACTION - newContentRoute");
        if (!$clientSynced) {
            return "Erro, algo não parece certo!";
        }

        echo json_encode($this->userController->login($body["email"], $body["password"]));
    }

    public function getStudentHours()
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            echo json_encode([
                "status" => "error",
                "message" => "O ID do aluno é obrigatório."
            ]);
            return;
        }

        echo json_encode($this->trainingController->getStudentHours($id));
    }
  
}
