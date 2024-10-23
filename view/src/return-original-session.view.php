<?php

use API\Controller\Config;

if (isset($_SESSION["old-session-key"])){
    $_SESSION["session_key"] = $_SESSION["old-session-key"];
    $_SESSION["old-session-key"] = null;


    require __DIR__."/../../".Config::BASE_PATH_JS . str_replace(".view", ".js.php", basename(__FILE__, ".php"));
    echo ("
    <html>
        <head>
            <script>loadData();</script>
            <!--<meta http-equiv='Refresh' content='0; url=" . Config::BASE_URL . "'/>-->
        </head>
    </html>
    ");
}else{
    echo ("
    <html>
        <head>
            <h1 style='text-align: center; margin-top:10%; font-family: Montserrat, sans-serif;'>Você já está em sua sessão original!</h1>
            <img src='https://media2.giphy.com/media/nVTa8D8zJUc2A/giphy.gif?cid=ecf05e47z4a6hw3fwuqeixpgglkzpdieia5ekw76b9zdsdb3&rid=giphy.gif&ct=g'>
            <meta http-equiv='Refresh' content='5; url=" . Config::BASE_URL . "master/session-by-user';?> 
        </head>
    </html>");
}



