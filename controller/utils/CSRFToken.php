<?php
namespace API\Controller;

use API\Controller\Config;
use API\Model\Logger;

class CSRFToken
{
    public static function generate()
    {
        $stateToken = bin2hex(random_bytes(32));
        $_SESSION['csrf_token'] = $stateToken;
        return $stateToken;
    }

    public static function validate($tokenComingFromForm, $function){
        if ((isset($_SESSION["csrf_token"])) && ($_SESSION["csrf_token"] == $tokenComingFromForm)){
            return true;
        }
        else {
            Logger::log($_SESSION["user_id"] ?? 9999, "CLIENT-SIDE DESYNC ALERT! - Token Expected " . $_SESSION["csrf_token"] . " but received $tokenComingFromForm", "$function", "ERRO (C.S. DESYNC) ");
            session_unset();
            session_destroy();
            return false;
        }
    }
}


// PROTEÇÃO CONTRA CLIENT-SIDE DESYNC
// O METODO CONSISTE EM GERAR UM CSRF TOKEN PARA CADA SESSÃO E INSERIR EM TODOS OS FORMULÁRIOS. NA HORA DE ENVIAR VIA POST OS DADOS DO FORM 
// COMPARAMOS O CÓDIGO ENVIADO PELO FORMULARIO COM O DA SESSÃO DO SERVIDOR, SE ELES NÃO BATEREM, FINALIZA A SESSÃO E BARRA A EXECUÇÃO 