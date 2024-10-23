<?php

use API\Controller\Config;

session_unset();
session_destroy();?>

<html>
  <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    
    <meta http-equiv="Refresh" content="0; url=<?= Config::BASE_URL ;?> " /> 

  </head>
  
</html>