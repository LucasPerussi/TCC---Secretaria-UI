<?php
namespace API\Fetch;

use API\Model\APIRequest;
use API\Model\Logger;

function getInternshipById($id)
{
    $response = APIRequest::getRequest("internship/id/" . $id);
    if (!isset($response["error"])) {
        return $response;
    }    
   Logger::log($_SESSION["user_id"], "Erro ao buscar informações do estágio. Error: " . $response["message"], "getInternshipById", "error");
    return $response;    
}


function getStudentInternship($id)
{
    $response = APIRequest::getRequest("internship/all/" . $id);
    if (!isset($response["error"])) {
        return $response;
    }    
    Logger::log($_SESSION["user_id"], "Erro ao buscar informações do estágio. Error: " . $response["message"], "getStudentInternship", "error");
    return $response;   
}

function getAllInternship()
{
    $response = APIRequest::getRequest("internship/all");
    if (!isset($response["error"])) {
        return $response;
    }    
    Logger::log($_SESSION["user_id"], "Erro ao buscar informações do estágio. Error: " . $response["message"], "getAllInternship", "error");
    return $response;   
}


function getLatestInternship($id)
{
    $response = APIRequest::getRequest("internship/recent-by-student/" . $id);
    if (!isset($response["error"])) {
        return $response;
    }    
    Logger::log($_SESSION["user_id"], "Erro ao buscar informações do estágio. Error: " . $response["message"], "getLatestInternship", "error");
    return $response;   
}

