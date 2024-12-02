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
