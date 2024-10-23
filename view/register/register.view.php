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
            document.addEventListener('DOMContentLoaded', function() {
                const lightThemeLink = document.querySelector('link[href="masterLight.css"]');
                const darkThemeLink = document.querySelector('link[href="masterDark.css"]');

                // Verificar se o tema escuro é preferido
                const darkThemeQuery = window.matchMedia('(prefers-color-scheme: dark)');

                // Função para alternar os temas
                function toggleTheme() {
                    if (darkThemeQuery.matches) {
                        toggleLogo("dark");
                        // lightThemeLink.removeAttribute('media');
                        // darkThemeLink.setAttribute('media', '(prefers-color-scheme: dark)');
                    } else {
                        // document.getElementById("logo").removeAttribute('src');
                        toggleLogo("Light");
                        // darkThemeLink.removeAttribute('media');
                        // lightThemeLink.setAttribute('media', '(prefers-color-scheme: light)');
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
                            <!-- Brand logo-->
                            <!-- /Brand logo-->
                            <!-- Left Text-->
                            <div class="d-none d-lg-flex col-lg-8 align-items-center p-0">
                                <div class="w-100 d-lg-flex align-items-center justify-content-center px-0">

                                    <img src="<?= Config::BASE_URL ?>src/img/ufpr.png" style="height:100vh;position:absolute;top:0px !important; z-index:0 !important" alt="ufpr">

                                </div>
                            </div>
                            <!-- /Left Text-->
                            <!-- Login-->
                            <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5 p-2" id="login-form" style="z-index:1 !important; ">
                                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto" id="login-form">


                                    <h1 class="card-title fw-bold mb-1" hidden id="loading-text">Criando sua conta ... </h1>

                                    <h1 class="card-title fw-bold mb-1" id="login-form-text" style="margin-top:50px;">Cadastre-se</h1>

                                    <form id="register-form" class="auth-register-form mt-2">
                                        <div class="mb-1">
                                            <label for="register-username" class="form-label">Nome</label>
                                            <input type="text" class="form-control" required id="register-name" name="name"
                                                placeholder="Nome" aria-describedby="register-username" tabindex="1"
                                                autofocus />
                                        </div>
                                        <div class="mb-1">
                                            <label for="register-username" class="form-label">Sobrenome</label>
                                            <input type="text" class="form-control" required id="register-lastname"
                                                name="lastName" placeholder="Sobrenome" aria-describedby="register-username"
                                                tabindex="1" autofocus />
                                        </div>
                                        <div class="mb-1">
                                            <label for="register-username" class="form-label">Data de Nascimento</label>
                                            <input type="date" class="form-control" required id="register-phone"
                                                name="birth" aria-describedby="register-username" tabindex="1" autofocus />
                                        </div>
                                        <div class="mb-1">
                                            <label for="register-email" class="form-label"><?= __("Email") ?></label>
                                            <input type="text" class="form-control" required id="register-email"
                                                name="email" placeholder="nome@example.com"
                                                aria-describedby="register-email" tabindex="2" />
                                        </div>
                                        <div class="mb-1">
                                            <label for="register-password" class="form-label">Senha</label>

                                            <div class="input-group input-group-merge form-password-toggle">
                                                <input required onkeyup='check_pass(); verificaForcaSenha();'
                                                    type="password" class="form-control form-control-merge" id="password"
                                                    onKeyUp="verificaForcaSenha();" name="password-confirmation"
                                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                    aria-describedby="register-password" tabindex="3" />
                                                <span class="input-group-text cursor-pointer"><i
                                                        data-feather="eye"></i></span>
                                            </div>
                                            <span style="font-size:10px;" id="password-status"></span>
                                        </div>
                                        <div class="mb-1">
                                            <label for="register-password" class="form-label">Confirmação de senha</label>

                                            <div class="input-group input-group-merge form-password-toggle">
                                                <input required onkeyup='check_pass();' type="password"
                                                    class="form-control form-control-merge" id="confirm_password"
                                                    name="password"
                                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                    aria-describedby="register-password" tabindex="3" />
                                                <span class="input-group-text cursor-pointer"><i
                                                        data-feather="eye"></i></span>
                                            </div>
                                        </div>
                                        <div class="mb-1">
                                            <div class="form-check">
                                                <input required class="form-check-input" type="checkbox"
                                                    id="register-privacy-policy" tabindex="4" />
                                                <label class="form-check-label" for="register-privacy-policy">
                                                    Eu aceito os <a id="link" style="text-decoration:underline !important;"
                                                        href="<?= Config::BASE_URL . "terms" ?>" target="_blank">termos</a> e <a id="link" style="text-decoration:underline !important;"
                                                        href="<?= Config::BASE_URL . "policies" ?>" target="_blank">política de privacidade</a>
                                                </label>
                                            </div>
                                        </div>
                                        <button class="btn btn-dark w-100" type="submit" id="submit"
                                            tabindex="5">Criar</button>
                                    </form>

                                    <p class="text-center mt-2"><span>Já tem conta? </span><a href="<?= Config::BASE_URL ?>login" style="text-decoration:underline;"><span>Faça Login</span></a></p>
                                    <div class="divider my-2">
                                        <div class="divider-text">ou</div>
                                    </div>
                                    <div class="auth-footer-btn d-flex justify-content-center"><a class="btn btn-github" href="<?= Config::BASE_URL . "sign-in-microsoft" ?>"><i class="bi bi-microsoft"></i></a><a class="btn btn-github white" href="<?php echo $login_url; ?>"><i class="bi bi-google"></i></a></div>
                                    <a href="<?= Config::BASE_URL ?>">
                                        <img src="<?= Config::BASE_URL ?>src/img/logo/sept.png" id="logoParaBranco" style="margin-top:20%; margin-left:33%; width:33%  ">
                                        <img src="<?= Config::BASE_URL ?>src/img/logo/SEPTlogo_branco.webp" id="logoParaDark" hidden style="margin-top:20%; margin-left:33%; width:33%  ">
                                    </a>


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
                            <!-- /Login-->
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

        <script>
            function verificaForcaSenha() {
                var numeros = /([0-9])/;
                var alfabeto = /([A-Z])/;
                var chEspeciais = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;

                if ($('#password').val().length < 8) {
                    $('#password-status').html(
                        "<span style='color:pink'>Weak, your password must have at least 8 characters.</span>");
                } else {
                    if ($('#password').val().match(numeros) && $('#password').val().match(alfabeto) && $('#password').val()
                        .match(chEspeciais)) {
                        $('#password-status').html("<span style='color:#20B2AA'><b>Strong!</b></span>");
                    }
                    if (!$('#password').val().match(numeros)) {
                        $('#password-status').html(
                            "<span style='color:orange'><b>Medium, your password must have at least a number!</b></span>");
                    }
                    if (!$('#password').val().match(alfabeto)) {
                        $('#password-status').html(
                            "<span style='color:orange'><b>Medium, your password must have at least a capital letter!</b></span>"
                        );
                    }
                    if (!$('#password').val().match(chEspeciais)) {
                        $('#password-status').html(
                            "<span style='color:orange'><b>Medium, your password must have at least a special character!</b></span>"
                        );
                    }
                }
            }
        </script>

        <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous">
        </script>
        <script>
            function check_pass() {
                if (document.getElementById('password').value ==
                    document.getElementById('confirm_password').value) {
                    document.getElementById('submit').disabled = false;
                    document.getElementById('confirm_password').style.border = ' 1px solid green ';
                } else {
                    document.getElementById('confirm_password').style.border = ' 1px solid red ';
                    document.getElementById('submit').disabled = true;
                }
            }
        </script>
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