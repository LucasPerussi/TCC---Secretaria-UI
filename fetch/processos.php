<?php

namespace API\Fetch;

use API\Model\APIRequest;
use API\Model\Logger;


function getProcessos()
{
    $response = APIRequest::getRequest("users/all-admins");
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao Listar getProcessos: " . $response["message"], "getProcessos", "error");
    return $response;
}

