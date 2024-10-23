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
            $this->sessionUserCompany = $_SESSION["company_id"];
        }
    }

    public function apikey($type, $valid, $apiKeyName, $company)
    {
        if (!isset($_SESSION["user_id"])) {
            Logger::log(0, "TENTATIVA DE ACESSO EXTERNO", "apikey", "ERRO");
            return "You must introduce yourself first!";
        }
        $allow = PropertyVerifier::check($this->sessionUserId);
        if ((($allow["master"] != true))) {
            Logger::log($_SESSION["user_id"], "NEGADO", "CONTROLLER - SYSTEM - apikey", "ERRO EM VERIFICAÇÃO DE PROPRIEDADE");
            return "Você não tem permissão para isso.";
        };
        Logger::log($_SESSION["user_id"], "APROVADO", "CONTROLLER - SYSTEM - apikey", "PROPRIEDADE VERIFICADA");
        $key = RandomStrGenerator::generate(40);

        if ($this->systemModel->apikey($type, $valid, $apiKeyName, $company, $key)) {
            return "sucesso!";
        } else {
            return "error";
        }
    }


}
