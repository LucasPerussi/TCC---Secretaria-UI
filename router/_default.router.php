<?php
namespace API\Router;

use API\Controller\App;
use API\ENUM\Retorno;

class DefaultRouter {
    protected array $routes;
    public string $prefix = "";

    public function __construct() {
        $this->routes = [];
    }

    public function addRoute($method, $path, $resolver) {
        $route = [$method, $this->prefix.$path, $resolver];
        array_push($this->routes, $route);
    }

    public function getRoutes() {
        return $this->routes;
    }

    public function obterInformacoesRequisicao() {
        // Obtém todos os cabeçalhos da requisição
        $headers = getallheaders();
    
        // Obtém o método da requisição (GET, POST, etc.)
        $method = $_SERVER['REQUEST_METHOD'];
    
        // Obtém a URI da requisição
        $uri = $_SERVER['REQUEST_URI'];
    
        // Obtém a string do corpo da requisição
        $body = file_get_contents("php://input");
    
        // Monta um array com as informações da requisição
        $informacoesRequisicao = array(
            'metodo' => $method,
            'uri' => $uri,
            'cabecalhos' => $headers,
            'corpo' => $body
        );
    
        // Retorna as informações em formato JSON
        return json_encode($informacoesRequisicao);
    }

    public function getHeaders() {
        $headers = getallheaders();
        return $headers;
    }

    // public function getBody() {
    //     $contentType = isset($_SERVER['CONTENT_TYPE']) ? trim($_SERVER['CONTENT_TYPE']) : '';
    
    //     // Se a requisição for multipart/form-data, tratar arquivos e dados do formulário
    //     if (strpos($contentType, 'multipart/form-data') !== false) {
    //         $body = [];
            
    //         // Adicionar dados de texto
    //         if (!empty($_POST)) {
    //             $body = $_POST;
    //         }
    
    //         // Adicionar arquivos
    //         if (!empty($_FILES)) {
    //             $body['files'] = $_FILES;
    //         }
    
    //         return $body;
    //     }
    
    //     // Se a requisição não for multipart/form-data, tratar como JSON
    //     try {
    //         $json = file_get_contents("php://input");
    //         $body = \Siler\Encoder\Json\decode($json, true); // Decodificar JSON como array associativo
    //     } catch (\Exception $e) {
    //         echo "Algo não parece certo!";
    //         exit();
    //     }
    
    //     return $body;
    // }
    
    

    public function getBody() {
        $dados = [];
        try {
            
            $dados = \Siler\Encoder\Json\decode(file_get_contents("php://input"));
        } catch(\Exception $e) {
            // $error_template["error"] = true;
            // $error_template["message"] = "JSON Inválido";
            // echo \Siler\Encoder\Json\encode($error_template);
            // var_dump($e);
            echo "Algo não parece certo!";
            exit();
        }

        return $dados;
    }


    public function getBodyWithFiles() {
        $body = [];
    
        // Adicionar dados de texto
        if (!empty($_POST)) {
            $body = $_POST;
        }
    
        // Adicionar arquivos
        if (!empty($_FILES)) {
            $body['files'] = $_FILES;
        }
    
        return $body;
    }
    
    

}