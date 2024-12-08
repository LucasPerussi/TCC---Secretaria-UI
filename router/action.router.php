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
use API\Controller\Internship\Internship as InternshipController;
use API\Controller\Entities\Entities as EntitiesController;
use API\Controller\Request\Request as RequestController;
use API\Controller\Mural\Mural as MuralController;



use Exception;

use API\Controller\CSRFToken;

use function API\Fetch\getAllStagesUnified;
use function API\Fetch\getCustomizedStages;
use function API\Fetch\getDefaultFields;
use function API\Fetch\getProccessFields;
use function API\Fetch\getProccessStages;
use function API\Fetch\getInternshipById;
use function API\Fetch\getStudentInternship;
use function API\Fetch\getStageTypes;
use function API\Fetch\getUnifiedDefaultStages;
// use function API\Fetch\getUnifiedStages;
use function API\Validator\JSON\fields;

date_default_timezone_set('America/Sao_Paulo');


class Route extends \API\Router\DefaultRouter

{
    public UserController $userController;
    public CompanyController $companyController;
    public TicketsController $ticketsController;
    public SystemController $systemController;
    public TrainingController $trainingController;

    public InternshipController $internshipController;
    public EntitiesController $entitiesController;
    
    public RequestController $requestController;
    public MuralController $muralController;

