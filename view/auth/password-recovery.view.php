<?php

use API\Controller\Config;

$page_title = "Login";
?>

<?php if (isset($_SESSION["user_id"])):?>
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
    <link rel="stylesheet" type="text/css"
        href="<?= Config::BASE_CSS . str_replace(".view", ".css", basename(__FILE__, ".php")) ?>">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="src/css/login.css">
</head>
<!-- END: Head-->
<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu blank-page navbar-floating footer-static  " style="overflow:hidden;" data-open="hover"
    data-menu="horizontal-menu" data-col="blank-page">
    <!-- BEGIN: Content-->

    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <a class="navbar-brand" id="logo-brand" href="<?=Config::BASE_URL . 'login'?>"><img class="home_nav_img"
                        style="margin-top:2%; margin-left:5%; position: fixed;"
                        src="https://www.wetalkit.com.br/src/img/icones/logo-branco.svg" height="75px" width="160px"
                        alt="logo"></a>

            </div>
            <br><br>
            <div class="content-body">
                <div class="auth-wrapper auth-basic px-2">
                    <div class="auth-inner my-2">
                        <!-- Login basic -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <h4 class="card-title mb-1">Esqueceu Sua Senha? 🔒</h4>
                                <p class="card-text mb-2">Informe o mesmo email que você já usa em sua conta, para que lhe enviemos um link de restauração de senha.</p>
                                <form id="new-password" class="auth-forgot-password-form mt-2">
                                    <div class="mb-1">
                                        <label for="forgot-password-email" class="form-label">Email</label>
                                        <input type="text" class="form-control" id="forgot-password-email" name="email" placeholder="john@example.com" aria-describedby="forgot-password-email" tabindex="1" autofocus />
                                    </div>
                                    <button class="btn btn-primary w-100" tabindex="2">Enviar Email </button>
                                </form>


                                <div class="divider my-2">
                                    <!-- <div class="divider-text"></div> -->
                                </div>
                                <div class="auth-footer-btn d-flex justify-content-center">

                                </div>
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
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</html>

<?php endif;?>