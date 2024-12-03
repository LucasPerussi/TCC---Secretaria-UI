<?php

namespace API\Model;

use API\Model\Logger;
use API\Controller\Config;
use API\Model\UserModel;


use function API\Fetch\canHaveWppSupport;
use function API\Fetch\getCompanyIdByEmail;



class SystemModel
{
    private $user;
    private $company;
    private $dbConnection;
    private $dbLogsConnection;
    private $dbFilesConnection;
    private $userModel;
    private $username;

    public function __construct()
    {
        $this->userModel = new UserModel();
        if (isset($_SESSION["user_id"])) {
            $this->user = $_SESSION["user_id"];
        }
    }

    public function newProcessType($nome, $fluxograma, $hrs_resposta, $hrs_resolucao)
    {
        $nome = Sanitize::clean($nome, "nome", "newProcessType");
        $fluxograma = Sanitize::clean($fluxograma, "fluxograma", "newProcessType");
        $hrs_resposta = Sanitize::clean($hrs_resposta, "hrs_resposta", "newProcessType");
        $hrs_resolucao = Sanitize::clean($hrs_resolucao, "hrs_resolucao", "newProcessType");

        $url = Config::API_URL . "request-type/new";

        $data = [
            'nome' => $nome,
            'fluxograma' => $fluxograma,
            'hrs_resposta' => $hrs_resposta,
            'hrs_resolucao' => $hrs_resolucao

        ];

        return APIRequest::postRequest($url, $data, "newProcessType");
    }

    public function newField($nome, $label, $tipo_dado)
    {
        $nome = Sanitize::clean($nome, "nome", "newField");
        $label = Sanitize::clean($label, "label", "newField");
        $tipo_dado = Sanitize::clean($tipo_dado, "tipo_dado", "newField");

        $url = Config::API_URL . "fields/new-type";

        $data = [
            'nome' => $nome,
            'label' => $label,
            'tipo_dado' => $tipo_dado,
            'padrao' => 1,
            'obrigatorio' => 0,
        ];

        return APIRequest::postRequest($url, $data, "newProcessType");
    }

    public function newFieldProccess($nome, $label, $tipo_dado, $proccess)
    {
        $nome = Sanitize::clean($nome, "nome", "newFieldProccess");
        $label = Sanitize::clean($label, "label", "newFieldProccess");
        $tipo_dado = Sanitize::clean($tipo_dado, "tipo_dado", "newFieldProccess");
        $proccess = Sanitize::clean($proccess, "proccess", "newFieldProccess");

        $url = Config::API_URL . "fields/new-type-for-process";

        $data = [
            'nome' => $nome,
            'label' => $label,
            'tipo_dado' => $tipo_dado,
            'padrao' => 1,
            'obrigatorio' => 0,
            'processo' => $proccess
        ];

        return APIRequest::postRequest($url, $data, "newProcessType");
    }

    public function addFieldToProccess($proccessId, $fieldId)
    {
        $proccessId = Sanitize::clean($proccessId, "proccessId", "addFieldToProccess");
        $fieldId = Sanitize::clean($fieldId, "fieldId", "addFieldToProccess");

        $url = Config::API_URL . "fields/link-field-to-request";

        $data = [
            'tipo' => $fieldId,
            'tipo_processo' => $proccessId
        ];

        return APIRequest::postRequest($url, $data, "addFieldToProccess");
    }

    

    public function newStageDefault($nome, $label, $estHoras, $cor)
    {
        $nome = Sanitize::clean($nome, "nome", "newStageDefault");
        $label = Sanitize::clean($label, "label", "newStageDefault");
        $estHoras = Sanitize::clean($estHoras, "estHoras", "newStageDefault");
        $cor = Sanitize::clean($cor, "cor", "newStageDefault");

        $url = Config::API_URL . "steps/new-default";

        $data = [
            'nome' => $nome,
            'label' => $label,
            'estimativaHoras' => $estHoras,
            'cor' => $cor
        ];

        return APIRequest::postRequest($url, $data, "newStageDefault");
    }

    public function addStageToProccess($proccessId, $stage)
    {
        $proccessId = Sanitize::clean($proccessId, "proccessId", "addStageToProccess");
        $stage = Sanitize::clean($stage, "stage", "addStageToProccess");

        $url = Config::API_URL . "steps/link-step-to-proccess";

        $data = [
            'tipo' => $stage,
            'obrigatorio' => 0,
            'proccess' => $proccessId
        ];

        return APIRequest::postRequest($url, $data, "addStageToProccess");
    }

    public function removeStageToProccess($proccessId, $stage)
    {
        $proccessId = Sanitize::clean($proccessId, "proccessId", "removeStageToProccess");
        $stage = Sanitize::clean($stage, "stage", "removeStageToProccess");

        $url = Config::API_URL . "steps/remove-link-stage-to-request/" . $stage . '/' . $proccessId;

        return APIRequest::deleteRequest($url, "removeStageToProccess");
    }
}
