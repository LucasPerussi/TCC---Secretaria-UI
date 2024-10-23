
<?php
use API\Controller\Config;
use const Siler\Config\CONFIG;?>
<style>
    #searchModal {
        margin-left: -50px;
        width: 100%;
        height: 50px;
        max-width:350px;
        font-size: 15px;
        padding: 15px;
        border-radius: 15px;
        border: 1px;
        border-style: solid;
        border-color:#4d5153;
    }
</style>
    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Quicksand&display=swap');
        </style>
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand" href="<?= Config::BASE_URL . "dashboard"; ?>"><span class="brand-logo">
                        <img height="30" src="<?= Config::BASE_URL ?>/src/img/logo/icone-<?php if ((isset($_COOKIE['theme']))  && ($_COOKIE['theme'] == "Dark")) : ?>branco<?php else : ?>preto<?php endif; ?>.svg" alt="logo"></span>
                    <h2 style="font-size: 18px; font-family: 'Quicksand', sans-serif; font-weight:800;" class="brand-text"><img height="20" src="<?= Config::BASE_URL ?>/src/img/logo/logo-<?php if ((isset($_COOKIE['theme']))  && ($_COOKIE['theme'] == "Dark")) : ?>branco<?php else : ?>preto<?php endif; ?>.svg" alt="logo"></h2>
                </a></li>
            <li class="nav-item nav-toggle"><a href="#" style="margin-top:28px;" class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
    </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class=" nav-item"><a class="d-flex align-items-center" href="<?php if((isset($_SESSION["company_identifier"])) && (!isset($_SESSION["user_id"]))){echo Config::BASE_URL . "company/" . $_SESSION["company_identifier"];} else{ echo Config::BASE_URL . "dashboard"; } ;?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z"/>
                    <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z"/>
                    </svg><span class="menu-title text-truncate" data-i18n="Dashboards"><?php echo __("menu.dashboard"); ?></span></a>
                </li>
                <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Apps &amp; Pages</span>
                <!--                                                                MEMBROS NORMAIS                                                              -->
                </li>
                <li id="searchButton" class=" nav-item"><a class="d-flex align-items-center" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg><span class="menu-title text-truncate" data-i18n="Calendar">Buscar Material</span></a>
                </li> 
            </ul>
        </div>
    </div>
    <script>
          $("#searchButton").click(function(e) {
            Swal.fire({
                title: '<strong>O que você procura?</u></strong>',
                icon: 'none',
                html:
                    '<form method="GET" action="<?php if((isset($_SESSION["company_identifier"])) && (!isset($_SESSION["user_id"]))){echo Config::BASE_URL . "company/" . $_SESSION["company_identifier"];} else{ echo Config::BASE_URL ."#searching";} ;?>" id="form" autocomplete="off">' +
                    '<input style="font-family: "Montserrat", sans-serif;border-style:solid;" placeholder="Busque a plataforma, equipamento ou empresa..." name="search"  id="searchModal" type="text">' +
                    '<button  type="submit" style="z-index:1; margin:-48px; border-style: hidden; background-color:white; width:40px;"><i class="bi bi-search"></i></button>' +
                    '</form>',
                showCloseButton: true,
                showCancelButton: false,
                showConfirmButton: false,
                focusConfirm: false
                
            })
                       
            })

            $("#trainningButton").click(function(e) {
            Swal.fire({
                title: '<strong>Ainda não temos nenhum curso disponível :/</u></strong>',
                icon: 'error',
                showCloseButton: true,
                showCancelButton: true,
                showConfirmButton: false,
                focusConfirm: false
                
            })
                       
            })
          
            $("#badgesButton").click(function(e) {
            Swal.fire({
                title: '<strong>Ainda não temos nenhuma badge disponível :/</u></strong>',
                icon: 'error',
                showCloseButton: true,
                showCancelButton: true,
                showConfirmButton: false,
                focusConfirm: false
                
            })
                       
            })
       
    </script>
    <!-- END: Main Menu-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.min.js"></script>