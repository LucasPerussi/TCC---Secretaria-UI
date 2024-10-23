<?php
namespace API\Controller;

use function Siler\Str\camel_case;

class DefaultController {
    public array $template_retorno;

    public function __construct() {
    }

    // public function set(string $key, $value) {
    //     $retorno = $this->template_retorno;
    //     $key = "set" . camel_case($key);
    //     try {
    //         $this->model->$key($value);
    //     } catch(\Exception $e) {
    //         $retorno["error"] = true;
    //         $retorno["message"] = $e->getMessage();
    //         $retorno["code"] = $e->getCode();
    //     }

    //     return $retorno;
    // }  
}