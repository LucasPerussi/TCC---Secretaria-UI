<?php

use API\Controller\Config;

$page_title = "Register";

?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<head>
    <?php
      require __DIR__ . "/../head.php"
    ?>
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="src/css/register.css">
  <link rel="stylesheet" type="text/css" href="<?= Config::BASE_CSS . str_replace(".view", ".css", basename(__FILE__, ".php")) ?>">
</head>

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <div class="app-content content ">
    <a href="<?=Config::BASE_URL . "logout"?>" style="position:fixed; left:5%; top:5%; padding:10px; z-index: 9; background-color:dimgray; border-radius:6px; color:ghostwhite;">Sigout</a>        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-basic px-2">
                    <div class="auth-inner my-2">
                        <!-- Register basic -->
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="<?=Config::BASE_URL . ''?>" class="brand-logo">
                                   <img src="src/img/logo-cor.svg" height="45" width="135" alt="logo">
                                </a>
                                <h4>Create Company 🏢</h4>
                                <!--<form class="auth-register-form mt-2" action="/user/new" method="POST">-->

                                <form id="company-form" class="auth-register-form mt-2">
                                    <div class="mb-1">
                                        <label for="register-username" class="form-label"><?= __("Company Name") ?></label>
                                        <input type="text" class="form-control" id="register-name" name="company_name" placeholder="Company Name Inc." aria-describedby="register-username" tabindex="1" autofocus />
                                    </div>
                                   
                                    <div class="mb-1">
                                        <label for="register-username" class="form-label"><?= __("CNPJ / Company ID") ?></label>
                                        <input type="text" class="form-control" onkeypress="$(this).mask('00.000.000/0001-00')" id="register-phone" name="cnpj" placeholder="00.000.000/0001-00" aria-describedby="register-username" tabindex="1" autofocus />
                                    </div>

                                    <div class="mb-1">
                                        <label for="register-username" class="form-label"><?= __("City") ?></label>
                                        <input type="text" onblur="exec();" class="form-control" id="register-phone" name="city" placeholder="City" aria-describedby="register-username" tabindex="1" autofocus />
                                    </div>

                                    <script>
                                     /*   cont = 0;
                                          function exec(){
                                            console.log("chegou aqui:");
                                            console.log(cont++)
                                            



                                           }  */
                                            </script>
                                       
                                    

                                    <div class="mb-1">
                                        <label for="register-username" class="form-label"><?= __("State / Provincy") ?></label>
                                        <input type="text" class="form-control" id="register-phone" name="state" placeholder="State" aria-describedby="register-username" tabindex="1" autofocus />
                                    </div>

                                    <div class="mb-1">
                                        <label for="register-username" class="form-label"><?= __("Country") ?></label>
                                            <select autocomplete="off" name="country" id="select2-basic"  class="select2 form-select">
                                                <?php foreach ($countries["data"]["items"] as $country) {?>
                                                <option value="<?=$country["id"]?>" ><?=$country["nome_pais_int"]?></option>
                                                <?php }?>
                                            </select>
                                    </div>
                                                                    
                                    <button class="btn btn-primary w-100" type="" id="submit" tabindex="5">Sign up</button>
                                </form>
                                <a style="margin-top:2%;" href="<?=Config::BASE_URL?>select-company"  class="btn btn-secondary w-100" tabindex="4">Return</a>
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


  <?php
    require __DIR__."/../default.js.php";
  ?>
  
  <?php include "view/src/footer.php"; ?>
  <!-- PAGE JS -->
  <script src="<?= Config::BASE_URL ?>layout/app-assets/js/scripts/pages/auth-register.js"></script>
  
  <?php
      require __DIR__."/../../".Config::BASE_PATH_JS . str_replace(".view", ".js.php", basename(__FILE__, ".php"));
  ?>

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
    
</body>
<!-- END: Body-->

</html>