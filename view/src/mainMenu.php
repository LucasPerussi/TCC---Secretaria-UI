<?php

use API\Controller\Config;
use const Siler\Config\CONFIG; ?>
<style>
    #searchModal {
        margin-left: -50px;
        width: 100%;
        height: 50px;
        max-width: 350px;
        font-size: 15px;
        padding: 15px;
        border-radius: 15px;
        border: 1px;
        border-style: solid;
        border-color: #4d5153;
    }
</style>
<?php
$url = $_SERVER['REQUEST_URI'];
?>

<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">

    <div class="navbar-header">
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Quicksand&display=swap');
        </style>
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand" href="<?= Config::BASE_URL . "dashboard"; ?>"><span class="brand-logo">
                        <img height="30" src="<?= Config::BASE_URL ?>/src/img/logo/icone-<?php if ((isset($_COOKIE['theme']))  && ($_COOKIE['theme'] == "Dark")) : ?>branco<?php else : ?>preto<?php endif; ?>.png" alt="logo"></span>
                    <h2 style="font-size: 18px; font-family: 'Quicksand', sans-serif; font-weight:800;" class="brand-text"><img height="20" src="<?= Config::BASE_URL ?>/src/img/logo/logo-<?php if ((isset($_COOKIE['theme']))  && ($_COOKIE['theme'] == "Dark")) : ?>branco<?php else : ?>preto<?php endif; ?>.png" alt="logo"></h2>
                </a></li>
            <li class="nav-item nav-toggle"><a href="#" style="margin-top:28px;" class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <br />
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <ul class="navigation navigation-main " id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item"><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "dashboard") {
                                                                            echo "active";
                                                                        } ?>" href="<?= Config::BASE_URL . 'dashboard' ?>">
                    <i style="margin-top:-10px;" class="bi bi-house"></i><span class="menu-title text-truncate" data-i18n="Dashboards"><?= __("main_menu.dashboard") ?></span></a>
            </li>
            <?php if (($_SESSION["user_role"] == 2) || ($_SESSION["user_role"] == 4)) : ?>
                <li class=" nav-item"><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "company/" . $_SESSION["company_identifier"]) {
                                                                                echo "active";
                                                                            } ?>" href="<?= Config::BASE_URL . 'company/' . $_SESSION["company_identifier"] ?>">
                        <i style="margin-top:-5px !important;" class="bi bi-window"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Portal Membros</span></a>
                </li>
            <?php endif; ?>
            <?php if ((($_SESSION["user_role"] == 2) && ($_SESSION["company_id"] == 9999)) || ($_SESSION["user_role"] == 4)) : ?>
                <li class=" nav-item"><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "portal-admin") {
                                                                                echo "active";
                                                                            } ?>" href="<?= Config::BASE_URL . 'portal-admin' ?>">
                        <i style="margin-top:-5px !important;" class="bi bi-window-stack"></i><span class="menu-title text-truncate" data-i18n="Dashboards">Portal Admin</span></a>
                </li>
            <?php endif; ?>
            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages"><?= __("main_menu.menu.titulo") ?></span>
                <!--                                                                MEMBROS NORMAIS                                                              -->
            </li>

            <?php if (isset($_SESSION["user_id"])) : ?>
       
                <li class=" nav-item"><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "blog") {
                                                                                echo "active ";
                                                                            } ?>" href="<?= Config::BASE_URL ?>blog"><i style="margin-top:-8px;" class="bi bi-columns"></i><span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.menu.artigos") ?></span></a>
                </li>
                <?php if ($_SESSION["company_id"] != 9999) : ?>

                    <li class=" nav-item"><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "FAQ") {
                                                                                    echo "active";
                                                                                } ?>" href="<?php if ($_SESSION['company_id'] == 9999) {
                                                                                                echo Config::BASE_URL . 'FAQ-generico';
                                                                                            } else {
                                                                                                echo Config::BASE_URL . 'FAQ/' . $_SESSION["company_identifier"];
                                                                                            } ?>"><i class="bi bi-question-circle"></i><span class="menu-title text-truncate" data-i18n="Calendar">
                                <?= __("main_menu.menu.faq") ?></span></a>
                    </li>

                    <li class=" nav-item"><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "rooms" . $_SESSION["company_identifier"]) {
                                                                                    echo "active";
                                                                                } ?>" href="<?= Config::BASE_URL .  "rooms/" . $_SESSION["company_identifier"] ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-houses" viewBox="0 0 16 16">
                                <path d="M5.793 1a1 1 0 0 1 1.414 0l.647.646a.5.5 0 1 1-.708.708L6.5 1.707 2 6.207V12.5a.5.5 0 0 0 .5.5.5.5 0 0 1 0 1A1.5 1.5 0 0 1 1 12.5V7.207l-.146.147a.5.5 0 0 1-.708-.708L5.793 1Zm3 1a1 1 0 0 1 1.414 0L12 3.793V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v3.293l1.854 1.853a.5.5 0 0 1-.708.708L15 8.207V13.5a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 4 13.5V8.207l-.146.147a.5.5 0 1 1-.708-.708L8.793 2Zm.707.707L5 7.207V13.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5V7.207l-4.5-4.5Z" />
                            </svg><span class="menu-title text-truncate" data-i18n="Calendar">
                                <?= __("main_menu.menu.salas") ?></span></a>
                    </li>
                <?php endif; ?>
                <li class=" nav-item"><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "content-request") {
                                                                                echo "active";
                                                                            } ?>" href="<?= Config::BASE_URL . 'content-request' ?>"><i style="margin-top:-5px;" class="bi bi-chat-right-text"></i><span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.menu.abrir_chamado") ?></span></a>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "badges") {
                                                                                echo "active";
                                                                            } ?>" href="<?= Config::BASE_URL . 'badges' ?>"><i style="margin-top:-5px;" class="bi bi-trophy"></i><span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.menu.medalhas") ?></span></a>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "business-card-management") {
                                                                                echo "active";
                                                                            } ?>" href="<?= Config::BASE_URL . 'business-card-management' ?>"><i style="margin-top:-10px;" class="bi bi-person-badge"></i><span class="menu-title text-truncate" data-i18n="Calendar">Meu Business Card</span></a>
                </li>
                <?php if ($_SESSION["company_id"] != 9999) : ?>
                    <li class=" nav-item"><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "friends") {
                                                                                    echo "active";
                                                                                } ?>" href="<?= Config::BASE_URL . 'friends' ?>"><i style="margin-top:-10px;" class="bi bi-people"></i><span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.menu.colegas") ?></span></a>
                    </li>
                <?php endif; ?>
                <li class=" nav-item "><a href="#" class="d-flex align-items-center <?php if (($url == Config::DOMINIO . "settings#requests-section") || ($url == Config::DOMINIO . "settings") || ($url == Config::DOMINIO . "list-logins")) {
                                                                                        echo "active";
                                                                                    } ?> "><i style="margin-top:-6px;" class="bi bi-toggles"></i><span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.menu.menu_configuracoes.titulo") ?></span></a>
                    <ul class="menu-content <?php if (($url == Config::DOMINIO . "settings#requests-section") || ($url == Config::DOMINIO . "settings") || ($url == Config::DOMINIO . "list-logins")) {
                                                echo "open";
                                            } ?>">
                        <!--<li><a class="d-flex align-items-center" href="#" onclick="createPassword();"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                            <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                            </svg><span class="menu-item text-truncate" data-i18n="Basic">Trocar sua senha</span></a>
                        </li>-->
                        <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "settings#requests-section") {
                                                                    echo "active";
                                                                } ?>" href="<?= Config::BASE_URL . 'settings#requests-section' ?>"><i class="bi bi-wechat"></i><span class="menu-item text-truncate" data-i18n="Advance"><?= __("main_menu.menu.menu_configuracoes.meus_chamados") ?></span></a>
                        </li>
                        <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "#settings") {
                                                                    echo "active";
                                                                } ?>" href="<?= Config::BASE_URL . '#settings' ?>"><i class="bi bi-toggles"></i><span class="menu-item text-truncate" data-i18n="Advance"><?= __("main_menu.menu.menu_configuracoes.conta") ?></span></a>
                        </li>
                        <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "list-logins") {
                                                                    echo "active";
                                                                } ?>" href="<?= Config::BASE_URL . 'list-logins' ?>"><i class="bi bi-universal-access"></i><span class="menu-item text-truncate" data-i18n="Advance"><?= __("main_menu.menu.menu_configuracoes.historico") ?></span></a>
                        </li>
                    </ul>
                </li>
                <!-- *************************** MENU DE ADMIN ******************* -->
                <?php if ($_SESSION["user_role"] >= 2) : ?>
                    <li class=" navigation-header"><span data-i18n="Apps &amp; Pages"><?= __("main_menu.admin.titulo") ?></span>
                    </li>
                    <li class=" nav-item"><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "company-settings") {
                                                                                    echo "active";
                                                                                } ?>" href="<?= Config::BASE_URL . 'company-settings' ?>"><i style="margin-top:-5px;" class="bi bi-building"></i><span class="menu-item text-truncate" data-i18n="Advance"><?= __("main_menu.admin.empresa") ?></span></a>
                    </li>
                    <li class=" nav-item"><a class="d-flex align-items-center <?php if (($url == Config::DOMINIO . "inventory-dashboard") || ($url == Config::DOMINIO . "inventory-dashboard#inventory-section") || ($url == Config::DOMINIO . "inventory-dashboard#rooms-section")) {
                                                                                    echo "active";
                                                                                } ?>" href="<?= Config::BASE_URL . 'inventory-dashboard' ?>"><i style="margin-top:-8px;" class="bi bi-intersect"></i><span class="menu-item text-truncate" data-i18n="Advance">Central de Inventário</span></a>
                    </li>
                    <li class=" nav-item"><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "painel") {
                                                                                    echo "active";
                                                                                } ?>" href="<?= Config::BASE_URL . 'painel' ?>"><i class="bi bi-bar-chart" style="margin-top:-10px;"></i><span class="menu-item text-truncate" data-i18n="Advance"><?= __("main_menu.admin.relatorios") ?></span></a>
                    </li>
                
            <?php endif; ?>
            <?php endif; ?>
            <br />
            <br />
            <br />

            <!-- ******************************************  FIM MENU MASTER  ******************************************* -->
        </ul>
    </div>
