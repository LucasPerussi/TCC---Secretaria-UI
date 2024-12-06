<?php
namespace API\Controller\Mural;

use API\Controller\DefaultController;
use API\Model\Mural\MuralModel;

date_default_timezone_set('America/Sao_Paulo');

class Mural extends DefaultController
{
    private $muralModel;
    private $sessionUserId;

    public function __construct()
    {
        parent::__construct();

        $this->muralModel = new MuralModel();
        if (isset($_SESSION["user_id"])) {
            $this->sessionUserId = $_SESSION["user_id"];
        }
    }
   
    public function newMural($titulo, $descricao, $curso, $visivel)
    {

        if (!$this->sessionUserId) {
            return [
                "status" => "error",
                "message" => "O ID do aluno é obrigatório."
            ];
        }

        return $this->muralModel->newMural($titulo, $descricao, $curso, $visivel);
    }
}