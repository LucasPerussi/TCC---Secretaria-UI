<?php
namespace API\Model\TrainingHours;

use API\Controller\Config;
use API\Model\Sanitize;
use API\Model\APIRequest;

class TrainingModel
{
    private $userId;

    public function __construct()
    {
        if (isset($_SESSION["user_id"])) {
            $this->userId = $_SESSION["user_id"];
        }
    }

    public function getStudentHours($id)
    {
        $id = Sanitize::clean($id, "id", "getStudentHours");

        $url = Config::API_URL . "hours/by-student/$id";

        $result = APIRequest::getRequest($url, "getStudentHours");
        return APIRequest::handleResponse($result, "getStudentHours");
    }
}