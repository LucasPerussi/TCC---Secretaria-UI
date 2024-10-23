<?php
namespace API\Validator\GET;

function fields(array $fields) {
    foreach($fields as $field) {
        if(!isset($_GET[$field])) {
            $error_template["error"] = true;
            $error_template["message"] = "Query incompleta. Campos exigidos: " . implode(", ", $fields);
            echo \Siler\Encoder\Json\encode($error_template);
            http_response_code(\API\Helper\HTTP\BAD_REQUEST["code"]);
            return false;
        }
    }
    return true;
}