    public function __construct()
    {
        parent::__construct();
        $this->prefix = "/action";

        $this->userController = new UserController();
        $this->companyController = new CompanyController();
        $this->ticketsController = new TicketsController();
        $this->systemController = new SystemController();
        $this->trainingController = new TrainingController();
        $this->internshipController = new InternshipController();
        $this->entitiesController = new EntitiesController();
        $this->requestController = new RequestController();

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
        $this->addRoute("post", "/new-mural", function ($args) use ($obj) {
            $obj->newMural();
        });
        $this->addRoute("post", "/new-request", function ($args) use ($obj) {
            $obj->newRequest();
        });
        $this->addRoute("post", "/new-comment", function ($args) use ($obj) {
            $obj->newComment();
        });
        $this->addRoute("post", "/new-field", function ($args) use ($obj) {
            $obj->newField();
        });
        $this->addRoute("post", "/new-stage-default", function ($args) use ($obj) {
            $obj->newStageDefault();
        });
        $this->addRoute("post", "/new-stage-customized", function ($args) use ($obj) {
            $obj->newStageCustomized();
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
        $this->addRoute("post", "/register-request", function ($args) use ($obj) {
            $obj->registerRequest();
        });
        $this->addRoute("post", "/register-type", function ($args) use ($obj) {
            $obj->newProcessType();
        });
        $this->addRoute("post", "/change-stage", function ($args) use ($obj) {
            $obj->changeStage();
        });
        $this->addRoute("patch", "/change-role", function ($args) use ($obj) {
            $obj->changeRole();
        });
        $this->addRoute("post", "/change-is", function ($args) use ($obj) {
            $obj->changeIS();
        });
        $this->addRoute("post", "/register-internship", function ($args) use ($obj) {
            $obj->registerInternship();
        });
        // proccess
        $this->addRoute("post", "/add-field-proccess/{proccessId}/{fieldId}", function ($args) use ($obj) {
            $obj->addFieldToProccess($args["proccessId"], $args["fieldId"]);
        });
        $this->addRoute("post", "/remove-field-proccess/{proccessId}/{fieldId}", function ($args) use ($obj) {
            $obj->removeFieldToProccess($args["proccessId"], $args["fieldId"]);
        });
        $this->addRoute("post", "/remove-field/{fieldId}", function ($args) use ($obj) {
            $obj->removeField($args["fieldId"]);
        });
        $this->addRoute("post", "/add-teacher", function ($args) use ($obj) {
            $obj->addTeacher();
        });
        // stages
        $this->addRoute("post", "/add-stage-process/{proccessId}/{stage}", function ($args) use ($obj) {
            $obj->addStageToProccess($args["proccessId"], $args["stage"]);
        });
        $this->addRoute("post", "/remove-stage-process/{proccessId}/{stage}", function ($args) use ($obj) {
            $obj->removeStageToProccess($args["proccessId"], $args["stage"]);
        });

        // GET ENDPOINTS
        $this->addRoute("get", "/load-default-fields", function ($args) use ($obj) {
            $obj->listDefaultFields();
        });
        $this->addRoute("get", "/load-default-stages", function ($args) use ($obj) {
            $obj->listDefaultStages();
        });
        $this->addRoute("get", "/load-customized-stages", function ($args) use ($obj) {
            $obj->listCustomizedStages();
        });
        $this->addRoute("get", "/load-proccess-fields/{proccess}", function ($args) use ($obj) {
            $obj->listProccessFields($args["proccess"]);
        });
        $this->addRoute("get", "/load-proccess-stages/{proccess}", function ($args) use ($obj) {
            $obj->listProccessStages($args["proccess"]);
        });
        $this->addRoute("get", "/get-all-stages", function ($args) use ($obj) {
            $obj->getAllStages();
        });
        $this->addRoute("get", "/get-internship-id/{id}", function ($args) use ($obj) {
            $obj->getInternshipById($args["id"]);
        });
        $this->addRoute("get", "/get-internship-student/{id}", function ($args) use ($obj) {
            $obj->getStudentInternship($args["id"]);
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

    public function changeStage()
    {
        $body = $this->getBody();
        fields(["stage", "request"], $body, false);

        echo json_encode($this->requestController->changeStage($body["stage"], $body["request"]));
    }
    public function changeRole()
    {
        $body = $this->getBody();
        fields(["user", "role"], $body, false);

        echo json_encode($this->entitiesController->changeRole($body["user"], $body["role"]));
    }
    public function changeIS()
    {
        $body = $this->getBody();
        fields(["id_estagio", "status"], $body, false);

        echo json_encode($this->internshipController->changeIS($body["id_estagio"], $body["status"]));
    }
    public function newComment()
    {
        $body = $this->getBody();
        fields(["comentario", "processo"], $body, false);

        echo json_encode($this->systemController->newComment($body["comentario"], $body["processo"], $_SESSION["user_id"]));
    }

    public function addFieldToProccess($proccessId, $fieldId)
    {
        echo json_encode($this->systemController->addFieldToProccess($proccessId, $fieldId));
    }
    public function removeFieldToProccess($proccessId, $fieldId)
    {
        echo json_encode($this->systemController->removeFieldToProccess($proccessId, $fieldId));
    }
    public function removeField($fieldId)
    {
        echo json_encode($this->systemController->removeField($fieldId));
    }

    public function addStageToProccess($proccessId, $stage)
    {
        echo json_encode($this->systemController->addStageToProccess($proccessId, $stage));
    }

    public function removeStageToProccess($proccessId, $stage)
    {
        echo json_encode($this->systemController->removeStageToProccess($proccessId, $stage));
    }

    public function getAllStages()
    {
        echo json_encode(getAllStagesUnified());
    }

    public function registerFH()
    {
        $body = $this->getBody();
        fields(["descricao", "data_evento", "horas_solicitadas", "tipo", "comprovante"], $body, false);

        echo json_encode($this->trainingController->registerFH($body["descricao"], $body["data_evento"], $body["horas_solicitadas"], $body["tipo"], $body["comprovante"]));
    }
     public function registerInternship()
    {
        $body = $this->getBody();
        fields(["professor_orientador", "empresa", "area_atuacao", "data_inicio", "duracaoMeses"], $body, false);

        echo json_encode($this->internshipController->registerInternship($body["professor_orientador"], $body["empresa"], $body["area_atuacao"], $body["data_inicio"], $body["duracaoMeses"]));
    }

    public function newMural()
    {
        $body = $this->getBody();
        fields(["titulo", "descricao", "curso", "visivel"], $body, false);

        echo json_encode($this->muralController->newMural($body["titulo"], $body["descricao"], $body["curso"], $body["visivel"]));
    }

    public function newField()
    {
        $body = $this->getBody();
        fields(["nome", "label", "tipo_dado"], $body, false);

        echo json_encode($this->systemController->newField($body["nome"], $body["label"], $body["tipo_dado"]));
    }
    public function addTeacher()
    {
        $body = $this->getBody();
        fields(["professor", "processo"], $body, false);

        echo json_encode($this->systemController->addTeacher($body["professor"], $body["processo"]));
    }

    public function newRequest()
    {
        $body = $this->getBody();
        $fieldsArray = [];
    
        // Construir o array de campos
        foreach ($body as $fieldName => $fieldValue) {
            $fieldsArray[] = [
                'nome' => $fieldName,
                'valor' => $fieldValue
            ];
        }
    
        // Inicializar variáveis para evitar erros de variável indefinida
        $title = '';
        $description = '';
        $processo = '';
    
        // Extrair os valores necessários
        foreach ($fieldsArray as $field) {
            if ($field["nome"] == "titulo") {
                $title = $field["valor"];
            }
            if ($field["nome"] == "descricao") {
                $description = $field["valor"];
            }
            if ($field["nome"] == "processo") {
                $processo = $field["valor"];
            }
        }
    
        $error = false;
    
        // Criar a nova solicitação
        $openRequest = $this->systemController->newRequest($title, $description, $processo, $_SESSION["user_id"]);
    
        // Verificar se o status não é 200 ou 201 (sucesso)
        if ($openRequest["status"] != 200 && $openRequest["status"] != 201) {
            $error = true;
        }
    
        // Decodificar a resposta JSON
        $response = json_decode($openRequest["response"], true);
    
        if ($response === null) {
            // Se a decodificação falhar, marcar como erro
            $error = true;
        }
    
        // Extrair identificador e ID do ticket
        $ticketIdentifier = isset($response["identificador"]) ? $response["identificador"] : null;
        $ticketId = isset($response["id"]) ? $response["id"] : null;
    
        // Verificar se ticketId está disponível
        if ($ticketId === null) {
            $error = true;
        }
    
        // Processar os campos restantes
        foreach ($fieldsArray as $field) {
            if (!in_array($field["nome"], ["titulo", "descricao", "processo"])) {
                $registerResponse = $this->systemController->newResponse($field["nome"], $field["valor"], $ticketId, $_SESSION["user_id"]);
                if ($registerResponse["status"] != 200 && $registerResponse["status"] != 201) {
                    $error = true;
                }
            }
        }
    
        // Retornar a resposta adequada
        if ($error) {
            echo json_encode([
                "status" => 500,
                "message" => "Tivemos um problema ao abrir seu chamado"
            ]);
        } else {
            echo json_encode([
                "status" => 200,
                "message" => "Chamado aberto com sucesso",
                "identificador" => $ticketIdentifier
            ]);
        }
    }
    

    public function newFieldProccess($proccess)
    {
        $body = $this->getBody();
        fields(["nome", "label", "tipo_dado"], $body, false);

        echo json_encode($this->systemController->newFieldProccess($body["nome"], $body["label"], $body["tipo_dado"], $proccess));
    }

    public function newStageDefault()
    {
        $body = $this->getBody();
        fields(["nome", "label", "estimativaHoras", "cor"], $body, false);

        echo json_encode($this->systemController->newStageDefault($body["nome"], $body["label"], $body["estimativaHoras"], $body["cor"]));
    }

    public function newStageCustomized()
    {
        $body = $this->getBody();
        fields(["nome", "label", "estimativaHoras", "cor"], $body, false);

        echo json_encode($this->systemController->newStageCustomized($body["nome"], $body["label"], $body["estimativaHoras"], $body["cor"]));
    }

    public function listDefaultFields()
    {
        echo json_encode(getDefaultFields());
    }

    public function listDefaultStages()
    {
        echo json_encode(getUnifiedDefaultStages());
    }

    public function listCustomizedStages()
    {
        echo json_encode(getCustomizedStages());
    }

    public function listProccessFields($proccess)
    {
        echo json_encode(getProccessFields($proccess));
    }
    public function getInternshipById($id)
    {
        echo json_encode(getInternshipById($id));
    }
    public function getStudentInternship($id)
    {
        echo json_encode(getStudentInternship($id));
    }

    public function listProccessStages($proccess)
    {
        echo json_encode(getProccessStages($proccess));
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

        echo json_encode($this->userController->signup($body["name"], $body["lastName"], $body["birth"], $body["registro"], $body["email"], $body["password"], $body["password-confirmation"]));
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