</div>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script>
    function search() {
        Swal.fire({
            title: '<strong><?= __("main_menu.buscar_material.titulo") ?></u></strong>',
            icon: 'none',
            html: '<form method="GET" action="<?php if ((isset($_SESSION["company_identifier"])) && ($_SESSION["company_id"] != 9999)) {
                                                    echo Config::BASE_URL . "company/" . $_SESSION["company_identifier"];
                                                } else {
                                                    echo Config::BASE_URL . "dashboard";
                                                }; ?>" id="form" autocomplete="off">' +
                '<input style="font-family: "Montserrat", sans-serif;border-style:solid;" placeholder="<?= __("main_menu.buscar_material.placeholder") ?>" name="search"  id="searchModal" type="text">' +
                '<button  type="submit" style="z-index:1; margin:-48px; border-style: hidden; background-color:white; width:40px;"><i class="bi bi-search"></i></button>' +
                '</form>',
            showCloseButton: true,
            showCancelButton: false,
            showConfirmButton: false,
            focusConfirm: false

        })
    }
    // $("#searchButton").click(function(e) {


    // })


    function cursos() {
        Swal.fire({
            title: '<strong>Ainda não temos nenhum curso disponível :/</u></strong>',
            icon: 'error',
            showCloseButton: true,
            showCancelButton: true,
            showConfirmButton: false,
            focusConfirm: false

        })
    }
    // // $("#trainningButton").click(function(e) {


    // // })


    // })
</script>
<!-- END: Main Menu-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">