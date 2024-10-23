<?php

use API\Controller\Config;

if((isset($_GET["code"])) && (!isset($_SESSION["old-session-key"])) ){
    $_SESSION["old-session-key"] = $_SESSION["session_key"];
    $_SESSION["session_key"] = $_GET["code"];
    
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
            <h1>Invalid Session Code!</h1>
            <meta http-equiv='Refresh' content='5; url=" . Config::BASE_URL . "master/session-by-user';?>' 
        </head>
    </html>
    
    ");
}



