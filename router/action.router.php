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
use API\Controller\Request\Request as RequestController;



use Exception;

use API\Controller\CSRFToken;

use function API\Fetch\getDefaultFields;
use function API\Fetch\getProccessFields;
use function API\Validator\JSON\fields;

date_default_timezone_set('America/Sao_Paulo');


class Route extends \API\Router\DefaultRouter

{
    public UserController $userController;
    public CompanyController $companyController;
    public TicketsController $ticketsController;
    public SystemController $systemController;
    public TrainingController $trainingController;
    public RequestController $requestController;

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
        $this->addRoute("post", "/new-field", function ($args) use ($obj) {
            $obj->newField();
        });
        $this->addRoute("post", "/new-field-process/{proccessId}", function ($args) use ($obj) {
            $obj->newFieldProccess($args['proccessId']);
        });
        $this->addRoute("post", "/updateUser/{endpoint}", function ($args) use ($obj) {
            $obj->updateUser($args['endpoint']);
        });
        $this->addRoute("post", "/change-password", function ($args) use ($obj) {
            $obj->changePassword();
        });
        $this->addRoute("post", "/register-request", function($args) use ($obj) {
            $obj->registerRequest();
        });
        $this->addRoute("post", "/register-type", function ($args) use ($obj) {
            $obj->newProcessType();
        });
        $this->addRoute("post", "/add-field-proccess/{proccessId}/{fieldId}", function ($args) use ($obj) {
            $obj->addFieldToProccess($args["proccessId"],$args["fieldId"]);
        });
        $this->addRoute("post", "/remove-field-proccess/{proccessId}/{fieldId}", function ($args) use ($obj) {
            $obj->removeFieldToProccess($args["proccessId"],$args["fieldId"]);
        });
      
        // GET ENDPOINTS
        $this->addRoute("get", "/load-default-fields", function ($args) use ($obj) {
            $obj->listDefaultFields();
        });
        $this->addRoute("get", "/load-proccess-fields/{proccess}", function ($args) use ($obj) {
            $obj->listProccessFields($args["proccess"]);
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
                $_SESSION["user_picture"] = Config::BASE_URL . $body["foto"];
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

    public function changePassword()
    {
        $body = $this->getBody();
        fields(["password", "new-password", "confirm-new-password"], $body, false);

        echo json_encode($this->userController->changePassword($body["password"], $body["new-password"], $body["confirm-new-password"]));
    }

    public function addFieldToProccess($proccessId, $fieldId)
    {
        echo json_encode($this->systemController->addFieldToProccess($proccessId, $fieldId));
    }
    public function removeFieldToProccess($proccessId, $fieldId)
    {
        echo json_encode($this->systemController->removeFieldToProccess($proccessId, $fieldId));
    }

    public function registerFH()
    {
        $body = $this->getBody();
        fields(["descricao", "data_evento", "horas_solicitadas", "tipo", "comprovante"], $body, false);

        echo json_encode($this->trainingController->registerFH($body["descricao"], $body["data_evento"], $body["horas_solicitadas"], $body["tipo"], $body["comprovante"]));
    }

    public function newField()
    {
        $body = $this->getBody();
        fields(["nome", "label", "tipo_dado"], $body, false);

        echo json_encode($this->systemController->newField($body["nome"], $body["label"], $body["tipo_dado"]));
    }

    public function newFieldProccess($proccess)
    {
        $body = $this->getBody();
        fields(["nome", "label", "tipo_dado"], $body, false);

        echo json_encode($this->systemController->newFieldProccess($body["nome"], $body["label"], $body["tipo_dado"], $proccess));
    }

    public function listDefaultFields()
    {
        echo json_encode(getDefaultFields());
    }

    public function listProccessFields($proccess)
    {
        echo json_encode(getProccessFields($proccess));
    }

    public function registerRequest()
    {
        $body = $this->getBody();
        fields(["titulo", "descricao", "professor_avaliador"], $body, false);

        echo json_encode($this->requestController->registerRequest($body["titulo"], $body["descricao"], $body["professor_avaliador"]));
    }

    public function newProcessType()
    {
        $body = $this->getBody();
        fields(["nome", "fluxograma", "hrs_resposta", "hrs_resolucao"], $body, false);

        echo json_encode($this->systemController->newProcessType($body["nome"], $body["fluxograma"], $body["hrs_resposta"], $body["hrs_resolucao"]));
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