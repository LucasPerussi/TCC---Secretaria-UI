<?php

namespace API\Fetch;

use API\Controller\Config;
use API\Model\APIRequest;
// use API\Fetch\DateTime;
use API\Model\Logger;
use DateTime as GlobalDateTime;
use DateTimeZone;
use Throwable;


function getLast50Logs()
{
    $response = APIRequest::getRequest("system/logs/last50");
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao listar últimos 50 logs. Error: " . $response["message"], "getLast50Logs", "error");
    return $response;
}

function getCompanyTypes()
{
    $response = APIRequest::getRequest("companies/types");
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao listar últimos 50 logs. Error: " . $response["message"], "getCompanyTypes", "error");
    return $response;
}

function getCompanies()
{
    $response = APIRequest::getRequest("companies/all");
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao listar últimos 50 logs. Error: " . $response["message"], "getCompanies", "error");
    return $response;
}



function getLogs()
{
    $response = APIRequest::getRequest("system/logs");
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao listar logs. Error: " . $response["message"], "getLast50Logs", "error");
    return $response;
}


