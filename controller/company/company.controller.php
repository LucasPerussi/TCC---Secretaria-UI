<?php

namespace API\Controller;

use API\Controller\DefaultController;
// use API\Controller\ipinfo;
use API\Model\CompanyModel;
use API\Model\Logger;
use API\Model\Notification;
use API\Model\Timeline;
use API\Model\PropertyVerifier;
use API\Controller\Config;
use API\enum\Timeline_enum;

use const Siler\Config\CONFIG;

date_default_timezone_set('America/Sao_Paulo');


class Company extends DefaultController
{

    private $companyModel;
    private $sessionUserId;
    private $sessionUserCompany;

    public function __construct()
    {
        parent::__construct(); // Chama o construtor da classe pai, se necessário

        $this->companyModel = new CompanyModel();
        if (isset($_SESSION["user_id"])) {
            $this->sessionUserId = $_SESSION["user_id"];
            $this->sessionUserCompany = $_SESSION["company_id"];
        }
    }



    public function allowBcRoute($status)
    {
        if (!isset ($_SESSION["user_id"])) {
            Logger::log(0, "TENTATIVA DE ACESSO EXTERNO", "allowBcRoute", "ERRO");
            return "You must introduce yourself first!";
        }
        $allow = PropertyVerifier::check($this->sessionUserId);
        if ((($allow["admin"] != true) || ($allow["company"] != true) && ($allow["master"] != true)) && ($_SESSION["user_role"] < 4)) {
            Logger::log($_SESSION["user_id"], "NEGADO", "CONTROLLER - COMPANY - allowBcRoute", "ERRO");
            return "Você não tem permissão para isso.";
        };
        Logger::log($_SESSION["user_id"], "APROVADO", "CONTROLLER - COMPANY - allowBcRoute", "PROPRIEDADE VERIFICADA");

        if ($status == "on") {
            $valueText = "ATIVOU";
        } else {
            $valueText = "DESATIVOU";
        };

        if ($this->companyModel->allowBcRoute($status)) {
            $url = Config::BASE_URL . "company-settings";
            $Text = "Você alterou as permissões de uso de cores do Business Card para sua empresa";
            Notification::user("Sua empresa $valueText a possibilidade de uso de Business card para sua conta.", $_SESSION["company_id"], 5, $_SESSION["user_id"], $url);
            Timeline::new($_SESSION["user_id"], 00000, "Atualização de uso do Business Card 🔒", $Text, Timeline_enum::USER_CHANGE);
            return "sucesso!";
        } else {
            return "error";
        }
    }

   
}
