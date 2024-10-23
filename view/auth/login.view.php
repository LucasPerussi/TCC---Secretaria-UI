<?php

use API\Controller\Config;

?>



<?php if (isset($_SESSION["user_id"])) : ?>
    <html>

    <head>
        <meta http-equiv="Refresh" content="0; url=<?= Config::BASE_URL . "dashboard"; ?> " />
    </head>

    </html>
<?php else : ?>

   

    <!DOCTYPE html>
    <html class="loading" lang="en" data-textdirection="ltr">
    <!-- BEGIN: Head-->

    <head>
       
        <script>
       
        </script>
        <!-- BEGIN: Vendor CSS-->
        <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/vendors/css/vendors.min.css">
        <!-- END: Vendor CSS-->

        <!-- BEGIN: Theme CSS-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
        <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/css/bootstrap-extended.css">
        <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/css/colors.css">
        <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/css/components.css">
        <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/css/themes/bordered-layout.css">

        <!-- BEGIN: Page CSS-->
        <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/css/core/menu/menu-types/horizontal-menu.css">
        <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/css/plugins/forms/form-validation.css">
        <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/css/pages/authentication.css">
        <!-- END: Page CSS-->

        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/assets/css/style.css">
        <?php
        // require __DIR__ . "/../head.php"
        ?>

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
        <meta name="description" content="Wetalk Support é uma plataforma desenvolvida, para propagar informações precisas de atualizadas sobre videoconferência de forma gratuíta. ">
        <meta name="author" content="Wetalk.it">
        <title>WeJourney - Login</title>
        <link rel="stylesheet" href="<?= Config::BASE_URL ?>src/css/masterLight.css" media="(prefers-color-scheme: light)">
        <link rel="stylesheet" href="<?= Config::BASE_URL ?>src/css/masterDark.css" media="(prefers-color-scheme: dark)">

 

        <script>             
                // Função para alternar os temas
                function toggleLogo(thema) {
                    if (thema == "dark") {
                        document.getElementById("logoParaDark").hidden = false;
                        document.getElementById("logoParaBranco").hidden = true;

                    } else {
                        document.getElementById("logoParaBranco").hidden = false;
                        document.getElementById("logoParaDark").hidden = true;

                    }
                }

        </script>

        <script>
            // theme-switch.js
                document.addEventListener('DOMContentLoaded', function () {
                const lightThemeLink = document.querySelector('link[href="masterLight.css"]');
                const darkThemeLink = document.querySelector('link[href="masterDark.css"]');

                // Verificar se o tema escuro é preferido
                const darkThemeQuery = window.matchMedia('(prefers-color-scheme: dark)');
                
                // Função para alternar os temas
                function toggleTheme() {
                    if (darkThemeQuery.matches) {
                        toggleLogo("dark");
                    } else {
                        toggleLogo("Light");
                    }
                }

                // Inicializar e ouvir alterações no tema
                toggleTheme();
                darkThemeQuery.addListener(toggleTheme);
                lightThemeLink.addListener(toggleTheme);
                });
        </script>
       
        </style>
        <link rel="apple-touch-icon" href="src/img/icone.ico">
        <link rel="shortcut icon" type="image/x-icon" href="src/img/icone.ico">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    </head>
    <!-- END: Head-->
    <!-- BEGIN: Body-->



    <body class="horizontal-layout horizontal-menu blank-page navbar-floating footer-static   " style="overflow:hidden; " data-open="hover" data-menu="horizontal-menu" data-col="blank-page">
        <!-- BEGIN: Content-->
        <div class="app-content content " style="background-color: #101011 !important;">
            <div class="content-overlay"></div>
            <div class="header-navbar-shadow"></div>
            <div class="content-wrapper">
                <div class="content-header row">
                </div>
                <div class="content-body">
                    <div class="auth-wrapper auth-cover">
                        <div class="auth-inner row m-0">
                            <div class="d-none d-lg-flex col-lg-8 align-items-center p-0">
                                <div class="w-100 d-lg-flex align-items-center justify-content-center px-0">
                                    <img src="<?=Config::BASE_URL?>src/img/ufpr.png" style="height:100vh;position:absolute;top:0px !important; z-index:0 !important" alt="ufpr" >
                                </div>
                            </div>
                            <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5 p-2" id="login-form" style="z-index:1 !important;">
                                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto" id="login-form">

                               
                                <h1 class="card-title fw-bold mb-1" hidden id="loading-text">Logando ... </h1>
                                    <h1 class="card-title fw-bold mb-1" id="login-form-text">Login</h1>
                                    <p class="card-text mb-2">Bem-vindo (a) de volta! 😊</p>
                                    <div id="logando">
                                    <form id="login-form" class="auth-login-form mt-2 ">
                                        <div class="mb-1">
                                            <label class="form-label" for="login-email">Email</label>

                                            <input class="form-control" id="login-email" type="text" name="email" placeholder="john@example.com" aria-describedby="login-email" autofocus="" tabindex="1" />
                                        </div>
                                        <div class="mb-1" style="z-index:999 !important;">
                                            <div class="d-flex justify-content-between">
                                                <label class="form-label" style="z-index:999 !important;" for="login-password">Password</label><a href="<?= Config::BASE_URL . "password-recovery" ?>"><small>Esqueceu sua senha?</small></a>
                                            </div>
                                            <div class="input-group input-group-merge form-password-toggle">
                                                <input class="form-control form-control-merge" id="login-password" type="password" name="password" placeholder="············" aria-describedby="login-password" tabindex="2" /><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                            </div>
                                        </div>
                                        <div class="mb-1" style="z-index:999 !important;">
                                            <div class="form-check">
                                                <input class="form-check-input" onclick="cookiesAutorization()" style="z-index:999 !important;" id="remember-me" type="checkbox" tabindex="3" name="remember" />
                                                <label class="form-check-label" for="remember-me">Lembre de mim</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-info w-100" tabindex="4">Entrar</button>

                                        <div id="accepted" hidden style="margin-top:15px; padding:10px; padding-bottom:5px;background-color:#0c7193; color:white;border-radius:20px; text-align:center;">
                                            <h6 style="color: white !important;">Sua sessão ficará aberta por 30 dias! 🔒😊</h6>
                                        </div>
                                        <div id="denied" hidden style="margin-top:15px; padding:10px; padding-bottom:5px;background-color:crimson; color:white;border-radius:20px; text-align:center;">
                                            <h6 style="color: white !important;">Infelizmente, não podemos armazenar seu login sem o uso de cookies!</h6>
                                        </div>
                                    </form>
                                    <p class="text-center mt-2"><span>Novo por aqui? </span><a href="<?=Config::BASE_URL?>register" ><span style="text-decoration:underline;">Crie uma conta</span></a></p>
                                    <div class="divider my-2">
                                        <div class="divider-text">ou</div>
                                    </div>
                                    <div class="auth-footer-btn d-flex justify-content-center"><a class="btn btn-github" href="<?= Config::BASE_URL . "sign-in-microsoft" ?>"><i class="bi bi-microsoft"></i></a><a class="btn btn-github white" href="<?php echo $login_url; ?>"><i class="bi bi-google"></i></a></div>
                                    <a  href="<?=Config::BASE_URL?>">
                                    <img src="<?=Config::BASE_URL?>src/img/logo/sept.png"  id="logoParaBranco" style="margin-top:20%; margin-left:33%; width:33%  " >
                                    <img src="<?=Config::BASE_URL?>src/img/logo/SEPTlogo_branco.webp"  id="logoParaDark" hidden style="margin-top:20%; margin-left:33%; width:33%  " >
                                </a>
                                </div>

                                    <style>
                                        .loader {
                                            margin: 0 auto;
                                            width: 60px;
                                            height: 110px;
                                            text-align: center;
                                            font-size: 10px;
                                            position: absolute;
                                            top: 50%;
                                            left: 50%;
                                            -webkit-transform: translateY(-50%) translateX(-50%);

                                        }
                                    </style>

                                    <div id="loading" hidden class="auth-login-form mt-2">
                                        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
                                        <div class="loader">
                                            <lottie-player src="https://assets1.lottiefiles.com/packages/lf20_4towirms.json" background="transparent" speed="1" style="width: 70px; height: 70px; margin-top:30px" loop autoplay></lottie-player>
                                    
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- END: Content-->


        <!-- BEGIN: Vendor JS-->
        <script src="<?= Config::BASE_URL ?>layout/app-assets/vendors/js/vendors.min.js"></script>
        <!-- BEGIN Vendor JS-->

        <!-- BEGIN: Page Vendor JS-->
        <script src="<?= Config::BASE_URL ?>layout/app-assets/vendors/js/ui/jquery.sticky.js"></script>
        <script src="<?= Config::BASE_URL ?>layout/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
        <!-- END: Page Vendor JS-->

        <!-- BEGIN: Theme JS-->
        <script src="<?= Config::BASE_URL ?>layout/app-assets/js/core/app-menu.js"></script>
        <script src="<?= Config::BASE_URL ?>layout/app-assets/js/core/app.js"></script>
        <!-- END: Theme JS-->

        <!-- BEGIN: Page JS-->
        <script src="<?= Config::BASE_URL ?>layout/app-assets/js/scripts/pages/auth-login.js"></script>
        <!-- END: Page JS-->

        <?php
        require __DIR__ . "/../../" . Config::BASE_PATH_JS . str_replace(".view", ".js.php", basename(__FILE__, ".php"));
        ?>
        <script>
            $(window).on('load', function() {
                if (feather) {
                    feather.replace({
                        width: 14,
                        height: 14
                    });
                }
            })
        </script>
        <?php
        require __DIR__ . "/../default.js.php";
        ?>
    </body>

    <!-- END: Body-->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    </html>

<?php endif; ?>