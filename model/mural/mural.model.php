<?php
namespace API\Model\Mural;

use API\Controller\Config;
use API\Model\Sanitize;
use API\Model\APIRequest;

class MuralModel
{
    private $userId;

    public function __construct()
    {
        if (isset($_SESSION["user_id"])) {
            $this->userId = $_SESSION["user_id"];
        }
    }

    public function newMural($titulo, $descricao, $curso, $visivel)
    {
        $titulo = Sanitize::clean($titulo, "titulo", "newMural");
        $descricao = Sanitize::clean($descricao, "descricao", "newMural");
        $autor = $_SESSION["user_id"];
        $curso = Sanitize::clean($curso, "curso", "newMural");
        $visivel = Sanitize::clean($visivel, "visivel", "newMural");

        $url = Config::API_URL . "mural/new";

        $data = [
            'titulo' => $titulo,
            'descricao' => $descricao,
            'autor' => $autor,
            'curso' => $curso,
            'visivel' => $visivel
        ];

        return APIRequest::postRequest($url, $data, "newMural");
    
    }
}