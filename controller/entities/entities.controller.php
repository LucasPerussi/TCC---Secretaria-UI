<?php
namespace API\Controller\Entities;

use API\Controller\DefaultController;
use API\Model\Entities\EntitiesModel;

date_default_timezone_set('America/Sao_Paulo');

class Entities extends DefaultController
{
    private $entitiesModel;
    private $sessionUserId;

    public function __construct()
    {
        parent::__construct();

        $this->entitiesModel = new EntitiesModel();
        if (isset($_SESSION["user_id"])) {
            $this->sessionUserId = $_SESSION["user_id"];
        }
    }

    
   
    public function changeRole($user, $role)
    {

        if (!$this->sessionUserId) {
            return [
                "status" => "error",
                "message" => "O ID do aluno é obrigatório."
            ];
        }

        return $this->entitiesModel->changeRole($user, $role);
    }
}