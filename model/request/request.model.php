<?php
namespace API\Model\Request;

use API\Controller\Config;
use API\Model\Sanitize;
use API\Model\APIRequest;

class RequestModel
{
    private $userId;

    public function __construct()
    {
        if (isset($_SESSION["user_id"])) {
            $this->userId = $_SESSION["user_id"];
        }
    }

    public function registerRequest($titulo, $descricao, $professor_avaliador)
    {
        $titulo = Sanitize::clean($titulo, "titulo", "registerRequest");
        $descricao = Sanitize::clean($descricao, "descricao", "registerRequest");
        $professor_avaliador = Sanitize::clean($professor_avaliador, "professor_avaliador", "registerRequest");
        $aluno = $_SESSION["user_id"];

        $url = Config::API_URL . "requests/new";

        $data = [
            'aluno' => $aluno,
            'titulo' => $titulo,
            'descricao' => $descricao,
            'professor_avaliador' => $professor_avaliador
        ];

        return APIRequest::postRequest($url, $data, "registerRequest");
    
    }
}