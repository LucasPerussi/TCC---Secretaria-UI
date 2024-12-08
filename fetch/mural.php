<?php

namespace API\Fetch;

use API\Controller\Config;
use API\Model\APIRequest;
// use API\Fetch\DateTime;
use API\Model\Logger;
use DateTime as GlobalDateTime;
use DateTimeZone;
use Throwable;

function getMurais()
{
    $response = APIRequest::getRequest("mural/all");
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao listar postagens do mural. Error: " . $response["message"], "getMurais", "error");
    return $response;
}

function getMuralById($id)
{
    $response = APIRequest::getRequest("mural/identifier/" . $id);
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao mostrar postagem do mural. ID: $id. Error: " . $response["message"], "getMuralById", "error");
    return $response;
}