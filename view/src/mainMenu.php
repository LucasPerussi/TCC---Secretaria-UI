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
<!-- BEGIN: Main Menu-->
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <!-- <div class="navbar-header">
        <style>
        @import url('https://fonts.googleapis.com/css2?family=Quicksand&display=swap');
        </style>
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand" href="<?= Config::BASE_URL . 'dashboard' ?>"><span
                        class="brand-logo">
                        <img src="<?= Config::BASE_URL ?>src/img/icone-azul.png" alt="logo"></span>
                    <h2 style="font-size: 18px;color:#4d5153;font-family: 'Quicksand', sans-serif; font-weight:800;"
                        class="brand-text"><?= __("main_menu.nome_plataforma") ?></h2>
                </a></li>
                <li class="nav-item nav-toggle"><a href="#" class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>

        </ul>
    </div> -->
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
            <!-- <li id="searchButton" onclick="search()" class=" nav-item"><a class="d-flex align-items-center" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                    </svg><span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.menu.buscar_material") ?></span></a>
            </li> -->
            <?php if (isset($_SESSION["user_id"])) : ?>
                <!-- <li id="trainningButton" onclick="cursos()" class=" nav-item"><a class="d-flex align-items-center" href="#"><svg
                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                        class="bi bi-journal-bookmark-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                            d="M6 1h6v7a.5.5 0 0 1-.757.429L9 7.083 6.757 8.43A.5.5 0 0 1 6 8V1z" />
                        <path
                            d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2z" />
                        <path
                            d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1H1z" />
                    </svg><span class="menu-title text-truncate" data-i18n="Calendar">Cursos</span></a>
            </li> -->
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
                    <li class=" nav-item"><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "company-sales") {
                                                                                    echo "active";
                                                                                } ?>" href="<?= Config::BASE_URL . 'company-sales' ?>"><i class="bi bi-cart-check" style="margin-top:-10px;"></i><span class="menu-item text-truncate" data-i18n="Advance">Compras</span></a>
                    </li>

                    </li>
                    <li class=" nav-item"><a href="#" class="d-flex align-items-center <?php if (($url == Config::DOMINIO . "company-inventory") || ($url == Config::DOMINIO . "list-company-inventory") || ($url == Config::DOMINIO . "inventory-management") || ($url == Config::DOMINIO . "item-management") || ($url == Config::DOMINIO . "new-product") || ($url == Config::DOMINIO . "inventory-room")) {
                                                                                            echo "active";
                                                                                        } ?>"><i class="bi bi-boxes" style="margin-top:-8px;"></i><span class="menu-title text-truncate" data-i18n="Calendar">Inventário</span></a>
                        <ul class="menu-content">
                            <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "item-management") {
                                                                        echo "active";
                                                                    } ?>" href="<?= Config::BASE_URL . 'item-management' ?>"><i class="bi bi-camera"></i><span class="menu-item text-truncate" data-i18n="Advance">Gerenciar Ativos</span></a>
                            </li>
                            <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "list-company-inventory") {
                                                                        echo "active";
                                                                    } ?>" href="<?= Config::BASE_URL . 'list-company-inventory' ?>"><i class="bi bi-list-check"></i><span class="menu-item text-truncate" data-i18n="Advance">Listagem de Ativos</span></a>
                            </li>
                            <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "inventory-management") {
                                                                        echo "active";
                                                                    } ?>" href="<?= Config::BASE_URL . 'inventory-management' ?>"><i class="bi bi-tools"></i><span class="menu-item text-truncate" data-i18n="Advance">Gerenciar Inventário</span></a>
                            </li>
                            <li class=" nav-item"><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "sales-inventory-generator") {
                                                                                            echo "active";
                                                                                        } ?>" href="<?= Config::BASE_URL . 'sales-inventory-generator' ?>"><i class="bi bi-arrow-repeat"></i><span class="menu-item text-truncate" data-i18n="Advance">Gerar Inventário</span></a>
                            </li>
                            <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "stock-management") {
                                                                        echo "active";
                                                                    } ?>" href="<?= Config::BASE_URL . 'stock-management' ?>"><i class="bi bi-box-seam"></i><span class="menu-item text-truncate" data-i18n="Advance">Gerenciar Estoque</span></a>
                            </li>
                            <li class=" nav-item"><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "new-room") {
                                                                                            echo "active";
                                                                                        } ?>" href="<?= Config::BASE_URL . 'new-room' ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-house-add" viewBox="0 0 16 16">
                                        <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h4a.5.5 0 1 0 0-1h-4a.5.5 0 0 1-.5-.5V7.207l5-5 6.646 6.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5Z" />
                                        <path d="M16 12.5a3.5 3.5 0 1 1-7 0 3.5 3.5 0 0 1 7 0Zm-3.5-2a.5.5 0 0 0-.5.5v1h-1a.5.5 0 0 0 0 1h1v1a.5.5 0 1 0 1 0v-1h1a.5.5 0 1 0 0-1h-1v-1a.5.5 0 0 0-.5-.5Z" />
                                    </svg>
                                    <span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.cadastrar_sala") ?></span></a>
                            </li>
                            <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "list-rooms") {
                                                                        echo "active";
                                                                    } ?>" href="<?= Config::BASE_URL . 'list-rooms' ?>"><i class="bi bi-shop"></i><span class="menu-item text-truncate" data-i18n="Advance"><?= __("main_menu.admin.listagem.lista_salas") ?></span></a>
                            </li>
                            <li class=" nav-item"><a style="color:#249ccc;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "new-product") {
                                                                                                                    echo "active";
                                                                                                                } ?>" href="<?= Config::BASE_URL . 'new-product' ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-database-add" viewBox="0 0 16 16">
                                        <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Z" />
                                        <path d="M12.096 6.223A4.92 4.92 0 0 0 13 5.698V7c0 .289-.213.654-.753 1.007a4.493 4.493 0 0 1 1.753.25V4c0-1.007-.875-1.755-1.904-2.223C11.022 1.289 9.573 1 8 1s-3.022.289-4.096.777C2.875 2.245 2 2.993 2 4v9c0 1.007.875 1.755 1.904 2.223C4.978 15.71 6.427 16 8 16c.536 0 1.058-.034 1.555-.097a4.525 4.525 0 0 1-.813-.927C8.5 14.992 8.252 15 8 15c-1.464 0-2.766-.27-3.682-.687C3.356 13.875 3 13.373 3 13v-1.302c.271.202.58.378.904.525C4.978 12.71 6.427 13 8 13h.027a4.552 4.552 0 0 1 0-1H8c-1.464 0-2.766-.27-3.682-.687C3.356 10.875 3 10.373 3 10V8.698c.271.202.58.378.904.525C4.978 9.71 6.427 10 8 10c.262 0 .52-.008.774-.024a4.525 4.525 0 0 1 1.102-1.132C9.298 8.944 8.666 9 8 9c-1.464 0-2.766-.27-3.682-.687C3.356 7.875 3 7.373 3 7V5.698c.271.202.58.378.904.525C4.978 6.711 6.427 7 8 7s3.022-.289 4.096-.777ZM3 4c0-.374.356-.875 1.318-1.313C5.234 2.271 6.536 2 8 2s2.766.27 3.682.687C12.644 3.125 13 3.627 13 4c0 .374-.356.875-1.318 1.313C10.766 5.729 9.464 6 8 6s-2.766-.27-3.682-.687C3.356 4.875 3 4.373 3 4Z" />
                                    </svg>
                                    <span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.master.cadastrar_produto") ?></span></a>
                            </li>

                        </ul>
                    </li>
                    <!--                                                            MENU DE ADMINISTRADOR                                                                        -->
                    <?php if (($_SESSION["user_role"] == 2) && ((isset($_SESSION["pending-users"])) && ($_SESSION["pending-users"] == "true"))) : ?>
                        <li class=" nav-item"><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "pending-users") {
                                                                                        echo "active";
                                                                                    } ?>" href="<?= Config::BASE_URL . 'pending-users' ?>"><i class="bi bi-person-check"></i>
                                <span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.pendente") ?></span><span class="badge badge-light-danger rounded-pill ms-auto me-2">!</span></a>
                        </li>
                    <?php endif; ?>
                    <li class=" nav-item"><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "new-content") {
                                                                                    echo "active";
                                                                                } ?>" href="<?= Config::BASE_URL . 'new-content' ?>"><i style="margin-top:-10px;" class="bi bi-pencil-square"></i>
                            <span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.cadastrar_conteudo") ?></span></a>
                    </li>
                    <li class=" nav-item"><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "new-faq") {
                                                                                    echo "active";
                                                                                } ?>" href="<?= Config::BASE_URL . 'new-faq' ?>"><i style="margin-top:-10px;" class="bi bi-patch-question"></i>
                            <span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.cadastrar_faq") ?></span></a>
                    </li>
                    <li class=" nav-item"><a style="color:blueviolet;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "invite-users-company") {
                                                                                                            echo "active";
                                                                                                        } ?>" href="<?= Config::BASE_URL . 'invite-users-company' ?>"><i class="bi bi-person-plus" style="margin-top:-10px;"></i>
                            <span class="menu-title text-truncate" data-i18n="Calendar">Convidar Usuários</span></a>
                    </li>






                    <li class=" nav-item"><a href="#" class="d-flex align-items-center <?php if (($url == Config::DOMINIO . "company-requests") || ($url == Config::DOMINIO . "admin-request") || ($url == Config::DOMINIO . "kanban")) {
                                                                                            echo "active";
                                                                                        } ?>"><i style="margin-top:-10px;" class="bi bi-bell"></i><span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.chamados.titulo") ?></span></a>
                        <ul class="menu-content">
                            <li class=" nav-item"><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "company-requests") {
                                                                                            echo "active";
                                                                                        } ?>" href="<?= Config::BASE_URL . 'company-requests' ?>">
                                    <i class="bi bi-list"></i>
                                    <span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.chamados.solicitacoes") ?></span></a>
                            </li>
                            <!-- <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "kanban") {
                                                                                echo "active";
                                                                            } ?>" href="<?= Config::BASE_URL . 'kanban' ?>"><i class="bi bi-kanban"></i><span class="menu-item text-truncate" data-i18n="Advance"><?= __("main_menu.admin.chamados.kanban") ?></span></a>
                            </li> -->
                            <li class=" nav-item"><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "admin-request") {
                                                                                            echo "active";
                                                                                        } ?>" href="<?= Config::BASE_URL . 'admin-request' ?>">
                                    <i class="bi bi-chat-right-dots"></i>
                                    <span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.chamados.chamado_interno") ?></span></a>
                            </li>

                        </ul>
                    </li>

                    <li class=" nav-item"><a class="d-flex align-items-center <?php if (($url == Config::DOMINIO . "new-country") || ($url == Config::DOMINIO . "company-sla") || ($url == Config::DOMINIO . "new-room") || ($url == Config::DOMINIO . "new-location") || ($url == Config::DOMINIO . "list-sla-company") || ($url == Config::DOMINIO . "new-state") || ($url == Config::DOMINIO . "new-city") || ($url == Config::DOMINIO . "list-cities")) {
                                                                                    echo "active";
                                                                                } ?>" href="<?= Config::BASE_URL . 'new-faq' ?>"><i style="margin-top:-10px;" class="bi bi-gear"></i>
                            <span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.plataforma.titulo") ?></span></a>
                        <ul class="menu-content">

                            <li class=" nav-item"><a style="color:blueviolet;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "new-room") {
                                                                                                                    echo "active";
                                                                                                                } ?>" href="<?= Config::BASE_URL . 'new-room' ?>"><i class="bi bi-building" style="margin-top:-10px;"></i>
                                    <span class="menu-title text-truncate" data-i18n="Calendar">Nova Sala</span></a>
                            </li>
                            <li class=" nav-item"><a style="color:blueviolet;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "new-location") {
                                                                                                                    echo "active";
                                                                                                                } ?>" href="<?= Config::BASE_URL . 'new-location' ?>"><i class="bi bi-globe" style="margin-top:-10px;"></i>
                                    <span class="menu-title text-truncate" data-i18n="Calendar">Novo Local</span></a>
                            </li>
                            <li class=" nav-item"><a href="#" class="d-flex align-items-center subsub <?php if (($url == Config::DOMINIO . "new-country") || ($url == Config::DOMINIO . "new-state") || ($url == Config::DOMINIO . "new-city") || ($url == Config::DOMINIO . "list-cities")) {
                                                                                                            echo "active";
                                                                                                        } ?>"><i class="bi bi-pin"></i><span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.plataforma.localizacao.titulo") ?></span></a>
                                <ul class="menu-content">
                                    <!--<li><a class="d-flex align-items-center" href="#" onclick="createPassword();"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                                    <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                    </svg><span class="menu-item text-truncate" data-i18n="Basic">Trocar sua senha</span></a>
                                </li>-->
                                    <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "new-country") {
                                                                                echo "active";
                                                                            } ?>" href="<?= Config::BASE_URL . 'new-country' ?>"><i class="bi bi-pin-map"></i><span class="menu-item text-truncate" data-i18n="Advance"><?= __("main_menu.admin.plataforma.localizacao.pais") ?></span></a>
                                    </li>
                                    <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "new-state") {
                                                                                echo "active";
                                                                            } ?>" href="<?= Config::BASE_URL . 'new-state' ?>"><i class="bi bi-pin-map"></i><span class="menu-item text-truncate" data-i18n="Advance"><?= __("main_menu.admin.plataforma.localizacao.estado") ?></span></a>
                                    </li>
                                    <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "new-city") {
                                                                                echo "active";
                                                                            } ?>" href="<?= Config::BASE_URL . 'new-city' ?>"><i class="bi bi-pin"></i><span class="menu-item text-truncate" data-i18n="Advance"><?= __("main_menu.admin.plataforma.localizacao.cidade") ?></span></a>
                                    </li>
                                    <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "list-cities") {
                                                                                echo "active";
                                                                            } ?>" href="<?= Config::BASE_URL . 'list-cities' ?>"><i class="bi bi-pin"></i><span class="menu-item text-truncate" data-i18n="Advance"><?= __("main_menu.admin.plataforma.localizacao.lista_locais") ?></span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <ul class="menu-content">
                            <li class=" nav-item"><a href="#" class="d-flex align-items-center subsub <?php if (($url == Config::DOMINIO . "company-sla") || ($url == Config::DOMINIO . "list-sla-company")) {
                                                                                                            echo "active";
                                                                                                        } ?>"><i class="bi bi-table"></i><span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.plataforma.tabela_sla.titulo") ?></span></a>
                                <ul class="menu-content">
                                    <!--<li><a class="d-flex align-items-center" href="#" onclick="createPassword();"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-key-fill" viewBox="0 0 16 16">
                                    <path d="M3.5 11.5a3.5 3.5 0 1 1 3.163-5H14L15.5 8 14 9.5l-1-1-1 1-1-1-1 1-1-1-1 1H6.663a3.5 3.5 0 0 1-3.163 2zM2.5 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                    </svg><span class="menu-item text-truncate" data-i18n="Basic">Trocar sua senha</span></a>
                                </li>-->
                                    <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "company-sla") {
                                                                                echo "active";
                                                                            } ?>" href="<?= Config::BASE_URL . 'company-sla' ?>"><i class="bi bi-clock"></i><span class="menu-item text-truncate" data-i18n="Advance"><?= __("main_menu.admin.plataforma.tabela_sla.editar_tabela") ?></span></a>
                                    </li>
                                    <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "list-sla-company") {
                                                                                echo "active";
                                                                            } ?>" href="<?= Config::BASE_URL . 'list-sla-company' ?>"><i class="bi bi-table"></i><span class="menu-item text-truncate" data-i18n="Advance"><?= __("main_menu.admin.plataforma.tabela_sla.consulta_tabela") ?></span></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- <li class=" nav-item"><a class="d-flex align-items-center" href="<?= Config::BASE_URL . 'calendar' ?>"><i class="bi bi-people-fill"></i>
                    <span class="menu-title text-truncate" data-i18n="Calendar">Usuários</span></a>
                </li> -->
                    <?php if (($_SESSION["user_role"] > 1) && ($_SESSION["user_role"] < 5)) : ?>
                        <li class=" nav-item"><a href="#" class="d-flex align-items-center"><i style="margin-top:-10px;" class="bi bi-list-check"></i><span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.listagem.titulo") ?></span></a>
                            <ul class="menu-content">
                                <?php if ($_SESSION["company_id"] == 9999) : ?>

                                    <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "list-suppliers") {
                                                                                echo "active";
                                                                            } ?>" href="<?= Config::BASE_URL . 'list-suppliers' ?>"><i class="bi bi-building"></i><span class="menu-item text-truncate" data-i18n="Advance"><?= __("main_menu.admin.listagem.lista_fabricantes") ?></span></a>
                                    </li>
                                    <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "list-companies") {
                                                                                echo "active";
                                                                            } ?>" href="<?= Config::BASE_URL . 'list-companies' ?>"><i class="bi bi-hospital"></i><span class="menu-item text-truncate" data-i18n="Advance"><?= __("main_menu.admin.listagem.lista_empresas") ?></span></a>
                                    </li>
                                    <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "list-sla") {
                                                                                echo "active";
                                                                            } ?>" href="<?= Config::BASE_URL . 'list-sla' ?>"><i class="bi bi-clock"></i><span class="menu-item text-truncate" data-i18n="Advance"><?= __("main_menu.admin.listagem.lista_sla") ?></span></a>
                                    </li>
                                    <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "list-tickets") {
                                                                                echo "active";
                                                                            } ?>" href="<?= Config::BASE_URL . 'list-tickets' ?>"><i class="bi bi-pencil-square"></i><span class="menu-item text-truncate" data-i18n="Advance"><?= __("main_menu.admin.listagem.lista_solicitacoes") ?></span></a>
                                    </li>


                                <?php endif; ?>
                                <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "list-company-products") {
                                                                            echo "active";
                                                                        } ?>" href="<?= Config::BASE_URL . 'list-company-products' ?>"><i class="bi bi-collection"></i><span class="menu-item text-truncate" data-i18n="Advance"><?= __("main_menu.admin.listagem.lista_produto") ?></span></a>
                                </li>
                                <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "list-rooms") {
                                                                            echo "active";
                                                                        } ?>" href="<?= Config::BASE_URL . 'list-rooms' ?>"><i class="bi bi-shop"></i><span class="menu-item text-truncate" data-i18n="Advance"><?= __("main_menu.admin.listagem.lista_salas") ?></span></a>
                                </li>
                                <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "list-users") {
                                                                            echo "active";
                                                                        } ?>" href="<?= Config::BASE_URL . 'list-users' ?>"><i class="bi bi-people"></i><span class="menu-item text-truncate" data-i18n="Advance"><?= __("main_menu.admin.listagem.lista_usuarios") ?></span></a>
                                </li>
                                <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "list-content") {
                                                                            echo "active";
                                                                        } ?>" href="<?= Config::BASE_URL . 'list-content' ?>"><i class="bi bi-pencil-square"></i><span class="menu-item text-truncate" data-i18n="Advance"><?= __("main_menu.admin.listagem.lista_postagens") ?></span></a>
                                </li>
                                <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "list-faqs") {
                                                                            echo "active";
                                                                        } ?>" href="<?= Config::BASE_URL . 'list-faqs' ?>"><i class="bi bi-pencil-square"></i><span class="menu-item text-truncate" data-i18n="Advance"><?= __("main_menu.admin.listagem.lista_faq") ?></span></a>
                                </li>
                                <li><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "download-activities-excel") {
                                                                            echo "active";
                                                                        } ?>" href="<?= Config::BASE_URL . 'download-activities-excel' ?>"><i class="bi bi-list-stars"></i><span class="menu-item text-truncate" data-i18n="Advance"><?= __("main_menu.admin.listagem.logs") ?></span></a>
                                </li>
                            </ul>
                        </li>

                    <?php endif; ?>
                <?php endif; ?>
            <?php endif; ?>

            <!-- ***********************************FIM ADMIN MENU ******************************************** -->

            <!-- ******************************** MENU WETALK AGENTS ***************************************** -->


            <?php if (($_SESSION["user_role"] == 4) || (($_SESSION["user_role"] == 2) && ($_SESSION["company_id"] == 9999))) : ?>
                <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">AGENTE WETALK</span>
                </li>
                <li class=" nav-item"><a style="color:#249ccc;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "sales") {
                                                                                                        echo "active";
                                                                                                    } ?>" href="<?= Config::BASE_URL . 'sales' ?>"><i style="margin-top:-11px;" class="bi bi-cart-check"></i><span class="menu-item text-truncate" data-i18n="Advance">Vendas</span></a>
                </li>
                <li class=" nav-item"><a style="color:#249ccc;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "companies-licenses") {
                                                                                                        echo "active";
                                                                                                    } ?>" href="<?= Config::BASE_URL . 'companies-licenses' ?>"><i style="margin-top:-11px;" class="bi bi-credit-card"></i><span class="menu-item text-truncate" data-i18n="Advance">Licenças</span></a>
                </li>
                <li class=" nav-item"><a style="color:#249ccc;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "wetalk-sales-management") {
                                                                                                        echo "active";
                                                                                                    } ?>" href="<?= Config::BASE_URL . 'wetalk-sales-management' ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-rocket-takeoff" viewBox="0 0 16 16">
                            <path d="M9.752 6.193c.599.6 1.73.437 2.528-.362s.96-1.932.362-2.531c-.599-.6-1.73-.438-2.528.361-.798.8-.96 1.933-.362 2.532" />
                            <path d="M15.811 3.312c-.363 1.534-1.334 3.626-3.64 6.218l-.24 2.408a2.56 2.56 0 0 1-.732 1.526L8.817 15.85a.51.51 0 0 1-.867-.434l.27-1.899c.04-.28-.013-.593-.131-.956a9 9 0 0 0-.249-.657l-.082-.202c-.815-.197-1.578-.662-2.191-1.277-.614-.615-1.079-1.379-1.275-2.195l-.203-.083a10 10 0 0 0-.655-.248c-.363-.119-.675-.172-.955-.132l-1.896.27A.51.51 0 0 1 .15 7.17l2.382-2.386c.41-.41.947-.67 1.524-.734h.006l2.4-.238C9.005 1.55 11.087.582 12.623.208c.89-.217 1.59-.232 2.08-.188.244.023.435.06.57.093q.1.026.16.045c.184.06.279.13.351.295l.029.073a3.5 3.5 0 0 1 .157.721c.055.485.051 1.178-.159 2.065m-4.828 7.475.04-.04-.107 1.081a1.54 1.54 0 0 1-.44.913l-1.298 1.3.054-.38c.072-.506-.034-.993-.172-1.418a9 9 0 0 0-.164-.45c.738-.065 1.462-.38 2.087-1.006M5.205 5c-.625.626-.94 1.351-1.004 2.09a9 9 0 0 0-.45-.164c-.424-.138-.91-.244-1.416-.172l-.38.054 1.3-1.3c.245-.246.566-.401.91-.44l1.08-.107zm9.406-3.961c-.38-.034-.967-.027-1.746.163-1.558.38-3.917 1.496-6.937 4.521-.62.62-.799 1.34-.687 2.051.107.676.483 1.362 1.048 1.928.564.565 1.25.941 1.924 1.049.71.112 1.429-.067 2.048-.688 3.079-3.083 4.192-5.444 4.556-6.987.183-.771.18-1.345.138-1.713a3 3 0 0 0-.045-.283 3 3 0 0 0-.3-.041Z" />
                            <path d="M7.009 12.139a7.6 7.6 0 0 1-1.804-1.352A7.6 7.6 0 0 1 3.794 8.86c-1.102.992-1.965 5.054-1.839 5.18.125.126 3.936-.896 5.054-1.902Z" />
                        </svg><span class="menu-item text-truncate" data-i18n="Advance">Gerir Vendas</span></a>
                </li>
                <li class=" nav-item"><a style="color:#249ccc;" href="#" class="d-flex align-items-center  <?php if (($url == Config::DOMINIO . "master-requests") || ($url == Config::DOMINIO . "all-tickets")) {
                                                                                                                echo "active";
                                                                                                            } ?>"><i style="margin-top:-10px;" class="bi bi-exclamation-circle"></i><span class="menu-title text-truncate" data-i18n="Calendar">Chamados</span></a>

                    <ul class="menu-content">
                        <li class=" nav-item"><a style="color:#249ccc;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "master-requests") {
                                                                                                                echo "active";
                                                                                                            } ?>" href="<?= Config::BASE_URL . 'master-requests' ?>"><i style="margin-top:-8px;" class="bi bi-exclamation-circle"></i>
                                <span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.master.chamados_wetalk") ?></span></a>
                        </li>
                        <li class=" nav-item"><a style="color:blueviolet;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "all-tickets") {
                                                                                                                echo "active";
                                                                                                            } ?>" href="<?= Config::BASE_URL . 'all-tickets' ?>"><i class="bi bi-list"></i>
                                <span class="menu-title text-truncate" data-i18n="Calendar">Lista Chamados</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a style="color:#249ccc;" href="#" class="d-flex align-items-center  <?php if (($url == Config::DOMINIO . "list-users-access") || ($url == Config::DOMINIO . "list-users-status") || ($url == Config::DOMINIO . "invite-users")) {
                                                                                                                echo "active";
                                                                                                            } ?>"><i style="margin-top:-10px;" class="bi bi-people"></i><span class="menu-title text-truncate" data-i18n="Calendar">Usuários</span></a>

                    <ul class="menu-content">
                        <li class=" nav-item"><a style="color:#249ccc;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "list-users-access") {
                                                                                                                echo "active";
                                                                                                            } ?>" href="<?= Config::BASE_URL . 'list-users-access' ?>"><i style="margin-top:-8px;" class="bi bi-globe"></i>
                                <span class="menu-title text-truncate" data-i18n="Calendar">Acessos Sistema</span></a>
                        </li>
                        <li class=" nav-item"><a style="color:#249ccc;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "list-users-status") {
                                                                                                                echo "active";
                                                                                                            } ?>" href="<?= Config::BASE_URL . 'list-users-status' ?>"><i class="bi bi-person-fill-exclamation"></i>
                                <span class="menu-title text-truncate" data-i18n="Calendar">Status Usuários</span></a>
                        </li>
                        <li class=" nav-item"><a style="color:blueviolet;" class="d-flex align-items-center <?php if (($url == Config::DOMINIO . "invite-users") || ($url == Config::DOMINIO . "invite-users?company=" . $_GET["company"])) {
                                                                                                        echo "active";
                                                                                                    } ?>" href="<?= Config::BASE_URL . 'invite-users' ?>"><i class="bi bi-person-plus" style="margin-top:-10px;"></i>
                        <span class="menu-title text-truncate" data-i18n="Calendar">Convidar Usuários</span></a>
                </li>
                       
                    </ul>
                </li>

                <li class=" nav-item"><a style="color:#249ccc;" href="#" class="d-flex align-items-center  <?php if (($url == Config::DOMINIO . "new-projects") || ($url == Config::DOMINIO . "list-projects") || ($url == Config::DOMINIO . "calendar-master") || ($url == Config::DOMINIO . "ongoing-projects")) {
                                                                                                                echo "active";
                                                                                                            } ?>">
                        <i style="margin-top:-8px;" class="bi bi-ubuntu"></i><span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.master.projetos.titulo") ?></span></a>

                    <ul class="menu-content">
                        <li class=" nav-item"><a style="color:blueviolet;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "new-projects") {
                                                                                                                echo "active";
                                                                                                            } ?>" href="<?= Config::BASE_URL . 'new-projects' ?>"><i class="bi bi-ubuntu"></i>
                                <span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.master.projetos.cadastrar_projetos") ?></span></a>
                        </li>
                        <li class=" nav-item"><a style="color:blueviolet;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "list-projects") {
                                                                                                                echo "active";
                                                                                                            } ?>" href="<?= Config::BASE_URL . 'list-projects' ?>"><i class="bi bi-list-stars"></i>
                                <span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.master.projetos.listar_projetos") ?></span></a>
                        </li>
                        <li class=" nav-item"><a style="color:blueviolet;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "ongoing-projects") {
                                                                                                                echo "active";
                                                                                                            } ?>" href="<?= Config::BASE_URL . 'ongoing-projects' ?>"><i class="bi bi-ui-checks"></i>
                                <span class="menu-title text-truncate" data-i18n="Calendar">Ongoing</span></a>
                        </li>
                        <li class=" nav-item"><a style="color:blueviolet;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "calendar-master") {
                                                                                                                echo "active";
                                                                                                            } ?>" href="<?= Config::BASE_URL . 'calendar-master' ?>"><i class="bi bi-calendar"></i>
                                <span class="menu-title text-truncate" data-i18n="Calendar">Calendário
                                    Geral</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a style="color:#249ccc;" href="#" class="d-flex align-items-center  <?php if (($url == Config::DOMINIO . "new-contact") || ($url == Config::DOMINIO . "list-contacts")) {
                                                                                                                echo "active";
                                                                                                            } ?>"><i style="margin-top:-8px;" class="bi bi-person-badge"></i><span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.master.clientes.titulo") ?></span></a>

                    <ul class="menu-content">
                        <li class=" nav-item"><a style="color:blueviolet;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "new-contact") {
                                                                                                                echo "active";
                                                                                                            } ?>" href="<?= Config::BASE_URL . 'new-contact' ?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-fill-add" viewBox="0 0 16 16">
                                    <path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                    <path d="M2 13c0 1 1 1 1 1h5.256A4.493 4.493 0 0 1 8 12.5a4.49 4.49 0 0 1 1.544-3.393C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4Z" />
                                </svg>
                                <span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.master.clientes.cadastrar_cliente") ?></span></a>
                        </li>
                        <li class=" nav-item"><a style="color:blueviolet;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "list-contacts") {
                                                                                                                echo "active";
                                                                                                            } ?>" href="<?= Config::BASE_URL . 'list-contacts' ?>"><i class="bi bi-people-fill"></i>
                                <span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.master.clientes.listar_clientes") ?></span></a>
                        </li>
                    </ul>
                </li>
                <!-- ENTREGAS -->
                <li class=" nav-item"><a style="color:#249ccc;" href="#" class="d-flex align-items-center  <?php if (($url == Config::DOMINIO . "manually-tracking") || ($url == Config::DOMINIO . "shipping-process") || ($url == Config::DOMINIO . "shipping-all")) {
                                                                                                                echo "active";
                                                                                                            } ?>"><i class="bi bi-truck" style="margin-top:-7px;"></i><span class="menu-title text-truncate" data-i18n="Calendar">Entregas</span></a>

                    <ul class="menu-content">
                        <li class=" nav-item"><a style="color:blueviolet;" class="d-flex align-items-center <?php if (($url == Config::DOMINIO . "manually-tracking") || ($url == Config::DOMINIO . "manually-tracking?transportadora=" . $_GET["transportadora"] . "&origem=" . $_GET["origem"] . "&nfe=" . $_GET["nfe"] . "&destino=" . $_GET["destino"])) {
                                                                                                                echo "active";
                                                                                                            } ?>" href="<?= Config::BASE_URL . 'manually-tracking' ?>"><i class="bi bi-truck" style="margin-top:-10px;"></i>
                                <span class="menu-title text-truncate" data-i18n="Calendar">Rastreamento Manual</span></a>
                        </li>
                        <li class=" nav-item"><a style="color:blueviolet;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "shipping-process") {
                                                                                                                echo "active";
                                                                                                            } ?>" href="<?= Config::BASE_URL . 'shipping-process' ?>"><i class="bi bi-airplane"></i>
                                <span class="menu-title text-truncate" data-i18n="Calendar">Em aberto</span></a>
                        </li>
                        <li class=" nav-item"><a style="color:blueviolet;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "shipping-all") {
                                                                                                                echo "active";
                                                                                                            } ?>" href="<?= Config::BASE_URL . 'shipping-all' ?>"><i class="bi bi-boxes"></i>
                                <span class="menu-title text-truncate" data-i18n="Calendar">Todos os processos</span></a>
                        </li>
                    </ul>
                </li>
                <!-- FIM ENTREGAS -->
                <li class=" nav-item"><a style="color:#249ccc;" href="#" class="d-flex align-items-center <?php //if (($url == Config::DOMINIO . "new-os") || ($url == Config::DOMINIO . "all-proposals") || ($url == Config::DOMINIO . "new-supplier") || ($url == Config::DOMINIO . "new-service-provider")) {
                                                                                                               // echo "active";
                                                                                                          //  } ?>  ">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-gear" viewBox="0 0 16 16">
                            <path d="M11 5a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm.256 7a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Zm3.63-4.54c.18-.613 1.048-.613 1.229 0l.043.148a.64.64 0 0 0 .921.382l.136-.074c.561-.306 1.175.308.87.869l-.075.136a.64.64 0 0 0 .382.92l.149.045c.612.18.612 1.048 0 1.229l-.15.043a.64.64 0 0 0-.38.921l.074.136c.305.561-.309 1.175-.87.87l-.136-.075a.64.64 0 0 0-.92.382l-.045.149c-.18.612-1.048.612-1.229 0l-.043-.15a.64.64 0 0 0-.921-.38l-.136.074c-.561.305-1.175-.309-.87-.87l.075-.136a.64.64 0 0 0-.382-.92l-.148-.045c-.613-.18-.613-1.048 0-1.229l.148-.043a.64.64 0 0 0 .382-.921l-.074-.136c-.306-.561.308-1.175.869-.87l.136.075a.64.64 0 0 0 .92-.382l.045-.148ZM14 12.5a1.5 1.5 0 1 0-3 0 1.5 1.5 0 0 0 3 0Z" />
                        </svg></i><span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.master.parceiros.titulo") ?></span></a>

                    <ul class="menu-content">
                        <li class=" nav-item subsub"><a style="color:blueviolet;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "new-os") {
                                                                                                                        echo "active";
                                                                                                                    } ?>" href="<?= Config::BASE_URL . 'new-os' ?>"><i class="bi bi-briefcase"></i>
                                <span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.master.parceiros.nova_os") ?></span></a>
                        </li>
                        <li class=" nav-item subsub"><a style="color:blueviolet;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "all-proposals") {
                                                                                                                        echo "active";
                                                                                                                    } ?>" href="<?= Config::BASE_URL . 'all-proposals' ?>"><i class="bi bi-coin"></i>
                                <span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.master.parceiros.orcamento") ?></span></a>
                        </li>


                    </ul>
                </li>

            
                <li class=" nav-item"><a style="color:blueviolet;" class="d-flex align-items-center <?php if (($url == Config::DOMINIO . "wetalk-sales-inventory-generator")) {
                                                                                                        echo "active";
                                                                                                    } ?>" href="<?= Config::BASE_URL . 'wetalk-sales-inventory-generator' ?>"><i class="bi bi-upc-scan" style="margin-top:-10px;"></i>
                        <span class="menu-title text-truncate" data-i18n="Calendar">Relação de Envio</span></a>
                </li>
                <li class=" nav-item"><a style="color:blueviolet;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "email-queue") {
                                                                                                        echo "active";
                                                                                                    } ?>" href="<?= Config::BASE_URL . 'email-queue' ?>"><i class="bi bi-mailbox" style="margin-top:-10px;"></i>
                        <span class="menu-title text-truncate" data-i18n="Calendar">Central de Emails</span></a>
                </li>
                <li class=" nav-item"><a style="color:#249ccc;" href="#" class="d-flex align-items-center d"><i style="margin-top:-5px;" class="bi bi-files"></i><span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.master.arquivos.titulo") ?></span></a>
                    <ul class="menu-content">
                        <li class=" nav-item subsub"><a style="color:blueviolet;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "file-upload") {
                                                                                                                        echo "active";
                                                                                                                    } ?>" href="<?= Config::BASE_URL . 'file-upload' ?>"><i class="bi bi-upload"></i>
                                <span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.master.arquivos.fazer_upload") ?></span></a>
                        </li>

                        <li class=" nav-item subsub"><a style="color:blueviolet;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "list-nfes") {
                                                                                                                        echo "active";
                                                                                                                    } ?>" href="<?= Config::BASE_URL . 'list-nfes' ?>"><i class="bi bi-cash-coin"></i>
                                <span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.master.arquivos.notas_fiscais") ?></span></a>
                        </li>

                    </ul>
                </li>

            <?php endif; ?>











            <!-- ******************************** FIM MENU WETALK AGENTS ***************************************** -->



            <!-- ***********************************  MASTER MENU ******************************************** -->

            <?php if (($_SESSION["company_id"] == 9999) && ($_SESSION["user_role"] == 2)) : ?>

                <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">MASTER</span>
                </li>

                <li class=" nav-item"><a href="#" class="d-flex align-items-center"><i style="margin-top:-10px;" class="bi bi-star"></i><span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.master.titulo") ?></span></a>
                    <ul class="menu-content">

                        <li class=" nav-item"><a style="color:#249ccc;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "master-bi") {
                                                                                                                echo "active";
                                                                                                            } ?>" href="<?= Config::BASE_URL . 'master-bi' ?>"><i class="bi bi-bar-chart"></i>
                                <span class="menu-title text-truncate" data-i18n="Calendar">Master BI</span></a>
                        </li>
                        <li class=" nav-item"><a class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "company-inventory") {
                                                                                        echo "active";
                                                                                    } ?>" href="<?= Config::BASE_URL . 'master-inventory' ?>"><i class="bi bi-boxes"></i><span class="menu-item text-truncate" data-i18n="Advance">Inventário de Clientes</span></a>
                        </li>
                        <li class=" nav-item"><a style="color:#249ccc;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "new-company") {
                                                                                                                echo "active";
                                                                                                            } ?>" href="<?= Config::BASE_URL . 'new-company' ?>"><i class="bi bi-hospital"></i>
                                <span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.master.cadastrar_empresa") ?></span></a>
                        </li>

                        <li class=" nav-item"><a style="color:#249ccc;" class="d-flex align-items-cente <?php if ($url == Config::DOMINIO . "api-keys") {
                                                                                                            echo "active";
                                                                                                        } ?>r" href="<?= Config::BASE_URL . 'api-keys' ?>"><i class="bi bi-key"></i>
                                <span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.master.cadastrar_APIKeys") ?></span></a>
                        </li>
                        <li class=" nav-item"><a style="color:#249ccc;" class="d-flex align-items-cente <?php if ($url == Config::DOMINIO . "shipping-company") {
                                                                                                            echo "active";
                                                                                                        } ?>r" href="<?= Config::BASE_URL . 'shipping-company' ?>"><i class="bi bi-truck"></i>
                                <span class="menu-title text-truncate" data-i18n="Calendar">Transportadoras</span></a>
                        </li>
                        <li class=" nav-item"><a style="color:#249ccc;" href="#" class="d-flex align-items-center  <?php if (($url == Config::DOMINIO . "new-os") || ($url == Config::DOMINIO . "all-proposals") || ($url == Config::DOMINIO . "new-supplier") || ($url == Config::DOMINIO . "new-service-provider")) {
                                                                                                                        echo "active";
                                                                                                                    } ?>  "><i class="bi bi-bell"></i><span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.master.parceiros.titulo") ?></span></a>

                            <ul class="menu-content">
                                <li class=" nav-item subsub"><a style="color:blueviolet;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "new-os") {
                                                                                                                                echo "active";
                                                                                                                            } ?>" href="<?= Config::BASE_URL . 'new-os' ?>"><i class="bi bi-briefcase"></i>
                                        <span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.master.parceiros.nova_os") ?></span></a>
                                </li>
                                <li class=" nav-item subsub"><a style="color:blueviolet;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "all-proposals") {
                                                                                                                                echo "active";
                                                                                                                            } ?>" href="<?= Config::BASE_URL . 'all-proposals' ?>"><i class="bi bi-coin"></i>
                                        <span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.master.parceiros.orcamento") ?></span></a>
                                </li>
                                <li class=" nav-item subsub"><a style="color:blueviolet;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "new-service-provider") {
                                                                                                                                echo "active";
                                                                                                                            } ?>" href="<?= Config::BASE_URL . 'new-service-provider' ?>"><i class="bi bi-people"></i>
                                        <span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.master.parceiros.prestadores") ?></span></a>
                                </li>
                                <li class=" nav-item subsub"><a style="color:blueviolet;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "new-supplier") {
                                                                                                                                echo "active";
                                                                                                                            } ?>" href="<?= Config::BASE_URL . 'new-supplier' ?>"><i class="bi bi-building"></i>
                                        <span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.master.parceiros.cadastrar_fornecedor") ?></span></a>
                                </li>

                            </ul>
                        </li>
                        <li class=" nav-item"><a style="color:#249ccc;" href="#" class="d-flex align-items-center  <?php if (($url == Config::DOMINIO . "master-recent-logs") || ($url == Config::DOMINIO . "master-logs")) {
                                                                                                                        echo "active";
                                                                                                                    } ?>  "><i class="bi bi-clock"></i><span class="menu-title text-truncate" data-i18n="Calendar">Logs</span></a>

                            <ul class="menu-content">
                                <li class=" nav-item"><a  class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "master-recent-logs") {
                                                                                                                        echo "active";
                                                                                                                    } ?>" href="<?= Config::BASE_URL . 'master-recent-logs' ?>"><i class="bi bi-clock-history"></i><span class="menu-item text-truncate" data-i18n="Advance">Logs Recentes</span></a>
                                </li>
                                <li class=" nav-item"><a  class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "master-logs") {
                                                                                                                        echo "active";
                                                                                                                    } ?>" href="<?= Config::BASE_URL . 'master-logs' ?>"><i class="bi bi-list-columns-reverse"></i><span class="menu-item text-truncate" data-i18n="Advance">Todos os Logs</span></a>
                                </li>


                            </ul>
                        </li>
                        <li class=" nav-item"><a style="color:#249ccc;" href="#" class="d-flex align-items-center "><i class="bi bi-files"></i><span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.master.arquivos.titulo") ?></span></a>

                            <ul class="menu-content">
                                <li class=" nav-item subsub"><a style="color:blueviolet;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "file-upload") {
                                                                                                                                echo "active";
                                                                                                                            } ?>" href="<?= Config::BASE_URL . 'file-upload' ?>"><i class="bi bi-upload"></i>
                                        <span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.master.arquivos.fazer_upload") ?></span></a>
                                </li>
                                <li class=" nav-item subsub"><a style="color:blueviolet;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "list-nfes") {
                                                                                                                                echo "active";
                                                                                                                            } ?>" href="<?= Config::BASE_URL . 'list-nfes' ?>"><i class="bi bi-cash-coin"></i>
                                        <span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.master.arquivos.notas_fiscais") ?></span></a>
                                </li>
                                <li class=" nav-item subsub"><a style="color:blueviolet;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "list-files") {
                                                                                                                                echo "active";
                                                                                                                            } ?>" href="<?= Config::BASE_URL . 'list-files' ?>"><i class="bi bi-list"></i>
                                        <span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.master.arquivos.listar_tudo") ?></span></a>
                                </li>


                            </ul>
                        </li>




                        <li class=" nav-item"><a style="color:#249ccc;" href="#" class="d-flex align-items-center "><i class="bi bi-file-earmark-text"></i><span class="menu-title text-truncate" data-i18n="Calendar">Contratos</span></a>
                            <ul class="menu-content">
                                <li class=" nav-item"><a style="color:#249ccc;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "new-contract") {
                                                                                                                        echo "active";
                                                                                                                    } ?>" href="<?= Config::BASE_URL . 'new-contract' ?>"><i class="bi bi-file-earmark-text"></i>
                                        <span class="menu-title text-truncate" data-i18n="Calendar">Novo Contrato</span></a>
                                </li>
                            </ul>
                        </li>





                        <li class=" nav-item"><a style="color:#249ccc;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "list-products-edit") {
                                                                                                                echo "active";
                                                                                                            } ?>" href="<?= Config::BASE_URL . 'list-products-edit' ?>"><i class="bi bi-camera"></i>
                                <span class="menu-title text-truncate" data-i18n="Calendar">Edição de Produtos</span></a>
                        </li>
                        <li class=" nav-item"><a style="color:#249ccc;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "os-kanban") {
                                                                                                                echo "active";
                                                                                                            } ?>" href="<?= Config::BASE_URL . 'os-kanban' ?>"><i class="bi bi-kanban"></i>
                                <span class="menu-title text-truncate" data-i18n="Calendar">OSs Internas</span></a>
                        </li>

                        <li class=" nav-item"><a style="color:#249ccc;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "register-sla") {
                                                                                                                echo "active";
                                                                                                            } ?>" href="<?= Config::BASE_URL . 'register-sla' ?>"><i class="bi bi-clock"></i>
                                <span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.master.cadastrar_sla") ?></span></a>
                        </li>

                        <li class=" nav-item"><a style="color:#249ccc;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "list-users-master") {
                                                                                                                echo "active";
                                                                                                            } ?>" href="<?= Config::BASE_URL . 'list-users-master' ?>"><i class="bi bi-people"></i><span class="menu-item text-truncate" data-i18n="Advance"><?= __("main_menu.admin.master.lista_usuarios") ?></span></a>
                        </li>
                        <li class=" nav-item"><a style="color:#249ccc;" href="#" class="d-flex align-items-center "><i class="bi bi-intersect"></i><span class="menu-title text-truncate" data-i18n="Calendar">Ploomes</span></a>

                            <ul class="menu-content">
                                <li class=" nav-item"><a style="color:#249ccc;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "ploomes-integration") {
                                                                                                                        echo "active";
                                                                                                                    } ?>" href="<?= Config::BASE_URL . 'ploomes-integration' ?>"><i class="bi bi-intersect"></i><span class="menu-item text-truncate" data-i18n="Advance">Ploomes Dash</span></a>
                                </li>
                                <li class=" nav-item"><a style="color:#249ccc;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "sales") {
                                                                                                                        echo "active";
                                                                                                                    } ?>" href="<?= Config::BASE_URL . 'sales' ?>"><i class="bi bi-cart-check"></i><span class="menu-item text-truncate" data-i18n="Advance">Vendas</span></a>
                                </li>
                                <li class=" nav-item"><a style="color:#249ccc;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "connections") {
                                                                                                                        echo "active";
                                                                                                                    } ?>" href="<?= Config::BASE_URL . 'connections' ?>"><i class="bi bi-link"></i><span class="menu-item text-truncate" data-i18n="Advance">Hub de Contatos</span></a>
                                </li>
                                <li class=" nav-item"><a style="color:#249ccc;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "users-connections") {
                                                                                                                        echo "active";
                                                                                                                    } ?>" href="<?= Config::BASE_URL . 'users-connections' ?>"><i class="bi bi-people"></i><span class="menu-item text-truncate" data-i18n="Advance">Hub de Pessoas</span></a>
                                </li>
                                <li class=" nav-item"><a style="color:#249ccc;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "products-connections") {
                                                                                                                        echo "active";
                                                                                                                    } ?>" href="<?= Config::BASE_URL . 'products-connections' ?>"><i class="bi bi-camera"></i><span class="menu-item text-truncate" data-i18n="Advance">Hub de Produtos</span></a>
                                </li>
                                <li class=" nav-item"><a style="color:#249ccc;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "ploomes-webhooks") {
                                                                                                                        echo "active";
                                                                                                                    } ?>" href="<?= Config::BASE_URL . 'ploomes-webhooks' ?>"><i class="bi bi-activity"></i><span class="menu-item text-truncate" data-i18n="Advance">Webhooks</span></a>
                                </li>
                                <li class=" nav-item"><a style="color:#249ccc;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "ploomes-lists") {
                                                                                                                        echo "active";
                                                                                                                    } ?>" href="<?= Config::BASE_URL . 'ploomes-lists' ?>"><i class="bi bi-list"></i><span class="menu-item text-truncate" data-i18n="Advance">Entidades</span></a>
                                </li>


                            </ul>
                        </li>











                        <li class=" nav-item"><a style="color:#3CB371;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "heroes-only") {
                                                                                                                echo "active";
                                                                                                            } ?>" href="<?= Config::BASE_URL . 'heroes-only' ?>"><i class="bi bi-hypnotize"></i>
                                <span class="menu-title text-truncate" data-i18n="Calendar"><?= __("main_menu.admin.master.hero") ?></span></a>
                        </li>
                        <li class=" nav-item"><a style="color:#FF0000;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "lottery-machine") {
                                                                                                                echo "active";
                                                                                                            } ?>" href="<?= Config::BASE_URL . 'lottery-machine' ?>"><i class="bi bi-trophy"></i><span class="menu-item text-truncate" data-i18n="Advance">Sorteio</span></a>
                        </li>
                        <li class=" nav-item"><a style="color:#FF0000;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "master-logs") {
                                                                                                                echo "active";
                                                                                                            } ?>" href="<?= Config::BASE_URL . 'master-logs' ?>"><i class="bi bi-list-columns-reverse"></i><span class="menu-item text-truncate" data-i18n="Advance"><?= __("main_menu.admin.master.logs") ?></span></a>
                        </li>
                        <li class=" nav-item"><a style="color:#FF0000;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "users-codes") {
                                                                                                                echo "active";
                                                                                                            } ?>" href="<?= Config::BASE_URL . 'users-codes' ?>"><i class="bi bi-envelope-exclamation-fill"></i><span class="menu-item text-truncate" data-i18n="Advance">Codes</span></a>
                        </li>
                        <li class=" nav-item"><a target="_blank" style="color:#FF0000;" class="d-flex align-items-center <?php if ($url == Config::DOMINIO . "testing") {
                                                                                                                                echo "active";
                                                                                                                            } ?>" href="<?= Config::BASE_URL . 'testing' ?>"><i class="bi bi-ubuntu"></i><span class="menu-item text-truncate" data-i18n="Advance">Hardware</span></a>
                        </li>
                    </ul>
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