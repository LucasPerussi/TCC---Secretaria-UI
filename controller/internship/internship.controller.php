<?php

namespace API\Controller\Internship;

use API\Controller\DefaultController;
use API\Model\Internship\InternshipModel;
use API\Model\APIRequest;

date_default_timezone_set('America/Sao_Paulo');

class Internship extends DefaultController
{
    private $internshipModel;
    private $sessionUserId;

    public function __construct()
    {
        parent::__construct();

        $this->internshipModel = new InternshipModel();
        if (isset($_SESSION["user_id"])) {
            $this->sessionUserId = $_SESSION["user_id"];
        }
    }


    

    public function registerInternship($professor_orientador, $empresa, $area_atuacao, $data_inicio, $duracaoMeses)
    {

        if (!$this->sessionUserId) {
            return [
                "status" => "error",
                "message" => "O ID do aluno é obrigatório."
            ];
        }

        return $this->internshipModel->registerInternship($professor_orientador, $empresa, $area_atuacao, $data_inicio, $duracaoMeses);
    }

    public function changeIS($id_estagio, $status)
    {

        if (!$this->sessionUserId) {
            return [
                "status" => "error",
                "message" => "O ID do aluno é obrigatório."
            ];
        }

        return $this->internshipModel->changeIS($id_estagio, $status);
    }
}
