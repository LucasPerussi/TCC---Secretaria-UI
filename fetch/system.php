<?php

namespace API\Fetch;

use API\Controller\Config;
use API\Model\APIRequest;
// use API\Fetch\DateTime;
use API\Model\Logger;
use DateTime as GlobalDateTime;
use DateTimeZone;
use Throwable;


function getLast50Logs()
{
    $response = APIRequest::getRequest("system/logs/last50");
    if (!isset($response["error"])){
        return $response;
    }; 
    Logger::log($_SESSION["user_id"], "Erro ao listar últimos 50 logs. Error: " . $response["message"], "getLast50Logs", "error");
    return $response;
}


