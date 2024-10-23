<?php

namespace API\Router\Action;

use Firebase\JWT\JWT;
use Firebase\JWT\JWK;
use Firebase\JWT\Key;


use API\Model\Logger;
use API\Controller\Config;
use API\Controller\User as UserController;
use API\Controller\Company as CompanyController;
use API\Controller\Tickets as TicketsController;
use API\Controller\System as SystemController;



use Exception;

use API\Controller\CSRFToken;

use function API\Validator\JSON\fields;

date_default_timezone_set('America/Sao_Paulo');


class Route extends \API\Router\DefaultRouter

{
    public UserController $userController;
    public CompanyController $companyController;
    public TicketsController $ticketsController;
    public SystemController $systemController;

    public function __construct()
    {
        parent::__construct();
        $this->prefix = "/action";

        $this->userController = new UserController();
        $this->companyController = new CompanyController();
        $this->ticketsController = new TicketsController();
        $this->systemController = new SystemController();

        $obj = $this;
    
        $this->addRoute("post", "/logn", function ($args) use ($obj) {
            $obj->login();
        });
      
    }


    public function login()
    {
        $body = $this->getBody();
        fields(["email", "password", "csrf_token"], $body, false);

        $clientSynced = CSRFToken::validate($body["csrf_token"], "ACTION - newContentRoute");
        if (!$clientSynced) {
            return "Erro, algo não parece certo!";
        }
        echo json_encode($this->userController->login($body["email"], $body["password"]));
    }

  
}
