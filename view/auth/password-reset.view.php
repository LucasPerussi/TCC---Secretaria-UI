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
                                <a href="index.html" class="brand-logo">
                                    <img style="width:180px;" src="https://www.wetalkit.com.br/src/img/icones/logo-branco.svg" alt="logo" >
                                    <!-- <h2 class="brand-text text-primary ms-1">Wetalk.it</h2> -->
                                </a>

                                <h4 class="card-title mb-1">Redefinição de senha 🔒</h4>
                                <?php if (mysqli_num_rows($users) > 0): ?>
                                    <?php while($user = mysqli_fetch_assoc($users)):?>
                                        <p class="card-text mb-2">Lembre-se de utilizar letras maíusculas, caracteres especiais e pelo menos 8 caracteres. Ao alterar sua senha, todas suas sessões serão finalizadas!</p>
                                        <form class="auth-reset-password-form mt-2" id="new-password">
                                            <div class="mb-1">
                                                <div class="d-flex justify-content-between">
                                                    <label class="form-label" name="password" for="reset-password-new">Nova Senha</label>
                                                </div>
                                                <input hidden value="<?=$user["req_user"]?>" name="user"/>
                                                <input hidden value="<?=$user["req_email"]?>" name="email"/>
                                                <div class="input-group input-group-merge form-password-toggle">
                                                    <input id="password" onkeyup="verificaForcaSenha()" type="password" class="form-control form-control-merge" id="reset-password-new" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="reset-password-new" tabindex="1" autofocus />
                                                    <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                                </div>
                                                <span style="font-size:10px;" id="password-status"></span>
                                            </div>
                                            <div class="mb-1">
                                                <div class="d-flex justify-content-between">
                                                    <label class="form-label" name="confirm-password" for="reset-password-confirm">Confirmar Senha</label>
                                                </div>
                                                <div class="input-group input-group-merge form-password-toggle">
                                                <input required onkeyup='check_pass();' type="password" class="form-control form-control-merge" id="confirm_password" name="confirm_password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="register-password" tabindex="3" />
                                                <span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span>
                                                </div>
                                            </div>
                                            <button id="submit" class="btn btn-primary w-100" tabindex="3">Definir Nova Senha</button>
                                        </form>
                                    <?php endwhile;?>
                                <?php else:?>
                                    <span>Este link está expirado! Solicite um novo em <a href="<?=Config::BASE_URL . "password-recovery"?>">Esqueci minha senha</a></span>
                                <?php endif;?>
                                <p class="text-center mt-2">
                                    <a href="<?=Config::BASE_URL . 'login'?>"> <i data-feather="chevron-left"></i> Voltar ao Login </a>
                                </p>
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
   
    <?php
require __DIR__ . "/../../" . Config::BASE_PATH_JS . str_replace(".view", ".js.php", basename(__FILE__, ".php"));
?>
    <script>
        function verificaForcaSenha() 
            {
                var numeros = /([0-9])/;
                var alfabeto = /([A-Z])/;
                var chEspeciais = /([~,!,@,#,$,%,^,&,*,-,_,+,=,?,>,<])/;

                if($('#password').val().length<8) 
                {
                    $('#password-status').html("<span style='color:pink'>Weak, your password must have at least 8 characters.</span>");
                } else {  	
                    if($('#password').val().match(numeros) && $('#password').val().match(alfabeto) && $('#password').val().match(chEspeciais))
                    {            
                        $('#password-status').html("<span style='color:#20B2AA'><b>Strong!</b></span>");
                    } 
                    if(!$('#password').val().match(numeros))
                    {            
                        $('#password-status').html("<span style='color:orange'><b>Medium, your password must have at least a number!</b></span>");
                    }
                    if(!$('#password').val().match(alfabeto))
                    {            
                        $('#password-status').html("<span style='color:orange'><b>Medium, your password must have at least a capital letter!</b></span>");
                    }
                    if(!$('#password').val().match(chEspeciais))
                    {            
                        $('#password-status').html("<span style='color:orange'><b>Medium, your password must have at least a special character!</b></span>");
                    }
                }
            }
    </script>



  <!-- PAGE JS -->
  <script>
   function check_pass() {
    if (document.getElementById('password').value ==
            document.getElementById('confirm_password').value) {
        document.getElementById('submit').disabled = false;
        document.getElementById ('confirm_password').style.color = ' green '; 
    } else {
      document.getElementById ('confirm_password').style.color = ' red '; 
        document.getElementById('submit').disabled = true;
    }
}
</script>
    
<script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous">
</script> 
</body>
<!-- END: Body-->
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

</html>

<?php endif;?>