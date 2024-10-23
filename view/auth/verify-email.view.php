<?php

use API\Controller\Config;

$page_title = "Verify Email";

?>
<?php if (!isset($_SESSION["user_id"])):?>
  <html>
  <head>
    <meta http-equiv="Refresh" content="0; url=<?= Config::BASE_URL . "login";?> " />
  </head>
</html>
<?php else:?>
    <?php if($_SESSION["email_verified"] == 1):?>
        <html>
        <head>
            <meta http-equiv="Refresh" content="0; url=<?= Config::BASE_URL . "dashboard";?> " />
        </head>
        </html>
    <?php else:?>
     
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
<body class="horizontal-layout horizontal-menu blank-page navbar-floating footer-static" style="overflow-x:hidden;" data-open="hover" data-menu="horizontal-menu" data-col="blank-page">
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
                <h4><?php echo __("verify.email.title");?></h4>
                <form id="verify-email" class="auth-login-form mt-2">
                  <div class="mb-1">
                    <label for="login-email" class="form-label"><b><?php echo __("verify.email.body");?> </label>
                  </div>

                  <div class="mb-1">
                    <div class="d-flex justify-content-between">
                      <label style="font-size:14px;" class="form-label" for="login-password"><?php echo __("verify.email.label");?></label>
                    </div>
                    <div class="input-group input-group-merge form-password-toggle">
                      <input type="text" class="form-control form-control-merge" <?php if (isset($_GET["code"])) { $code = $_GET["code"]; echo("value='{$code}'");} ?> id="login-password" name="code" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="login-password" />
                      <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                    </div>
                  </div>
                  <button class="btn btn-primary w-100" tabindex="4"><?php echo __("button.email.confirm");?></button>
                  <button  class="btn  w-100"style="margin-top: 1%; background-color:gray; color: white;" tabindex="4"><?php echo __("button.email.resend");?></button>
                </form>


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
<?php endif; //has email verified?> 
<?php endif;//is logged?>