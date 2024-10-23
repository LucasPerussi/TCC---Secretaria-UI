<?php
namespace API\Validator\User;

function nome(string $nome) {
    return strlen($nome) >= 5 && strpos($nome, " ") !== false;
}

function emailValido(string $email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function emailUnico(string $email) {
    $user = new \API\Controller\Usuario();
    return !$user->emailExistente($email);
}

function senha(string $senha) {
    $tamanho = strlen($senha) >= \API\Controller\Config::MIN_TAMANHO_SENHA;
    $upper = preg_match('@[A-Z]@', $senha);
    $lower = preg_match('@[a-z]@', $senha);
    $num = preg_match('@[0-9]@', $senha);
    $esp = preg_match('@[^\w]@', $senha);
    
    return $tamanho && $upper && $lower && $num && $esp;
}