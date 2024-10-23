<?php
namespace API\Validator\JSON;

use API\Controller\Config;
use SplStack;

function checkType(mixed $value, string $type) {
    switch($type) {
        case Config::STRING: {
            return \is_string($value);
        }
        case Config::INT: {
            return \is_int($value);
        }
        case Config::FLOAT: {
            return \is_float($value);
        }
        case Config::BOOL: {
            return \is_bool($value);
        }
        default: {
            return true;
        }
    }
}

function fields(array $fields, array $body, bool $strong_verification = true) {
    if($strong_verification) {
        $stack = new SplStack();
        $stack->push([ $fields, $body ]);

        while(!$stack->isEmpty()) {
            $el = $stack->pop();
            
            $fields = $el[0];
            $body = $el[1];

            foreach($fields as $field => $children) {
                if(\is_numeric($field)) {
                    foreach($body as $list) {
                        $stack->push([ $children, $list ]);
                    }
                    break;
                }

                if(!isset($body[$field])) {
                    $error_template["error"] = true;
                    $error_template["message"] = "JSON incompleto";
                    echo \Siler\Encoder\Json\encode($error_template);
                    return false;
                }

                if(\is_array($children)) {
                    $stack->push([ $children, $body[$field] ]);
                } else {
                    if(!checkType($body[$field], $children)) {
                        $error_template["error"] = true;
                        $error_template["message"] = "Informação inválida";
                        echo \Siler\Encoder\Json\encode($error_template);
                        return false;
                    }
                }
            }
        }

        return true;
    }

    foreach($fields as $field) {
        if(!isset($body[$field])) {
            $error_template["error"] = true;
            $error_template["message"] = "JSON incompleto";
            // echo \Siler\Encoder\Json\encode($error_template);
            return false;
        }
    }
    return true;
}