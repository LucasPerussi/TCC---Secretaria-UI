<?php

namespace API\Fetch;

use API\Model\APIRequest;
use API\Model\Logger;


function getAlunos()
{
    $response = APIRequest::getRequest("users/all-students");
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao Listar Alunos: " . $response["message"], "getAlunos", "error");
    return $response;
}

