<?php

namespace API\Fetch;

use API\Controller\Config;
use API\Model\APIRequest;
// use API\Fetch\DateTime;
use API\Model\Logger;
use DateTime as GlobalDateTime;
use DateTimeZone;
use Throwable;


function getHoursUser($user)
{
    $response = APIRequest::getRequest("hours/by-student/" . $user);
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao listar horas formativas de usuário $user. Error: " . $response["message"], "getHoursUser", "error");
    return $response;
}

function getHoursUserPercentage($user)
{
    $response = APIRequest::getRequest("hours/percentual-por-tipo/" . $user);
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao listar horas formativas de usuário $user. Error: " . $response["message"], "getHoursUser", "error");
    return $response;
}

function getFormativeHoursTypes()
{
    $response = APIRequest::getRequest("hours/types");
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao listar tipos de horas formativas. Error: " . $response["message"], "getFormativeHoursTypes", "error");
    return $response;
}
