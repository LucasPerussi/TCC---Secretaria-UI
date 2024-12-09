<?php

namespace API\Fetch;

use API\Model\APIRequest;
use API\Model\Logger;


function getChamados()
{
    $response = APIRequest::getRequest("users/all-admins");
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao Listar Chamados: " . $response["message"], "getChamados", "error");
    return $response;
}

function getMyStudentRequests($aluno)
{
    $response = APIRequest::getRequest("requests/processes-student/" . $aluno);
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao Listar Chamados: " . $response["message"], "getMyStudentRequests", "error");
    return $response;
}

function getMyOpenStudentRequests($aluno)
{
    $response = APIRequest::getRequest("requests/processes-student-open/" . $aluno);
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao Listar Chamados: " . $response["message"], "getMyOpenStudentRequests", "error");
    return $response;
}

function getMyTeacherRequests($professor)
{
    $response = APIRequest::getRequest("requests/processes-professor/" . $professor);
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao Listar Chamados: " . $response["message"], "getMyTeacherRequests", "error");
    return $response;
}

function getMyOpenTeacherRequests($professor)
{
    $response = APIRequest::getRequest("requests/processes-professor-open/" . $professor);
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao Listar Chamados: " . $response["message"], "getMyOpenTeacherRequests", "error");
    return $response;
}

function getAllRequests()
{
    $response = APIRequest::getRequest("requests/all");
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao Listar Chamados: " . $response["message"], "getMyOpenTeacherRequests", "error");
    return $response;
}

