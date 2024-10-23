<?php

use API\Controller\Config;

$page_title = "Select Company";

?>
<?php if (!isset($_SESSION["user_id"])):?>
  <html>
  <head>
    <meta http-equiv="Refresh" content="0; url=<?= Config::BASE_URL . "login";?> " />
  </head>
</html>
<?php else:?>
    <?php if($_SESSION["user_has_company"] == 1) :?>
        <html>
        <head>
            <meta http-equiv="Refresh" content="0; url=<?= Config::BASE_URL . "dashboard";?> " />
        </head>
        </html>
    <?php else:?>
      <?php if($_SESSION["email_verified"] != 1):?>
        <html>
        <head>
            <meta http-equiv="Refresh" content="0; url=<?= Config::BASE_URL . "verify-email";?> " />
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
  <style>
      #botao{
        margin-top: 12px; 
        background-color: #7367f040!important; 
        border: none; 
        font-weight:bolder; 
        color: #6258CC!important;
      }
      #botao:hover{
        margin-top: 12px; 
        background-color: #fff!important; 
        border: none; 
        font-weight:bolder; 
        color: #6258CC!important;
      }
  </style>
  <!--
  <link rel="stylesheet" type="text/css" href="<?= Config::BASE_CSS . str_replace(".view", ".css", basename(__FILE__, ".php")) ?>">-->
</head>
<!-- END: Head-->
<!-- BEGIN: Body-->
<body class="horizontal-layout horizontal-menu blank-page navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="blank-page">
  <!-- BEGIN: Content-->
  <div class="app-content content ">
  <a href="<?=Config::BASE_URL . "logout"?>" style="position:fixed; left:5%; top:5%; padding:10px; z-index: 9; background-color:dimgray; border-radius:6px; color:ghostwhite;">Sigout</a>
    <div class="content-overlay"></div>
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
                <h4 style="text-align: center;">Tell us about your company 🏢🏭</h4>
                  <button class="btn btn-primary w-100" onclick="window.location.href = '<?=Config::BASE_URL?>join-company'" id="botao"   tabindex="4">Join an Existent Company </button>
                  <button onclick="window.location.href = '<?=Config::BASE_URL?>create-company'" id="botao"  class="btn btn-primary w-100"  tabindex="4">Create a New Company</button>
                  <button disabled onclick="window.location.href = '<?=Config::BASE_URL?>welcome'" class="btn btn-primary w-100" id="botao" tabindex="4">Use as a Personal Account</button>
           


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
  
  <?php include "view/src/footer.php"; ?>
  <!-- PAGE JS -->
  <script src="<?= Config::BASE_URL ?>layout/app-assets/js/scripts/pages/auth-login.js"></script>
  <?php
      require __DIR__."/../../".Config::BASE_PATH_JS . str_replace(".view", ".js.php", basename(__FILE__, ".php"));
  ?>
</body>
<!-- END: Body-->

</html>

<?php endif; //has company?> 
<?php endif;//is logged?>
<?php endif;//is logged?>