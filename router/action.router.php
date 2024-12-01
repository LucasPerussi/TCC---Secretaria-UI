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
