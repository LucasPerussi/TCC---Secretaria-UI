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

    public function newStageCustomized($nome, $label, $estHoras, $cor)
    {
        $nome = Sanitize::clean($nome, "nome", "newStageCustomized");
        $label = Sanitize::clean($label, "label", "newStageCustomized");
        $estHoras = Sanitize::clean($estHoras, "estHoras", "newStageCustomized");
        $cor = Sanitize::clean($cor, "cor", "newStageCustomized");

        $url = Config::API_URL . "steps/new-customized";

        $data = [
            'nome' => $nome,
            'label' => $label,
            'estimativaHoras' => $estHoras,
            'cor' => $cor
        ];

        return APIRequest::postRequest($url, $data, "newStageCustomized");
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
    
    public function newRequest($title, $description, $processo, $user_id)
    {
        $title = Sanitize::clean($title, "title", "newRequest");
        $description = Sanitize::clean($description, "description", "newRequest");
        $processo = Sanitize::clean($processo, "processo", "newRequest");
        $user_id = Sanitize::clean($user_id, "user_id", "newRequest");

        $url = Config::API_URL . "requests/new";

        $data = [
            'titulo' => $title,
            'descricao' => $description,
            'aluno' => $user_id,
            'tipo_solicitacao' => $processo
        ];
       
        return APIRequest::postRequest($url, $data, "newRequest");
    }

    public function newComment($comentario, $processo, $user_id)
    {
        $comentario = Sanitize::clean($comentario, "comentario", "newComment");
        $processo = Sanitize::clean($processo, "processo", "newComment");
        $user_id = Sanitize::clean($user_id, "user_id", "newComment");

        $url = Config::API_URL . "comments/new";

        $data = [
            'comentario' => $comentario,
            'usuario' => $user_id,
            'processo' => $processo
        ];
       
        return APIRequest::postRequest($url, $data, "newComment");
    }

    public function addTeacher($professor, $processo)
    {
        $professor = Sanitize::clean($professor, "professor", "addTeacher");
        $processo = Sanitize::clean($processo, "processo", "addTeacher");

        $url = Config::API_URL . "requests/add-teacher";

        $data = [
            'professor' => $professor,
            'identificador' => $processo
        ];
       
        return APIRequest::patchRequest($url, $data, "addTeacher");
    }

    public function newResponse($nome, $valor, $ticketId, $user_id)
    {
        $nome = Sanitize::clean($nome, "nome", "newResponse");
        $valor = Sanitize::clean($valor, "valor", "newResponse");
        $ticketId = Sanitize::clean($ticketId, "ticketId", "newResponse");
        $user_id = Sanitize::clean($user_id, "user_id", "newResponse");

        $url = Config::API_URL . "requests/new-question-reply";

        $data = [
            'campo' => $nome,
            'resposta' => $valor,
            'processo' => $ticketId,
            'usuario' => $user_id
        ];
       
        return APIRequest::postRequest($url, $data, "newResponse");
    }

    public function removeStageToProccess($proccessId, $stage)
    {
        $proccessId = Sanitize::clean($proccessId, "proccessId", "removeStageToProccess");
        $stage = Sanitize::clean($stage, "stage", "removeStageToProccess");

        $url = Config::API_URL . "steps/remove-link-stage-to-request/" . $stage . '/' . $proccessId;

        return APIRequest::deleteRequest($url, "removeStageToProccess");
    }

    public function removeFieldToProccess($proccessId, $field)
    {
        $proccessId = Sanitize::clean($proccessId, "proccessId", "removeFieldToProccess");
        $field = Sanitize::clean($field, "field", "removeFieldToProccess");

        $url = Config::API_URL . "fields/remove-link-field-to-request/" . $field . '/' . $proccessId;

        return APIRequest::deleteRequest($url, "removeFieldToProccess");
    }

    public function newCourse($nome, $descricao, $coordenador, $horas_formativas, $semestres)
    {
        $nome = Sanitize::clean($nome, "nome", "newCourse");
        $descricao = Sanitize::clean($descricao, "nodescricaome", "newCourse");
        $coordenador = Sanitize::clean($coordenador, "coordenador", "newCourse");
        $horas_formativas = Sanitize::clean($horas_formativas, "horas_formativas", "newCourse");
        $semestres = Sanitize::clean($semestres, "semestres", "newCourse");

        $url = Config::API_URL . "courses/new";

        $data = [
            'nome' => $nome,
            'descricao' => $descricao,
            'coordenador' => $coordenador,
            'horas_formativas' => $horas_formativas,
            'semestres' => $semestres
        ];

        return APIRequest::postRequest($url, $data, "newCourse");
    }

    public function removeField($fieldId)
    {
        $field = Sanitize::clean($fieldId, "fieldId", "removeField");

        $url = Config::API_URL . "fields/type/" . $field ;

        return APIRequest::deleteRequest($url, "removeField");
    }
}
