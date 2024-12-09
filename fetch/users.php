<?php

namespace API\Fetch;

use API\Controller\Config;
use API\Fetch\DateTime;
use API\Model\APIRequest;
use API\Model\Logger;
use DateTime as GlobalDateTime;
use DateTimeZone;
use Throwable;

function getUser($user)
{
    $response = APIRequest::getRequest("users/id/" . $user);
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao listar horas formativas de usuário $user. Error: " . $response["message"], "getHoursUser", "error");
    return $response;
}

function getUserTimelines($user)
{
    $response = APIRequest::getRequest("system/timelines-user/" . $user);
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao listar horas formativas de usuário $user. Error: " . $response["message"], "getHoursUser", "error");
    return $response;
}

function getReferenceTimelines($reference)
{
    $response = APIRequest::getRequest("system/timelines-proccess/" . $reference);
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao listar horas formativas de referencia $reference. Error: " . $response["message"], "getHoursUser", "error");
    return $response;
}

function listStudents()
{
    $response = APIRequest::getRequest("users/all-students");
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao listar estudantes. Error: " . $response["message"], "listStudents", "error");
    return $response;
}

function listTeachers()
{
    $response = APIRequest::getRequest("users/all-teachers");
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao listar professores. Error: " . $response["message"], "listTeachers", "error");
    return $response;
}

function listServers()
{
    $response = APIRequest::getRequest("users/all-servers");
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao listar servidores. Error: " . $response["message"], "listServers", "error");
    return $response;
}

function listAdmins()
{
    $response = APIRequest::getRequest("users/all-admins");
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao listar admins. Error: " . $response["message"], "listAdmins", "error");
    return $response;
}

function getMyRequestsStudent()
{
    $response = APIRequest::getRequest("requests/all-requests-as-student");
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao listar admins. Error: " . $response["message"], "getMyRequestsStudent", "error");
    return $response;
}
