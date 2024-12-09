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
                        <img height="30" src="<?= Config::BASE_URL ?>src/img/logo/<?php if ((isset($_COOKIE['theme']))  && ($_COOKIE['theme'] == "Dark")) : ?>ufpr_logo.png<?php else : ?>logo-ufpr.svg<?php endif; ?>" alt="logo"></span>
                    <h2 style="font-size: 18px; font-family: 'Quicksand', sans-serif; font-weight:800;" class="brand-text">Secretaria</h2>
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

            <!-- Dashboard para membros (alunos) -->
            <?php if (isset($_SESSION["user_id"]) && ($_SESSION["user_role"] == "Aluno")) : ?>
                <li class=" nav-item"><a class="d-flex align-items-center" href="<?= Config::BASE_URL . 'new-request' ?>"><i class="bi bi-plus-circle-fill"></i><span class="menu-title text-truncate">
                    <?= __("main_menu.member.solicitacao-titulo") ?></span></a>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="<?= Config::BASE_URL . 'pending-formative-hours' ?>"><i class="bi bi-clock-history"></i><span class="menu-title text-truncate">
                    <?= __("main_menu.member.formativas-titulo") ?></span></a>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="<?= Config::BASE_URL . 'internships' ?>"><i class="bi bi-briefcase"></i><span class="menu-title text-truncate">
                    <?= __("main_menu.member.estagio-titulo") ?></span></a>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="<?= Config::BASE_URL . 'news-board' ?>"><i class="bi bi-megaphone"></i><span class="menu-title text-truncate">
                    <?= __("main_menu.member.mural-titulo") ?></a>
                </li>
            <?php endif; ?>

            <!-- Dashboard para servidores / professores -->
            <?php if (isset($_SESSION["user_id"]) && ($_SESSION["user_role"] == "Servidor" || $_SESSION["user_role"] == "Professor" || $_SESSION["user_role"] == "Admin")) : ?>
                <li class=" nav-item"><a class="d-flex align-items-center" href="<?= Config::BASE_URL . 'entity-list' ?>"><i class="bi bi-pencil"></i><span class="menu-title text-truncate">
                    <?= __("main_menu.server.entidades-titulo") ?></span></a>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="<?= Config::BASE_URL . 'pending-formative-hours' ?>"><i class="bi bi-clock-history"></i><span class="menu-title text-truncate">
                    <?= __("main_menu.server.formativas-titulo") ?></span></a>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="<?= Config::BASE_URL . 'internships' ?>"><i class="bi bi-briefcase"></i><span class="menu-title text-truncate">
                    <?= __("main_menu.server.estagio-titulo") ?></a>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="<?= Config::BASE_URL . 'news-board' ?>"><i class="bi bi-megaphone"></i><span class="menu-title text-truncate">
                    <?= __("main_menu.server.mural-titulo") ?></a>
                </li>

            <?php endif; ?>
            <!-- Dashboard para servidores / professores -->
           


                <li class=" nav-item "><a href="#" class="d-flex align-items-center <?php if (($url == Config::DOMINIO . "settings#requests-section") || ($url == Config::DOMINIO . "settings") || ($url == Config::DOMINIO . "list-logins")) {
                                                                                        echo "active";
                                                                                    } ?> "><i style="margin-top:-6px;" class="bi bi-toggles"></i><span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.menu.menu_configuracoes.titulo") ?></span></a>
                    <ul class="menu-content <?php if (($url == Config::DOMINIO . "settings#requests-section") || ($url == Config::DOMINIO . "settings") || ($url == Config::DOMINIO . "list-logins")) {
                                                echo "open";
                                            } ?>">
              
                        <!-- <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "settings") {
                                                                    echo "active";
                                                                } ?>" href="<?= Config::BASE_URL . 'settings' ?>"><i class="bi bi-wechat"></i><span class="menu-item text-truncate" data-i18n="Advance"><?= __("main_menu.menu.menu_configuracoes.meus_chamados") ?></span></a>
                        </li> -->
                        <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "settings") {
                                                                    echo "active";
                                                                } ?>" href="<?= Config::BASE_URL . 'settings' ?>"><i class="bi bi-toggles"></i><span class="menu-item text-truncate" data-i18n="Advance"><?= __("main_menu.menu.menu_configuracoes.conta") ?></span></a>
                        </li>
                        <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "change-password") {
                                                                    echo "active";
                                                                } ?>" href="<?= Config::BASE_URL . 'change-password' ?>"><i class="bi bi-person-fill-lock"></i><span class="menu-item text-truncate" data-i18n="Advance">Alterar Senha</span></a>
                        </li>
                        <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "account-history") {
                                                                    echo "active";
                                                                } ?>" href="<?= Config::BASE_URL . 'account-history' ?>"><i class="bi bi-clock"></i><span class="menu-item text-truncate" data-i18n="Advance">Histórico de Conta</span></a>
                        </li>
                    </ul>
                </li>

                <?php if (isset($_SESSION["user_id"]) && ($_SESSION["user_role"] == "Admin")) : ?>

                
<li class=" nav-item">
   <br />
</li>
    <li class="nav-item">
        <a class="d-flex align-items-center" href="<?= Config::BASE_URL ?>dashboard-server">
            <i class="bi bi-person-workspace"></i>
            <span class="menu-title text-truncate">Atuar como Servidor</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="d-flex align-items-center" href="<?= Config::BASE_URL ?>system-logs">
            <i class="bi bi-list-columns-reverse"></i>
            <span class="menu-title text-truncate">Logs do Sistema</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="d-flex align-items-center" href="<?= Config::BASE_URL ?>entity-list">
            <i class="bi bi-pencil"></i>
            <span class="menu-title text-truncate">Entidades</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="d-flex align-items-center" href="<?= Config::BASE_URL ?>proccess-management">
            <i class="bi bi-diagram-2"></i>
            <span class="menu-title text-truncate">Processos</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="d-flex align-items-center" href="<?= Config::BASE_URL ?>fields">
            <i class="bi bi-input-cursor-text"></i>
            <span class="menu-title text-truncate">Campos Padrões</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="d-flex align-items-center" href="<?= Config::BASE_URL ?>stages">
            <i class="bi bi-layer-backward"></i>
            <span class="menu-title text-truncate">Etapas Padrões</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="d-flex align-items-center" href="<?= Config::BASE_URL ?>courses-management">
            <i class="bi bi-journal-bookmark"></i>
            <span class="menu-title text-truncate">Cursos</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="d-flex align-items-center" href="<?= Config::BASE_URL ?>news-board">
            <i class="bi bi-megaphone"></i>
            <span class="menu-title text-truncate">Murais</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="d-flex align-items-center" href="https://documenter.getpostman.com/view/17286749/2sAY545dog" target="_blank">
            <i class="bi bi-file-earmark-text"></i>
            <span class="menu-title text-truncate">Documentação API</span>
        </a>
    </li>

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
            title: '<?= __("main_menu.buscar_material.titulo") ?></u>',
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
            title: 'Ainda não temos nenhum curso disponível :/</u>',
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