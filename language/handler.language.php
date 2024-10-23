<?php
/*function __(string $string, ?array $params = null) {
    return ($params === null) ? $string : __p($string, $params);
}

function __p(string $str, array $params) {
	foreach ($params as $key => $value) {
		$str = str_replace("{" . $key . "}", $value, $str);
	}
	return $str;
}*/

function __(string $str, array $params = []) {
    // $_COOKIE["language"] = "pt";
    // // $_COOKIE["language"] = "en";

    if ((isset($_SESSION["user_language"])) && ($_SESSION["user_language"] == 2)){
        $data = require(__DIR__."/../src/locale/en.php");
    } else {
        $data = require(__DIR__."/../src/locale/pt.php");
    }

    $path = explode(".", $str);

    foreach($path as $key) {
        if(!isset($data[$key])) {
            $data = [];
            break;
        }

        $data = $data[$key];
    }

    if(!is_string($data)) {
        return $str;
    }

    foreach($params as $key => $value) {
        $data = str_replace("{{$key}}", $value, $data);
    }

    return $data;
} 