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
