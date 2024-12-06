<?php
namespace API\Model\Internship;

use API\Controller\Config;
use API\Model\Sanitize;
use API\Model\APIRequest;

class InternshipModel
{
    public function getInternship($id)
    {
        
        $id = Sanitize::clean($id, "id", "getInternship");

        
        $url = Config::API_URL . "internship/id/$id";

       
        $result = APIRequest::getRequest($url, "getInternship");

       
        return APIRequest::handleResponse($result, "getInternship");
    }
}
