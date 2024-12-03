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
