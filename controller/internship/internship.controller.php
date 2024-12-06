<?php
namespace API\Controller\Internship;

use API\Controller\DefaultController;
use API\Model\Internship\InternshipModel;

class Internship extends DefaultController
{
    private $internshipModel;

    public function __construct()
    {
        parent::__construct();

      
        $this->internshipModel = new InternshipModel();
    }

    public function getInternshipById($id)
    {
        
        if (!$id) {
            return [
                "status" => "error",
                "message" => "O ID do estágio é obrigatório."
            ];
        }        
        return $this->internshipModel->getInternship($id);
    }
}
