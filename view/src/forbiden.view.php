<?php

use API\Controller\Config;
 
?>
  <html>
  <head>
  </head>
  <?php
      require __DIR__."/../../".Config::BASE_PATH_JS . str_replace(".view", ".js.php", basename(__FILE__, ".php"));
  ?>
  <script>forbiden();</script>
   
</html>