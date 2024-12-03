<?php

namespace API\Model;

use API\Controller\Config;

class APIRequest
{
    // public static function getRequest($url, $methodName)
    // {
    //     $ch = curl_init($url);

    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_HTTPGET, true);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, [
    //         'Content-Type: application/json',
    //     ]);

    //     $response = curl_exec($ch);

    //     if (curl_errno($ch)) {
    //         $error_msg = curl_error($ch);
    //         curl_close($ch);
    //         return [
    //             'status' => 'error',
    //             'message' => "Erro ao se concetar à API no método {$methodName}: " . $error_msg
    //         ];
    //     }

    //     $httpcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    //     curl_close($ch);

    //     return [
    //         'status' => $httpcode,
    //         'response' => $response
    //     ];
    // }


    public static function getRequest($endpoint)
    {
        $options = [
            CURLOPT_URL => Config::API_URL . $endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => [
                'Authorization: ' . $_SESSION['user_token'],
            ],
        ];

        $curl = curl_init();
        curl_setopt_array($curl, $options);

        $response = curl_exec($curl);

        if (curl_errno($curl)) {
            echo 'Erro na requisição: ' . curl_error($curl);
        } else {
            $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
            curl_close($curl);

            if ($http_code == 200) {
                $result_array = json_decode($response, true);
                if (is_null($result_array)) {
                    return array(
                        "error" => true,
                        "message" => "Nenhum registro encontrado"
                    );
                } else {
                    return $result_array;
                }
            } else {
                return array(
                    "error" => true,
                    "message" => "Erro interno ($http_code)"
                );
            }
        }
    }


    public static function postRequest($url, $data, $methodName)
    {

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
    public static function patchRequest($url, $data, $methodName)
    {
        $ch = curl_init($url);
    
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PATCH');
    
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
    public static function deleteRequest($url, $methodName)
    {
        $ch = curl_init($url);
    
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'DELETE');
    
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: ' . $_SESSION['user_token'],
        ]);
        
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
            $_SESSION['user_token'] = $responseData['token'];
            $_SESSION['user_picture'] = Config::BASE_URL . $responseData['user']['picture'] ;
            if ($_SESSION['user_picture'] == "") {
                $_SESSION['user_picture'] = Config::BASE_URL . "src/img/avatars/generic.webp";
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
            $_SESSION['user_picture'] = Config::BASE_URL . $responseData['user']['picture'] ;
            if ($_SESSION['user_picture'] == "") {
                $_SESSION['user_picture'] = Config::BASE_URL . "src/img/avatars/generic.webp";
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
