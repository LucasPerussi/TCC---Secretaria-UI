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
    public function getStudentInternship($id)
    {        
        $id = Sanitize::clean($id, "id", "getStudentInternship");   
        $url = Config::API_URL . "internship/all/$id";             
        $result = APIRequest::getRequest($url, "getStudentInternship");
        return APIRequest::handleResponse($result, "getStudentInternship");
    }

    public function registerInternship($professor_orientador, $empresa, $area_atuacao, $data_inicio, $duracaoMeses)
    {
        
        $professor_orientador = Sanitize::clean($professor_orientador, "professor_orientador", "registerInternship");
        $empresa = Sanitize::clean($empresa, "empresa", "registerInternship");
        $area_atuacao = Sanitize::clean($area_atuacao, "area_atuacao", "registerInternship");
        $data_inicio = Sanitize::clean($data_inicio, "data_inicio", "registerInternship");
        $duracaoMeses = Sanitize::clean($duracaoMeses, "duracaoMeses", "registerInternship");
        $aluno = $_SESSION["user_id"];

        $url = Config::API_URL . "internship/new";

        $data = [
            'aluno' => intval($aluno,10),
            'professor_orientador' => intval($professor_orientador,10),
            'empresa' => intval($empresa,10),
            'area_atuacao' => $area_atuacao,
            'data_inicio' => $data_inicio,
            'duracaoMeses' => intval($duracaoMeses,10)

        ];
        
        return APIRequest::postRequest($url, $data, "registerInternship");
    
    }

}
