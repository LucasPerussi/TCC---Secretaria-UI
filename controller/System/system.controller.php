<?php

namespace API\Controller;

use API\Controller\DefaultController;
// use API\Controller\ipinfo;
use API\Model\SystemModel;
use API\Model\Logger;
use API\Model\Notification;
use API\Model\Timeline;
use API\Model\PropertyVerifier;
use API\Controller\Config;
use API\Controller\RandomStrGenerator;



use const Siler\Config\CONFIG;

date_default_timezone_set('America/Sao_Paulo');


class System extends DefaultController
{

    private $systemModel;
    private $sessionUserId;
    private $sessionUserCompany;

    public function __construct()
    {
        parent::__construct(); // Chama o construtor da classe pai, se necessário

        $this->systemModel = new SystemModel();
        if (isset($_SESSION["user_id"])) {
            $this->sessionUserId = $_SESSION["user_id"];
            // $this->sessionUserCompany = $_SESSION["company_id"];
        }
    }
    public function newProcessType($nome, $fluxograma, $hrs_resposta, $hrs_resolucao)
    {

        if (!$this->sessionUserId) {
            return [
                "status" => "error",
                "message" => "O usuário estar logado é obrigatório."
            ];
        }

        return $this->systemModel->newProcessType($nome, $fluxograma, $hrs_resposta, $hrs_resolucao);
    }
}
    
   
