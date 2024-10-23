<?php

use API\Controller\Config;

$page_title = "Login";

?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
  <?php
  require __DIR__ . "/../head.php"
  ?>
  <link rel="stylesheet" href="src/css/login.css">
  <!--
  <link rel="stylesheet" type="text/css" href="<?= Config::BASE_CSS . str_replace(".view", ".css", basename(__FILE__, ".php")) ?>">-->
</head>
<!-- END: Head-->



<!-- BEGIN: Body-->
<body class="horizontal-layout horizontal-menu blank-page navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="blank-page">
  <!-- BEGIN: Content-->
  <div class="app-content content ">
  <a href="<?=Config::BASE_URL . "logout"?>" style="position:fixed; left:5%; top:5%; padding:10px; z-index: 9; background-color:dimgray; border-radius:6px; color:ghostwhite;">Sigout</a>    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
      <div class="content-header row">
      </div>
      <div class="content-body">
        <div class="auth-wrapper auth-basic px-2">
          <div class="auth-inner my-2">
            <!-- Login basic -->
            <div class="card mb-0">
              <div class="card-body">
              
                <a href="<?= Config::BASE_URL . '' ?>" class="brand-logo">
                  <img src="src/img/logo-cor.svg" height="45" width="135" alt="logo">
                </a>  
                <h4>New location detected! 📍</h4>
                <form id="confirm-location" class="auth-login-form mt-2">
                  <div class="mb-1">
                  <label for="login-email" class="form-label">We have noticed that you just accessed your account from a new location. To make sure it was you,<b> we have sent you a <span style="color:blueviolet;">confirmation code </span>to your email box</b>. Take note of it and enter below: </label>
                  </div>

                  <div class="mb-1">
                    <div class="d-flex justify-content-between">
                      <label style="font-size:14px;" class="form-label" for="login-password">Code:</label>
                    </div>
                    <div class="input-group input-group-merge form-password-toggle">
                      <input type="text" class="form-control form-control-merge" <?php if (isset($_GET["code"])) { $code = $_GET["code"]; echo("value='{$code}'");} ?> id="login-password" name="code" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="login-password" />
                      <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                    </div>
                  </div>
            
                  <button class="btn btn-primary w-100" tabindex="4">Confirm New Location</button>
                  
                </form>
              <!--<button  class="btn  w-100"style="margin-top: 1%; background-color:gray; color: white;" tabindex="4">Resend Confirmation</button>-->

              </div>
            </div>

          </div>
        </div>
        <ul class="bg-bubbles">
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
          <li></li>
        </ul>
        <!-- /Login basic -->

      </div>
    </div>
  </div>
  <!-- END: Content-->

  <?php
    require __DIR__."/../default.js.php";
  ?>
  <!-- PAGE JS -->
  <script src="<?= Config::BASE_URL ?>layout/app-assets/js/scripts/pages/auth-login.js"></script>
  <?php
      require __DIR__."/../../".Config::BASE_PATH_JS . str_replace(".view", ".js.php", basename(__FILE__, ".php"));
  ?>
</body>
<!-- END: Body-->

</html>