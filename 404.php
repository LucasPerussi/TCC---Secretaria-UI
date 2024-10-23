<?php

use API\Controller\Config;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>WeJourney - 404 Not Found</title>
  <link rel="apple-touch-icon" href="<?= Config::BASE_URL ?>src/img/icone.ico">
  <link rel="shortcut icon" type="image/x-icon" href="<?= Config::BASE_URL ?>src/img/icone.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="./style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="5; URL='<?= Config::BASE_URL . 'dashboard'?>'" />
  <style>
    @import url("https://fonts.googleapis.com/css?family=Raleway:400,400i,700");
    @import url("https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap");

    * {
      font-family: Raleway, sans-serif;
    }

    html,
    body,
    .container {
      width: 100%;
      height: 100%;
      padding: 0;
      margin: 0;
      font-family: "Inter", sans-serif;

    }

    .container {
      background: #001011;
      display: flex;
      align-items: center;
      justify-content: center;
      flex-wrap: wrap;
    }

    .content {
      margin: 20px;
    }

   

    .text-center {
      text-align: center;
      font-family: "Inter", sans-serif;

    }

    .color-white-shadow {
      color: #fff;
      font-family: "Inter", sans-serif;

      text-shadow: 0 -1px #fff;
    }

    /*
@keyframes mask {
  50% {
    transform: scale(1.05);
  }
}
*/
  </style>
</head>

<body>
  <!-- partial:index.partial.html -->
  <div class="container">
    <div class="content">
      <h1 class="color-white-shadow text-center">Are you lost?<br><small style="font-size:18px; font-weight:300;">404 Not Found</small></h1>
      <h1 style="font-size:100px; font-weight:900; color: #00BBD3;text-align:center;">404</h1>
      <p class="color-white-shadow text-center">We couldn't find the page you were looking for! 😢 <br>We'll redirect you in a few seconds.</p>
      <br />
      <img src="<?=Config::BASE_URL?>/src/img/logo/SEPT logo_branco.webp" alt="logo" style="width:50%; margin-left:25% !important;">

    </div>
  </div>
  <!-- partial -->

</body>

</html>