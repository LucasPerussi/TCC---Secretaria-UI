<?php
$auto_load_files_imported = 0;
$auto_load_time = microtime(true);

$dirs = new SplQueue();

require_once "controller/_default.controller.php";
require_once "router/_default.router.php";

$auto_load_files_imported += 3;

$dirs->enqueue(__DIR__ . "/language");
// $dirs->enqueue(__DIR__ . "/helper");
$dirs->enqueue(__DIR__ . "/tests");
$dirs->enqueue(__DIR__ . "/controller");
$dirs->enqueue(__DIR__ . "/model");
$dirs->enqueue(__DIR__ . "/fetch");
$dirs->enqueue(__DIR__ . "/enum");
$dirs->enqueue(__DIR__ . "/router");
$dirs->enqueue(__DIR__ . "/validator");


while(!$dirs->isEmpty()) {
    $elem = $dirs->dequeue();

    foreach (scandir($elem) as $filename) {
        $first_char = str_split($filename)[0];

        if($first_char == '_' || $first_char == '.' || $first_char == '#')
            continue;

        $path = $elem . '/' . $filename;
        if (is_file($path)) {
            $auto_load_files_imported++;
            require_once $path;
        } else if(is_dir($path)) {
            $dirs->enqueue($path);
        }
    }
}

$auto_load_time = number_format((microtime(true) - $auto_load_time), 4);