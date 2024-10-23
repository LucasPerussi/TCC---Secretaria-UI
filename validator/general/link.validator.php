<?php
namespace API\Validator\Link;

function nome(string $nome) {
    return strlen($nome) >= 3;
}

function url(string $url) {
    return filter_var($url, FILTER_VALIDATE_URL);
}