<?php

namespace API\Fetch;

use API\Controller\Config;
use API\Model\APIRequest;
// use API\Fetch\DateTime;
use API\Model\Logger;
use DateTime as GlobalDateTime;
use DateTimeZone;
use Throwable;


function getProcessos()
{
    $response = APIRequest::getRequest("users/all-admins");
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao Listar getProcessos: " . $response["message"], "getProcessos", "error");
    return $response;
}


function getRequestTypes()
{
    $response = APIRequest::getRequest("request-type/all");
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao listar tipos de solicitações. Error: " . $response["message"], "getRequestTypes", "error");
    return $response;
}

function getDefaultFields()
{
    $response = APIRequest::getRequest("fields/all-default-fields");
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao listar campos padrões. Error: " . $response["message"], "getRequestTypes", "error");
    return $response;
}

function getProccessTypeId($id)
{
    $response = APIRequest::getRequest("request-type/id/" . $id);
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao listar tipo de processo. Error: " . $response["message"], "getProccessTypeId", "error");
    return $response;
}

function getProccessFields($id)
{
    $response = APIRequest::getRequest("fields/request-field-by-process-type/" . $id);
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao listar campos de processo. Error: " . $response["message"], "getProccessFields", "error");
    return $response;
}

function getAllFieldTypesDB()
{
    $response = APIRequest::getRequest("fields/all-field-types");
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao listar campos de processo. Error: " . $response["message"], "getAllFieldTypesDB", "error");
    return $response;
}

function getProccessStages($id)
{
    $response = APIRequest::getRequest("steps/link-step-to-proccess/" . $id);
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao listar campos de processo. Error: " . $response["message"], "getProccessFields", "error");
    return $response;
}

function getProccessIdentifier($id)
{
    $response = APIRequest::getRequest("requests/process-identificador/" . $id);
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao listar campos de processo. Error: " . $response["message"], "getProccessIdentifier", "error");
    return $response;
}

function getDefaultStages()
{
    $response = APIRequest::getRequest("steps/all-default" );
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao listar etapas de padrões. Error: " . $response["message"], "getDefaultStages", "error");
    return $response;
}

function getCustomizedStages()
{
    $response = APIRequest::getRequest("steps/all-customized" );
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao listar etapas de padrões. Error: " . $response["message"], "getDefaultStages", "error");
    return $response;
}

function getUnifiedDefaultStages()
{
    $defaultStagesResponse = APIRequest::getRequest("steps/all-default");
    if (isset($defaultStagesResponse["error"])) {
        Logger::log($_SESSION["user_id"], "Erro ao listar etapas de padrões. Error: " . $defaultStagesResponse["message"], "getUnifiedDefaultStages", "error");
        $defaultStages = [];
    } else {
        $defaultStages = $defaultStagesResponse;
    }

    $stageTypesResponse = APIRequest::getRequest("steps/stages");
    if (isset($stageTypesResponse["error"])) {
        Logger::log($_SESSION["user_id"], "Erro ao listar tipos de stages. Error: " . $stageTypesResponse["message"], "getUnifiedDefaultStages", "error");
        $stageTypes = [];
    } else {
        $stageTypes = $stageTypesResponse;
    }

    // Unifica os valores em um único array
    $unifiedStages = array_merge($stageTypes, $defaultStages);

    return $unifiedStages;
}

function getAllStagesUnified()
{
    // Inicializa arrays vazios para garantir que sempre sejam arrays
    $defaultStages = [];
    $customizedStages = [];
    $stageTypes = [];

    // Obtém as etapas padrão
    $defaultStagesResponse = APIRequest::getRequest("steps/all-default");
    if (isset($defaultStagesResponse["error"])) {
        Logger::log(
            $_SESSION["user_id"],
            "Erro ao listar etapas padrão. Erro: " . $defaultStagesResponse["message"],
            "getUnifiedStages",
            "error"
        );
    } elseif (!empty($defaultStagesResponse) && is_array($defaultStagesResponse)) {
        $defaultStages = $defaultStagesResponse;
    } else {
        Logger::log(
            $_SESSION["user_id"],
            "Resposta inesperada ao listar etapas padrão: " . json_encode($defaultStagesResponse),
            "getUnifiedStages",
            "warning"
        );
    }

    // Obtém as etapas personalizadas
    $customizedStagesResponse = APIRequest::getRequest("steps/all-customized");
    if (isset($customizedStagesResponse["error"])) {
        Logger::log(
            $_SESSION["user_id"],
            "Erro ao listar etapas personalizadas. Erro: " . $customizedStagesResponse["message"],
            "getUnifiedStages",
            "error"
        );
    } elseif (!empty($customizedStagesResponse) && is_array($customizedStagesResponse)) {
        $customizedStages = $customizedStagesResponse;
    } else {
        Logger::log(
            $_SESSION["user_id"],
            "Resposta inesperada ao listar etapas personalizadas: " . json_encode($customizedStagesResponse),
            "getUnifiedStages",
            "warning"
        );
    }
    

    // Obtém os tipos de estágios
    $stageTypesResponse = APIRequest::getRequest("steps/stages");
    if (isset($stageTypesResponse["error"])) {
        Logger::log(
            $_SESSION["user_id"],
            "Erro ao listar tipos de etapas. Erro: " . $stageTypesResponse["message"],
            "getUnifiedStages",
            "error"
        );
    } elseif (!empty($stageTypesResponse) && is_array($stageTypesResponse)) {
        $stageTypes = $stageTypesResponse;
    } else {
        Logger::log(
            $_SESSION["user_id"],
            "Resposta inesperada ao listar tipos de etapas: " . json_encode($stageTypesResponse),
            "getUnifiedStages",
            "warning"
        );
    }


    // Coleciona os arrays válidos para unificação
    $stagesToMerge = [];

    if (!empty($stageTypes)) {
        $stagesToMerge[] = $stageTypes;
    }

    if (!empty($defaultStages)) {
        $stagesToMerge[] = $defaultStages;
    }

    if (!empty($customizedStages)) {
        $stagesToMerge[] = $customizedStages;
    }

    // Unifica os arrays válidos
    if (!empty($stagesToMerge)) {
        // Utiliza array_merge para combinar todos os arrays em $stagesToMerge
        $unifiedStages = call_user_func_array('array_merge', $stagesToMerge);
    } else {
        // Se nenhum array válido estiver disponível, retorna um array vazio
        $unifiedStages = [];
        Logger::log(
            $_SESSION["user_id"],
            "Nenhuma etapa válida foi retornada para unificação.",
            "getUnifiedStages",
            "warning"
        );
    }

    // Log de sucesso se houver etapas unificadas
    if (!empty($unifiedStages)) {
        Logger::log(
            $_SESSION["user_id"],
            "Etapas unificadas retornadas com sucesso.",
            "getUnifiedStages",
            "info"
        );
    }

    return $unifiedStages;
}
