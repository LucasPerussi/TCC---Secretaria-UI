<?php
namespace API\Validator\Worker;

function name(string $username) {
    return strlen($username) >= 3;
}

function pin(string $pin) {
    return strlen($pin) == 6;
}

function uniqueUsername(string $username) {
    $user = new \API\Controller\Worker();
    return !$user->usernameExists($username);
}
