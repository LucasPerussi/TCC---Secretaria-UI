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

    public function newField($nome, $label, $tipo_dado)
    {

        if (!$this->sessionUserId) {
            return [
                "status" => "error",
                "message" => "O usuário estar logado é obrigatório."
            ];
        }

        return $this->systemModel->newField($nome, $label, $tipo_dado);
    }

    public function newFieldProccess($nome, $label, $tipo_dado, $proccess)
    {

        if (!$this->sessionUserId) {
            return [
                "status" => "error",
                "message" => "O usuário estar logado é obrigatório."
            ];
        }

        return $this->systemModel->newFieldProccess($nome, $label, $tipo_dado, $proccess);
    }

    public function newStageDefault($nome, $label, $estHoras, $cor)
    {

        if (!$this->sessionUserId) {
            return [
                "status" => "error",
                "message" => "O usuário estar logado é obrigatório."
            ];
        }

        return $this->systemModel->newStageDefault($nome, $label, $estHoras, $cor);
    }

    public function newStageCustomized($nome, $label, $estHoras, $cor)
    {

        if (!$this->sessionUserId) {
            return [
                "status" => "error",
                "message" => "O usuário estar logado é obrigatório."
            ];
        }

        return $this->systemModel->newStageCustomized($nome, $label, $estHoras, $cor);
    }
    
    public function addFieldToProccess($proccessId, $fieldId)
    {

        if (!$this->sessionUserId) {
            return [
                "status" => "error",
                "message" => "O usuário estar logado é obrigatório."
            ];
        }

        return $this->systemModel->addFieldToProccess($proccessId, $fieldId);
    }

    public function removeFieldToProccess($proccessId, $fieldId)
    {

        if (!$this->sessionUserId) {
            return [
                "status" => "error",
                "message" => "O usuário estar logado é obrigatório."
            ];
        }

        return $this->systemModel->removeFieldToProccess($proccessId, $fieldId);
    }
    public function removeField($fieldId)
    {

        if (!$this->sessionUserId) {
            return [
                "status" => "error",
                "message" => "O usuário estar logado é obrigatório."
            ];
        }

        return $this->systemModel->removeField($fieldId);
    }
    public function addStageToProccess($proccessId, $stage)
    {

        if (!$this->sessionUserId) {
            return [
                "status" => "error",
                "message" => "O usuário estar logado é obrigatório."
            ];
        }

        return $this->systemModel->addStageToProccess($proccessId, $stage);
    }

    public function removeStageToProccess($proccessId, $stage)
    {

        if (!$this->sessionUserId) {
            return [
                "status" => "error",
                "message" => "O usuário estar logado é obrigatório."
            ];
        }

        return $this->systemModel->removeStageToProccess($proccessId, $stage);
    }

    public function newRequest($title, $description, $processo, $user_id)
    {

        if (!$this->sessionUserId) {
            return [
                "status" => "error",
                "message" => "O usuário estar logado é obrigatório."
            ];
        }

        return $this->systemModel->newRequest($title, $description, $processo, $user_id);
    }
    public function closeTicket($comentario, $processo, $stage, $user_id)
    {

        if (!$this->sessionUserId) {
            return [
                "status" => "error",
                "message" => "O usuário estar logado é obrigatório."
            ];
        }

        return $this->systemModel->closeTicket($comentario, $processo, $stage, $user_id);
    }
    public function registerCompany($nome, $cnpj, $emailContato, $tipo)
    {

        if (!$this->sessionUserId) {
            return [
                "status" => "error",
                "message" => "O usuário estar logado é obrigatório."
            ];
        }

        return $this->systemModel->registerCompany($nome, $cnpj, $emailContato, $tipo);
    }
    public function addoptTicket($ticket)
    {

        if (!$this->sessionUserId) {
            return [
                "status" => "error",
                "message" => "O usuário estar logado é obrigatório."
            ];
        }

        return $this->systemModel->addoptTicket($ticket);
    }
    public function newComment($comentario, $processo, $user_id)
    {

        if (!$this->sessionUserId) {
            return [
                "status" => "error",
                "message" => "O usuário estar logado é obrigatório."
            ];
        }

        return $this->systemModel->newComment($comentario, $processo, $user_id);
    }

    public function newResponse($nome,$valor, $ticketId, $user_id)
    {

        if (!$this->sessionUserId) {
            return [
                "status" => "error",
                "message" => "O usuário estar logado é obrigatório."
            ];
        }

        return $this->systemModel->newResponse($nome,$valor, $ticketId, $user_id);
    }

    public function addTeacher($professor, $processo)
    {

        if (!$this->sessionUserId) {
            return [
                "status" => "error",
                "message" => "O usuário estar logado é obrigatório."
            ];
        }

        return $this->systemModel->addTeacher($professor, $processo);
    }

    public function newCourse($nome, $descricao, $coordenador, $horas_formativas, $semestres)
    {

        if (!$this->sessionUserId) {
            return [
                "status" => "error",
                "message" => "O usuário estar logado é obrigatório."
            ];
        }

        return $this->systemModel->newCourse($nome, $descricao, $coordenador, $horas_formativas, $semestres);
    }
}
    
   
