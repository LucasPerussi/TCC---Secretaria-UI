<?php

namespace API\Fetch;

use API\Controller\Config;
use API\Model\APIRequest;
// use API\Fetch\DateTime;
use API\Model\Logger;
use DateTime as GlobalDateTime;
use DateTimeZone;
use Throwable;


function getCourses()
{
    $response = APIRequest::getRequest("courses/all");
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao listar cursos do sistema. Error: " . $response["message"], "getCourses", "error");
    return $response;
}

function getCourseById($id)
{
    $response = APIRequest::getRequest("courses/id/" . $id);
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao listar curso. Error: " . $response["message"], "getCourseById", "error");
    return $response;
}

function getCourseByStudent($id)
{
    $response = APIRequest::getRequest("courses/by-user/" . $id);
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao listar curso. Error: " . $response["message"], "getCourseByStudent", "error");
    return $response;
}