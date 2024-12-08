<?php
namespace API\Model;

use API\Controller\Config;

class Logger
{
    public static function log($user, $operation, $function, $status)
    {
        $url = Config::API_URL . "system/new-log";

        $data = [
            'funcao' => $function,
            'mensagem' => $operation,
            'status' => $status,
            'usuario' => $user,
           
        ];
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: ' . $_SESSION['user_token'],
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
            curl_close($ch);
            return [
                'status' => 'error',
                'message' => "Erro ao salvar log: " . $error_msg
            ];
        }

        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return;
    }
}