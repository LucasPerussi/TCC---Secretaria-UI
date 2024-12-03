<?php
namespace API\Controller\Request;

use API\Controller\DefaultController;
use API\Model\Request\RequestModel;

date_default_timezone_set('America/Sao_Paulo');

class Request extends DefaultController
{
    private $requestModel;
    private $sessionUserId;

    public function __construct()
    {
        parent::__construct();

        $this->requestModel = new RequestModel();
        if (isset($_SESSION["user_id"])) {
            $this->sessionUserId = $_SESSION["user_id"];
        }
    }

    public function registerRequest($titulo, $descricao, $professor_avaliador)
    {

        if (!$this->sessionUserId) {
            return [
                "status" => "error",
                "message" => "O ID do aluno é obrigatório."
            ];
        }

        return $this->requestModel->registerRequest($titulo, $descricao, $professor_avaliador);
    }
}