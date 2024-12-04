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
    <title>WeJourney - Painel Admin</title>

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
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb ps-0">
                                <li class="breadcrumb-item"><a href="<?= Config::BASE_URL . 'proccess-management' ?>">Lista de processos</a></li>
                                <li class="breadcrumb-item active">Gerenciamento do processo <?= $process["nome"] ?></li>
                            </ol>
                        </div>
                    </div>
                    <h1 style="font-weight:500; "><?= $process["nome"] ?> </h1>
                    <h6 style="font-size:10px; margin-top:-5px;">Tipo de processo </h6>
                </div>

            </div>
            <!-- <div class="content-header row"> </div> -->
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->


                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <h2>Etapas do processo <a class="btn btn-dark" style="font-size:10px !important; float:right; padding:8px !important;" href="<?= Config::BASE_URL ?>proccess-stages/<?= $args['proccessId'] ?>">Gerenciar</a></h2>
                        <br />

                        <?php foreach ($proccessStages as $stage) { ?>
                            <?php foreach ($allStageTypes as $type) { ?>
                                <?php if ($type["id"] == $stage["tipo"]) { ?>

                                    <div class="card mb-0 p-1 pb-0" style="margin-bottom:5px !important;">
                                        <h6 style=" margin-bottom:10px;">
                                            <div style="height:15px; width:15px; margin-right:15px; border-radius:15px;float:left; background-color:<?= htmlspecialchars($type['cor']) ?> !important;"></div>
                                            <?= htmlspecialchars($type["label"] ?? $type["nome"]) ?> (<?= htmlspecialchars($type["id"]) ?>)
                                            <div style=" font-size:12px; float:right; margin-top:-5px;" class="badge rounded-pill bg-light-secondary">Padrão</div>
                                            <div style=" font-size:12px; float:right; margin-top:-5px;margin-right:10px;" class="badge rounded-pill bg-light-info "><?= htmlspecialchars($type['estimativaHoras']) ?> Horas</div>
                                        </h6>

                                    </div>

                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                        <br />

                    </div>
                    <div class="col-md-6 col-sm-12">
                        <h2>Campos do processo <a class="btn btn-dark" style="font-size:10px !important; float:right; padding:8px !important;" href="<?= Config::BASE_URL ?>proccess-fields/<?= $args['proccessId'] ?>">Gerenciar</a></h2>
                        <br />

                        <?php foreach ($proccessFields as $field) { ?>
                            <?php foreach ($inputTypes as $type) { ?>
                                <?php if ($field["tipo_processo"] == $type["id"]) { ?>
                                    <div class="card mb-0 p-1 pb-0" style="margin-bottom:5px !important;">
                                        <h6 style=" margin-bottom:10px;">
                                            <i class="bi <?= htmlspecialchars($type["icone"]) ?> me-1"></i> <?= htmlspecialchars($field["nome"]) ?> (<?= htmlspecialchars($field["id"]) ?>)
                                            <div style=" font-size:12px; float:right; margin-top:-5px;" class="badge rounded-pill bg-light-secondary"><?= htmlspecialchars($type["nome"]) ?></div>
                                        </h6>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        <?php } ?>
                        <br />

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

            <?php
            require __DIR__ . "/../../" . Config::BASE_PATH_JS . str_replace(".view", ".js.php", basename(__FILE__, ".php"));
            ?>
</body>

</html>