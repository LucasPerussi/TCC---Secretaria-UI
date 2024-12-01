<?php 
namespace API\Model;

class APIRequest
{
    public static function getRequest($url, $methodName)
    {
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPGET, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
            curl_close($ch);
            return [
                'status' => 'error',
                'message' => "Erro ao se concetar à API no método {$methodName}: " . $error_msg
            ];
        }

        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return [
            'status' => $httpcode,
            'response' => $response
        ];
    }

    public static function postRequest($url, $data, $methodName)
    {
        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            $error_msg = curl_error($ch);
            curl_close($ch);
            return [
                'status' => 'error',
                'message' => "Erro ao se conectar à API no método {$methodName}: " . $error_msg
            ];
        }

        $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        return [
            'status' => $httpcode,
            'response' => $response
        ];
    }

    public static function handleResponse($result, $method)
    {
        if ($result['status'] === 200) {
            $responseData = json_decode($result['response'], true);
            $_SESSION['user_id'] = $responseData['user']['id'];
            $_SESSION['user_name'] = $responseData['user']['name'];
            $_SESSION['user_email'] = $responseData['user']['email'];
            $_SESSION['user_role'] = $responseData['user']['role'];
            $_SESSION['user_picture'] = $responseData['user']['picture'] ?? "https://i.imgur.com/QGmfkja.png";
            if ( $_SESSION['user_picture'] == ""){
                $_SESSION['user_picture'] = "https://i.imgur.com/QGmfkja.png";
            }

            if (isset($responseData['token'])) {
                return [
                    'status' => 'success',
                    'token' => $responseData['token'],
                    'user' => $responseData['user']
                ];
            } else {
                return [
                    'status' => 'error',
                    'message' => "Falha ao autenticar. Resposta inesperada da API no método {$method}."
                ];
            }
        } elseif ($result['status'] === 201) {
            $responseData = json_decode($result['response'], true);
            $_SESSION['user_id'] = $responseData['user']['id'];
            $_SESSION['user_name'] = $responseData['user']['name'];
            $_SESSION['user_email'] = $responseData['user']['email'];
            $_SESSION['user_role'] = $responseData['user']['role'];
            $_SESSION['user_picture'] = $responseData['user']['picture'] ?? "https://i.imgur.com/QGmfkja.png";
            if ( $_SESSION['user_picture'] == ""){
                $_SESSION['user_picture'] = "https://i.imgur.com/QGmfkja.png";
            }

            if (isset($responseData['token'])) {
                return [
                    'status' => 'success',
                    'token' => $responseData['token'],
                    'user' => $responseData['user']
                ];
            } else {
                return [
                    'status' => 'error',
                    'message' => "Falha ao autenticar. Resposta inesperada da API no método {$method}."
                ];
            }
        } elseif ($result['status'] === 400) {
            $responseData = json_decode($result['response'], true);
            return [
                'status' => 'error',
                'message' => isset($responseData['message']) ? $responseData['message'] : 'Registro UFPR ou email já utilizados!'
            ];
        } elseif ($result['status'] === 401) {
            $responseData = json_decode($result['response'], true);
            return [
                'status' => 'error',
                'message' => isset($responseData['message']) ? $responseData['message'] : 'Credenciais incorretas.'
            ];
        } else {
            return [
                'status' => 'error',
                'message' => "Erro inesperado no método {$method}. Status: " . $result['status']
            ];
        }
    }
}
