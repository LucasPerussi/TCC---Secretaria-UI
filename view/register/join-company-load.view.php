<?php

use API\Controller\Config;

$page_title = "Join Company";

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
                <hr class="mb-2" />
                <?php if(isset($_GET["code"])):?>
                  <script>getCompany();</script>

                   <!-- Profile Card -->
                   <div style="margin-top:70px;" class="col-lg-12 col-md-12 col-12">
                            <div class="card card-profile">
                                <!--<img src="https://i.ibb.co/rQgfZWz/BG.png" class="img-fluid card-img-top" alt="Profile Cover Photo" />-->
                                <div class="card-body">
                                    <div class="profile-image-wrapper">
                                        <div class="profile-image">
                                            <div class="avatar">
                                            <div style="    border-radius: 50%;
                                                            overflow: hidden;
                                                            width: 100px;
                                                            height: 100px;
                                                            background: url(<?=$company["data"]["logo"]?>);
                                                            background-size:cover;
                                                            background-position: center;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <h3><?=$company["data"]["name"]?></h3>
                                    <hr class="mb-2" />
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <h6 style="font-size:10px;" class="text-muted fw-bolder">City</h6>
                                            <h3 style="font-size:15px;" class="mb-0"><?=$company["data"]["city"]?></h3>
                                        </div>
                                        <div>
                                            <h6 style="font-size:10px;" class="text-muted fw-bolder">Country</h6>
                                            <h3 style="font-size:15px;" class="mb-0"><?=$company["data"]["enum_country"]["nome_pais"]?></h3>
                                        </div>
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                <h4>Join your company 🔑</h4>
                <form id="join-company"  class="form form-vertical">
                  <div class="mb-1">
                    <label for="login-email" class="form-label">
                       <p>Your request will require approval, before you can actually join this company.</p>  </label>
                  </div>

                  <div class="mb-1">
                    <div class="input-group input-group-merge form-password-toggle">
                      <input type="text" hidden class="form-control form-control-merge" value="<?=$company["data"]["id"]?>" id="login-password" name="code" tabindex="2" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="login-password" />
                    </div>
                  </div>
                 
                  <button class="btn btn-primary w-100" tabindex="4">Join Company</button>
                </form>
                <a style="margin-top:2%;" href="<?=Config::BASE_URL?>join-company"  class="btn btn-secondary w-100" tabindex="4">Return</a>

              </div>
            </div>
                <?php endif;?>
               
                
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

  <?php include "view/src/footer.php"; ?>
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