<?php

namespace API\Model\Entities;

use API\Controller\Config;
use API\Model\Sanitize;
use API\Model\APIRequest;

class EntitiesModel
{
    public function changeRole($user, $role)
    {
        $role = Sanitize::clean($role, "role", "changeRole");
        $user = Sanitize::clean($user, "user", "changeRole");

        $url = Config::API_URL . "users/role";
        $data = [
            'user' => intval($user, 10),
            'role' => intval($role, 10)
        ];

        return APIRequest::patchRequest($url, $data, "changeRole");
    }
}
