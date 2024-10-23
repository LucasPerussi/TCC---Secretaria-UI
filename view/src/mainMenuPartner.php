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
            <li class=" nav-item"><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "dashboard") {
                                                                            echo "active";
                                                                        } ?>" href="<?= Config::BASE_URL . "dashboard"; ?>">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                        <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                    </svg><span class="menu-title text-truncate" data-i18n="Dashboards"><?php echo __("menu.dashboard"); ?></span></a>
            </li>
            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Apps &amp; Pages</span>
                <!--                                                                MEMBROS NORMAIS                                                              -->
            </li>


            <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "manual-os") {
                                                        echo "active";
                                                    } ?>" href="<?= Config::BASE_URL . 'manual-os' ?>"><i class="bi bi-plus-circle" style="margin-top:-7px;"></i><span class="menu-item text-truncate" data-i18n="Advance">Cadastrar OS</span></a>
            </li>
            <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "list-partner-os") {
                                                        echo "active";
                                                    } ?>" href="<?= Config::BASE_URL . 'list-partner-os' ?>"><i class="bi bi-receipt" style="margin-top:-5px;"></i><span class="menu-item text-truncate" data-i18n="Advance">Orçamentos</span></a>
            </li>
            <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "partner-reports") {
                                                        echo "active";
                                                    } ?>" href="<?= Config::BASE_URL . 'partner-reports' ?>"><i class="bi bi-graph-up" style="margin-top:-5px;"></i><span class="menu-item text-truncate" data-i18n="Advance">Relatórios</span></a>
            </li>
            <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "partner-nfes") {
                                                        echo "active";
                                                    } ?>" href="<?= Config::BASE_URL . 'partner-nfes' ?>"><i class="bi bi-file-earmark-pdf" style="margin-top:-5px;"></i><span class="menu-item text-truncate" data-i18n="Advance">Arquivos</span></a>
            </li>
            <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "partner-hours") {
                                                        echo "active";
                                                    } ?>" href="<?= Config::BASE_URL . 'partner-hours' ?>"><i class="bi bi-clock" style="margin-top:-5px;"></i><span class="menu-item text-truncate" data-i18n="Advance">Ger. de Horas</span></a>
            <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "partner-contract") {
                                                        echo "active";
                                                    } ?>" href="<?= Config::BASE_URL . 'partner-contract' ?>"><i class="bi bi-newspaper" style="margin-top:-5px;"></i><span class="menu-item text-truncate" data-i18n="Advance">Contrato</span></a>
            </li>
            </li>
            <!-- <li class=" nav-item"><a class="d-flex align-items-center" href="<?= Config::BASE_URL . 'list-partner-os' ?>"><i class="bi bi-coin"></i>
                    <span class="menu-title text-truncate" data-i18n="Calendar">Notas Fiscais</span></a>
            </li> -->
        </ul>
    </div>
</div>

<!-- END: Main Menu-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.min.js"></script>