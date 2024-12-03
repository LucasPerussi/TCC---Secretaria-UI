<?php

namespace API\Model;

use API\Model\Logger;
use API\Controller\Config;
use API\Model\UserModel;


use function API\Fetch\canHaveWppSupport;
use function API\Fetch\getCompanyIdByEmail;



class SystemModel
{
    private $user;
    private $company;
    private $dbConnection;
    private $dbLogsConnection;
    private $dbFilesConnection;
    private $userModel;
    private $username;

    public function __construct()
    {
        $this->userModel = new UserModel();
        if (isset($_SESSION["user_id"])) {
            $this->user = $_SESSION["user_id"];
         
        }
    }

    public function newProcessType($nome, $fluxograma, $hrs_resposta, $hrs_resolucao)
    {
        $nome = Sanitize::clean($nome, "nome", "newProcessType");
        $fluxograma = Sanitize::clean($fluxograma, "fluxograma", "newProcessType");
        $hrs_resposta = Sanitize::clean($hrs_resposta, "hrs_resposta", "newProcessType");
        $hrs_resolucao = Sanitize::clean($hrs_resolucao, "hrs_resolucao", "newProcessType");
  
        $url = Config::API_URL . "request-type/new";

        $data = [
            'nome' => $nome,
            'fluxograma' => $fluxograma,
            'hrs_resposta' => $hrs_resposta,
            'hrs_resolucao' => $hrs_resolucao

        ];

        return APIRequest::postRequest($url, $data, "newProcessType");
    
    }

    public function newField($nome, $label, $tipo_dado)
    {
        $nome = Sanitize::clean($nome, "nome", "newField");
        $label = Sanitize::clean($label, "label", "newField");
        $tipo_dado = Sanitize::clean($tipo_dado, "tipo_dado", "newField");
  
        $url = Config::API_URL . "fields/new-type";

        $data = [
            'nome' => $nome,
            'label' => $label,
            'tipo_dado' => $tipo_dado,
            'padrao' => 1,
            'obrigatorio' => 0,
        ];

        return APIRequest::postRequest($url, $data, "newProcessType");
    
    }
}
   
