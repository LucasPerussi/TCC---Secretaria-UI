<?php
namespace API\Controller\TrainingHours;

use API\Controller\DefaultController;
use API\Model\TrainingHours\TrainingModel;

date_default_timezone_set('America/Sao_Paulo');

class Training extends DefaultController
{
    private $trainingModel;
    private $sessionUserId;

    public function __construct()
    {
        parent::__construct();

        $this->trainingModel = new TrainingModel();
        if (isset($_SESSION["user_id"])) {
            $this->sessionUserId = $_SESSION["user_id"];
        }
    }

    public function getStudentHours($id = null)
    {
        if (!$id && isset($this->sessionUserId)) {
            $id = $this->sessionUserId;
        }

        if (!$id) {
            return [
                "status" => "error",
                "message" => "O ID do aluno é obrigatório."
            ];
        }

        return $this->trainingModel->getStudentHours($id);
    }
   
    public function registerFH($descricao, $data_evento, $horas_solicitadas, $tipo, $comprovante)
    {

        if (!$this->sessionUserId) {
            return [
                "status" => "error",
                "message" => "O ID do aluno é obrigatório."
            ];
        }

        return $this->trainingModel->registerFH($descricao, $data_evento, $horas_solicitadas, $tipo, $comprovante);
    }
}