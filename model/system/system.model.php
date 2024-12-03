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

    public function removeFieldToProccess($proccessId, $fieldId)
    {
        $proccessId = Sanitize::clean($proccessId, "proccessId", "removeFieldToProccess");
        $fieldId = Sanitize::clean($fieldId, "fieldId", "removeFieldToProccess");

        $url = Config::API_URL . "fields/remove-link-field-to-request/" . $fieldId . '/' . $proccessId;

        return APIRequest::deleteRequest($url, "removeFieldToProccess");
    }
}
