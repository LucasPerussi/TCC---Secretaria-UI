<?php

use API\Controller\Config;
use API\Controller\ipinfo;
use const Siler\Config\CONFIG; ?>



<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">


<head>

    <?php include "view/src/head.php"; ?>
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <link rel="stylesheet" type="text/css" href="layout/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/css/pages/dashboard-ecommerce.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/css/plugins/extensions/ext-component-toastr.css">
    <link rel="stylesheet" type="text/css" href="src/css/dashboard.css">
    <link rel="stylesheet" href="src/css/main.css">
    <meta name='robots' content='noindex'>
    <link rel="stylesheet" type="text/css" href="src/css/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="src/css/carousel.css">
    <title>Painel Admin</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap');

        .card:hover {
            transform: unset !important;
        }

        .options:hover {
            transform: scale(1.05) !important;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="layout/assets/css/style.css">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css'>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css'>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" href="src/css/inbound.css">
    <?php
    date_default_timezone_set('America/Sao_Paulo');
    // $date = date('Y-m-d H:i');
    $date = date('H');
    // $date = 14;

    ?>

    <!--END: Head-->
</head>

<!-- BEGIN: Body style="background-color:#F4F4F8;"-->

<body class="snippet-body vertical-layout vertical-menu-modern  navbar-floating footer-static dark-layout  <?php if ($_SESSION["user_id"]) {
                                                                                                                echo "menu-collapsed";
                                                                                                            } else {
                                                                                                                echo "menu-hide";
                                                                                                            } ?>" data-open="click" style="padding-right:0px;" data-menu="vertical-menu-modern">

    <!--BEGIN: Navbar -->
    <?php include "view/src/header.php"; ?>
    <!--END: Navbar -->

    <!--BEGIN: Sidebar -->
    <?php include "view/src/mainMenu.php"; ?>
    <!--END: Sidebar -->

    <!-- BEGIN: Content-->
    <div style="overflow:hidden;" class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <!-- <div class="content-header row"> </div> -->
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->
                <h1 style="font-weight:500; "><?= __("dashboard_admin.titulo") ?> </h1>


                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="card options" style="padding:20px; ">
                            <h3 style="font-weight: 700 !important;">
                                Links úteis
                            </h3>
                            <p class=" mb-0" style="color:gray;">
                                Acesse recursos importantes de forma rápida</p>
                            <br />
                            <a href="<?= Config::BASE_URL ?>dashboard-server" class="btn btn-info" id="" style="padding:15px;width:100%;margin-bottom:15px;">Atuar como Servidor</a>
                            <a href="<?= Config::BASE_URL ?>system-logs" class="btn secondaryButton" id="" style="padding:15px;width:100%;margin-bottom:15px;">Logs do Sistema</a>
                            <a href="<?= Config::BASE_URL ?>entity-list"  class="btn secondaryButton" style="padding:15px;width:100%;margin-bottom:15px;">Entidades</a>
                            <a href="<?= Config::BASE_URL ?>requests-list"  class="btn secondaryButton" style="padding:15px;width:100%;margin-bottom:15px;">Chamados</a>
                            <a href="<?= Config::BASE_URL ?>proccess-management"  class="btn secondaryButton" style="padding:15px;width:100%;margin-bottom:15px;">Processos</a>
                            <a href="<?= Config::BASE_URL ?>fields"  class="btn secondaryButton" style="padding:15px;width:100%;margin-bottom:15px;">Campos Padrões</a>
                            <a href="<?= Config::BASE_URL ?>stages"  class="btn secondaryButton" style="padding:15px;width:100%;margin-bottom:15px;">Etapas Padrões</a>
                            <a href="<?= Config::BASE_URL ?>courses-management"  class="btn secondaryButton" style="padding:15px;width:100%;margin-bottom:15px;">Cursos</a>
                            <a href="<?= Config::BASE_URL ?>news-board"  class="btn secondaryButton" style="padding:15px;width:100%;margin-bottom:15px;">Murais</a>
                            <a href="https://documenter.getpostman.com/view/17286749/2sAY545dog" target="_blank" class="btn secondaryButton" style="padding:15px;width:100%;margin-bottom:15px;">Documentação API</a>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <h2>Logs <a href="system-logs" style="float:right; font-size:11px;padding:7px;"class="btn btn-dark" >Ver Todos</a></h2>
                        <h6>Últimos 50 logs registrados</h6>
                        <br />
                        <div class="card p-1">
                            <?php foreach($last50Logs as $log){?>
                                <div class="card mb-0" id="bodyRequestDash" style="margin-bottom:5px !important;">
                                    <h5 style="font-weight:bold !important;"><?=$log["funcao"]?> <span style="float:right; font-size:11px;"class="badge rounded-pill bg-light-<?php if ($log["status"] == "error"){echo "danger";}else{echo $log["status"];}?>" ><?=$log["status"]?></span></h5>
                                    <h6 style="font-size:11px;">
                                         <?=$log["mensagem"] ?> - Usr: <?=$log["usuario"] ?? "EXT"?>                                                
                                    </h6>
                                  

                                </div>
                            <?php }?>

                        </div>
                    </div>
                </div>

            </div>


            <!-- END: Content-->
            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js'></script>
            <script src='https://use.fontawesome.com/826a7e3dce.js'></script>
            <script src="src/js/swiper-bundle.min.js"></script>


            <div class="sidenav-overlay"></div>
            <div class="drag-target"></div>

            <!-- endbuild -->

            <!-- Vendors JS -->


            <!-- Main JS -->
            <script src="test/assets/js/main.js"></script>

            <!-- <script src="layout/app-assets/js/scripts/my-department.js"></script> -->
            <?php include "view/src/footer.php"; ?>
            <style>
                .owl-stage-outer {
                    height: 500px;

                }

                .cards {
                    margin-right: 10px;
                }
            </style>
</body>

</html>