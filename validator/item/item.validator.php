<?php
namespace API\Validator\Item;

function name(string $nome) {
    return strlen($nome) >= 2;
}

function validValue(float $value) {
    return $value >= 0.0;   
}