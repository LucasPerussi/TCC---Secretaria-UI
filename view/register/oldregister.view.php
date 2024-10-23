<?php

use API\Controller\Config;

$page_title = "Register";
require_once('view/auth/config.php');
require_once('controller/controller.Class.php');

?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <?php
      require __DIR__ . "/../head.php"
    ?>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="src/css/register.css">
    <meta name="description" content="Crie sua conta grátis e tenha acesso à materiais que deixarão suas reuniões muito mais eficientes.">
    <link rel="stylesheet" type="text/css"
        href="<?= Config::BASE_CSS . str_replace(".view", ".css", basename(__FILE__, ".php")) ?>">
</head>
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


<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click"
    style="overflow-x:hidden;" data-menu="vertical-menu-modern" data-col="blank-page">
    <div class="app-content content ">

        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <a class="navbar-brand" id="logo-brand" href="<?=Config::BASE_URL . ''?>"><img onload="getTheme()" class="home_nav_img"
                        style="margin-top:2%; margin-left:5%; position: fixed;"
                        src="https://wetalkit.com.br/suporte/src/img/logo-branco.svg" height="75px" width="160px"
                        alt="logo"></a>
            </div>
            <br><br> <br><br>
            <div class="content-body">
                <div class="auth-wrapper auth-basic px-2">
                    <div class="auth-inner my-2" style="border-radius:20px !important;">
                        <!-- Register basic -->
                        <div class="card mb-0" style="border-radius:20px !important;">
                            <div class="card-body">
                                <span style="font-size: 30px; font-style: Montsseray;">Crie sua conta!</span>
                                <!--<form class="auth-register-form mt-2" action="/user/new" method="POST">-->

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
                                                Eu aceito os<a id="link" style=""
                                                    href="<?=Config::BASE_URL . "terms"?>" target="_blank"> termos e políticas</a>
                                            </label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary w-100" type="submit" id="submit"
                                        tabindex="5">Criar</button>
                                </form>

                            </div>
                        </div>
                        <div class="card mb-0" style="margin-top:30px;border-radius:20px;">
                            <div class="card-body">
                                <a class="btn btn-info w-100" href="<?=Config::BASE_URL . "sign-in-microsoft"?>"
                                    style="background-color:white; margin-top: 10px;" tabindex="4"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-microsoft" viewBox="0 0 16 16">
                                        <path
                                            d="M7.462 0H0v7.19h7.462V0zM16 0H8.538v7.19H16V0zM7.462 8.211H0V16h7.462V8.211zm8.538 0H8.538V16H16V8.211z" />
                                    </svg> <span style=" margin-left:10px; margin-top:10px;"> Criar com
                                        Microsoft</span></a>
                                <a class="btn btn-info w-100" href="<?php echo $login_url; ?>"
                                    style="background-color:white; margin-top: 10px;" tabindex="4"><svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-google" viewBox="0 0 16 16">
                                        <path
                                            d="M15.545 6.558a9.42 9.42 0 0 1 .139 1.626c0 2.434-.87 4.492-2.384 5.885h.002C11.978 15.292 10.158 16 8 16A8 8 0 1 1 8 0a7.689 7.689 0 0 1 5.352 2.082l-2.284 2.284A4.347 4.347 0 0 0 8 3.166c-2.087 0-3.86 1.408-4.492 3.304a4.792 4.792 0 0 0 0 3.063h.003c.635 1.893 2.405 3.301 4.492 3.301 1.078 0 2.004-.276 2.722-.764h-.003a3.702 3.702 0 0 0 1.599-2.431H8v-3.08h7.545z" />
                                    </svg> <span style=" margin-left:10px; margin-top:10px;"> Criar com
                                        Google </span></a>

                                <p class="text-center mt-2">
                                    <span>Já possuí uma conta?</span>
                                    <a href="<?=Config::BASE_URL . "login"?>">
                                        <span>Faça Login</span>
                                    </a>
                                </p>

                                <!-- <div class="divider my-2">
                                    <div class="divider-text">or</div>
                                </div>

                                <div class="auth-footer-btn d-flex justify-content-center">
                                 
                                    <a href="#" style="width: 100%; background: #1f8cd4;" class="btn btn-google">
                                    <?= __("Sign up with Zoom") ?>
                                    </a>
                                   
                                </div> -->
                            </div>
                        </div>
                        <!-- /Register basic -->
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
                    </div>
                </div>

            </div>
        </div>
    </div>



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

    <?php
    require __DIR__."/../default.js.php";
  ?>
    <!-- PAGE JS -->
    <script src="<?= Config::BASE_URL ?>layout/app-assets/js/scripts/pages/auth-login.js"></script>
    <?php
      require __DIR__."/../../".Config::BASE_PATH_JS . str_replace(".view", ".js.php", basename(__FILE__, ".php"));
  ?>

    <!-- PAGE JS -->
    <script>
    function check_pass() {
        if (document.getElementById('password').value ==
            document.getElementById('confirm_password').value) {
            document.getElementById('submit').disabled = false;
            document.getElementById('confirm_password').style.color = ' green ';
        } else {
            document.getElementById('confirm_password').style.color = ' red ';
            document.getElementById('submit').disabled = true;
        }
    }
    </script>

</body>
<!-- END: Body-->

</html>