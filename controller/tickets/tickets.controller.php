<?php

namespace API\Controller;

use API\Controller\DefaultController;
// use API\Controller\ipinfo;
use API\Model\CompanyModel;
use API\Model\Logger;
use API\Model\TicketsModel;
use API\Model\Timeline;
use API\Model\PropertyVerifier;
use API\Model\Notification;
use API\Controller\SendEmail;
use API\Controller\Config;




use const Siler\Config\CONFIG;

date_default_timezone_set('America/Sao_Paulo');


class Tickets extends DefaultController
{

    private $ticketsModel;
    private $sessionUserId;

    public function __construct()
    {
        parent::__construct(); // Chama o construtor da classe pai, se necessário

        $this->ticketsModel = new TicketsModel();
        if (isset($_SESSION["user_id"])){
            $this->sessionUserId = $_SESSION["user_id"];
        }
    }

    function newComment($picture, $description, $id, $whisper)
    {

        if (!isset ($_SESSION["user_id"])) {
            Logger::log(0, "TENTATIVA DE ACESSO EXTERNO", "newRequestComment", "ERRO");
            return "You must introduce yourself first!";
        }

        $allow = PropertyVerifier::check($_SESSION["user_id"]);
        if ((($allow["company"] != true) && ($allow["master"] != true)) && ($_SESSION["user_role"] != 5) && ($_SESSION["user_role"] != 4)) {
            Logger::log($_SESSION["user_id"] ?? 9999, "NEGADO", "newRequestComment", "ERRO EM VERIFICAÇÃO DE PROPRIEDADE");
            return "Você não tem permissão para isso.";
        };

        if ($this->ticketsModel->newComment($picture, $description, $id, $whisper)) {
            return "sucesso!";
        } else {
            return "error";
        }
    }

   

}