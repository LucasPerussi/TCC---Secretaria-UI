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
                        <img height="30" src="<?= Config::BASE_URL ?>/src/img/logo/logo-ufpr.svg" alt="logo"></span>
                    <h2 style="font-size: 18px; font-family: 'Quicksand', sans-serif; font-weight:800;" class="brand-text">Secretaria</h2>
                    <!-- <h2 style="font-size: 18px; font-family: 'Quicksand', sans-serif; font-weight:800;" class="brand-text"><img height="20" src="<?= Config::BASE_URL ?>/src/img/logo/logo-<?php if ((isset($_COOKIE['theme']))  && ($_COOKIE['theme'] == "Dark")) : ?>branco<?php else : ?>preto<?php endif; ?>.png" alt="logo"></h2> -->
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
            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages"><?= __("menu_entity.menu.titulo") ?></span>
            </li>

            
            <?php if (isset($_SESSION["user_id"]) && ($_SESSION["user_role"] == "Servidor" || $_SESSION["user_role"] == "Professor" || $_SESSION["user_role"] == "Admin")) : ?>

                <li class=" nav-item"><a class="d-flex align-items-center" href="?page=alunos"><i class="bi bi-backpack"></i><span class="menu-title text-truncate">
                    <strong><?= __("menu_entity.alunos.titulo") ?></strong><br><span style="font-size: smaller;"><?= __("menu_entity.alunos.desc") ?></span></span></a>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="?page=servidores"><i class="bi bi-person-workspace"></i><span class="menu-title text-truncate">
                    <strong><?= __("menu_entity.servidores.titulo") ?></strong><br><span style="font-size: smaller;"><?= __("menu_entity.servidores.desc") ?></span></span></a>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="?page=chamados"><i class="bi bi-receipt"></i><span class="menu-title text-truncate">
                    <strong><?= __("menu_entity.chamados.titulo") ?></strong><br><span style="font-size: smaller;"><?= __("menu_entity.chamados.desc") ?></span></span></a>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="?page=processos"><i class="bi bi-tools"></i><span class="menu-title text-truncate">
                    <strong><?= __("menu_entity.processos.titulo") ?></strong><br><span style="font-size: smaller;"><?= __("menu_entity.processos.desc") ?></span></span></a>
                </li>

            <?php else : ?>    
            <html>
            <head>
            <meta http-equiv="Refresh" content="0; url=<?= Config::BASE_URL . "dashboard"; ?> " />
            </head>
            </html>
            <?php endif; ?>
             
            <br />
            <br />
            <br />

          
        </ul>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
</script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">