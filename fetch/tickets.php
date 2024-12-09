<?php

namespace API\Fetch;

use API\Controller\Config;
use API\Fetch\DateTime;
use API\Model\APIRequest;
use API\Model\Logger;
use DateTime as GlobalDateTime;
use DateTimeZone;
use Throwable;


function getMytickersAsTeacher()
{
    $response = APIRequest::getRequest("requests/all-requests-as-teacher");
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao listar chamados de professor Error: " . $response["message"], "getMytickersAsTeacher", "error");
    return $response;
}

function getMyticketsAsServer()
{
    $response = APIRequest::getRequest("requests/processes-servidor-open/" . $_SESSION["user_id"]);
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao listar chamados de professor Error: " . $response["message"], "getMyticketsAsServer", "error");
    return $response;
}

function getAllRequestsWithoutServer()
{
    $response = APIRequest::getRequest("requests//processes-without-server");
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao listar chamados de professor Error: " . $response["message"], "getAllRequestsWithoutServer", "error");
    return $response;
}
