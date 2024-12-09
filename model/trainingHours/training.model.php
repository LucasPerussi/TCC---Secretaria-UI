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

    public function registerFH($descricao, $data_evento, $horas_solicitadas, $tipo, $comprovante)
    {
        $descricao = Sanitize::clean($descricao, "descricao", "registerFH");
        $data_evento = Sanitize::clean($data_evento, "data_evento", "registerFH");
        $horas_solicitadas = Sanitize::clean($horas_solicitadas, "horas_solicitadas", "registerFH");
        $comprovante = Sanitize::clean($comprovante, "comprovante", "registerFH");
        $tipo = Sanitize::clean($tipo, "tipo", "registerFH");
        $aluno = $_SESSION["user_id"];

        $url = Config::API_URL . "hours/new";

        $data = [
            'aluno' => $aluno,
            'descricao' => $descricao,
            'data_evento' => $data_evento,
            'horas_solicitadas' => $horas_solicitadas,
            'tipo' => $tipo,
            'comprovante' => $comprovante

        ];

        return APIRequest::postRequest($url, $data, "registerFH");
    
    }

    public function validateHours($justificativa, $horas_concedidas, $identificador)
    {
        $justificativa = Sanitize::clean($justificativa, "justificativa", "registerFH");
        $horas_concedidas = Sanitize::clean($horas_concedidas, "horas_concedidas", "registerFH");
        $identificador = Sanitize::clean($identificador, "identificador", "registerFH");
        $validador = $_SESSION["user_id"];

        $url = Config::API_URL . "hours/validate";

        $data = [
            'justificativa' => $justificativa,
            'horas_concedidas' => $horas_concedidas,
            'validador' => $validador,
            'identificador' => $identificador
        ];

        return APIRequest::postRequest($url, $data, "validateHours");

    }
}