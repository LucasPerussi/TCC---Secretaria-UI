<?php

use API\Controller\Config;

$page_title = "Login";
?>

<?php
require_once('config.php');
require_once('controller/controller.Class.php');
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
    <link rel="stylesheet" href="src/css/option.css">

</head>
<!-- END: Head-->
<!-- BEGIN: Body-->

<body class="horizontal-layout horizontal-menu blank-page navbar-floating footer-static  " style="overflow:hidden;"
    data-open="hover" data-menu="horizontal-menu" data-col="blank-page">
    <!-- BEGIN: Content-->

    
    <script>
            function getTheme() {
                console.log("caiu q")
                if (window.matchMedia) {
                    // Verifica se o tema preferido é claro
                    if (window.matchMedia('(prefers-color-scheme: light)').matches) {
                        // alert('Tema claro (light) é preferido.');
                        setCookie("theme", "Light", 7);
                        // Coloque aqui o código para aplicar o tema claro
                    } else {
                        // alert('Tema escuro (dark) é preferido.');
                        setCookie("theme", "Dark", 7);
                        // Coloque aqui o código para aplicar o tema escuro
                    }
                } else {
                    // document.getElementById("tema").text = "API matchMedia não é suportada neste navegador.";
                    // alert('API matchMedia não é suportada neste navegador.');
                    setCookie("theme", "Light", 7);
                    // Caso o navegador não suporte a API matchMedia, você pode tomar uma ação alternativa aqui.
                }

            }

            function setCookie(name, value, daysToExpire) {
                const date = new Date();
                date.setTime(date.getTime() + (daysToExpire * 24 * 60 * 60 * 1000));
                const expires = "expires=" + date.toUTCString();
                document.cookie = name + "=" + value + ";" + expires + ";path=/";
            }

//
        </script>

    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <a class="navbar-brand" id="logo-brand" href="<?=Config::BASE_URL . ''?>"><img  onload="getTheme()" class="home_nav_img"
                        style="margin-top:2%; margin-left:5%; position: fixed;"
                        src="https://wetalkit.com.br/suporte/src/img/logo-branco.svg" height="75px" width="160px"
                        alt="logo"></a>

            </div>
            <br><br>
            <div class="content-body">
                <div class="auth-wrapper auth-basic px-2">
                    <div class="auth-inner my-2" style="border-radius:20px !important;">
                        <!-- Login basic -->
                        <div class="card mb-0" style="border-radius:20px !important;">
                            <div class="card-body">
                                <span style="font-size: 20px; font-style: Montsseray; align-text:center; margin-bottom:20px;">Login</span>
                                    <a class="btn btn-info w-100" href="<?=Config::BASE_URL . "email-login"?>"
                                        style="background-color:white; margin-top: 40px;" tabindex="4"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                                        <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                                        </svg><span style=" margin-left:10px; margin-top:10px;"> Entrar com Email</span></a>
                                    <a class="btn btn-info w-100" href="<?=Config::BASE_URL . "sign-in-microsoft"?>"
                                        style="background-color:white; margin-top: 10px;" tabindex="4"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-microsoft" viewBox="0 0 16 16">
                                            <path
                                                d="M7.462 0H0v7.19h7.462V0zM16 0H8.538v7.19H16V0zM7.462 8.211H0V16h7.462V8.211zm8.538 0H8.538V16H16V8.211z" />
                                        </svg> <span style=" margin-left:10px; margin-top:10px;"> Entrar com
                                            Microsoft</span></a>
                                    <a class="btn btn-info w-100" href="<?php echo $login_url; ?>"
                                        style="background-color:white; margin-top: 10px;" tabindex="4"><svg
                                            xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-google" viewBox="0 0 16 16">
                                            <path
                                                d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                                        </svg> <span style=" margin-left:10px; margin-top:10px;"> Entrar com
                                            Google </span></a>

                                <p class="text-center mt-2">
                                    <span>Chegando agora?</span>
                                    <a href="<?= Config::BASE_URL . "register" ?>">
                                        <span> Crie uma conta!</span>
                                    </a>
                                </p>

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