<?php

use API\Controller\Config;
use API\Controller\ipinfo;
use const Siler\Config\CONFIG; ?>



<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">


<head>

    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
    <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/css/pages/dashboard-ecommerce.css">
    <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/css/plugins/extensions/ext-component-toastr.css">
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
    <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/assets/css/style.css">
    <?php include "view/src/head.php"; ?>
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
                                <li class="breadcrumb-item"><a href="<?= Config::BASE_URL . 'dashboard' ?>">Dashboard</a></li>
                                <li class="breadcrumb-item active">Tipos de etapas</li>
                            </ol>
                        </div>
                    </div>
                    <h1 style="font-weight:500; ">Etapas Padrões</h1>
                </div>

            </div>
            <!-- <div class="content-header row"> </div> -->
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->


                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <h2>Cadastrar</h2>
                        <h6>Cadastre um novo tipo de processo</h6>
                        <br />
                        <div class="card" style="padding:10px; ">
                            <form id="newStage">
                                <div class="mb-1 row">
                                    <div class="col-sm-12">
                                        <label class="col-form-label" required for="email-icon">Nome</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bi bi-asterisk"></i></span>
                                            <input type="text" id="name-icon" class="form-control" name="nome" placeholder="telefone, email, data_nascimento, ..." />
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-1 row">
                                    <div class="col-sm-12">
                                        <label class="col-form-label" required for="email-icon">Label</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bi bi-eye"></i></span>
                                            <input type="text" id="name-icon" class="form-control" name="label" placeholder="Telefone, Email, Data de Nascimento ..." />
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-1 row">
                                    <div class="col-sm-12">
                                        <label class="col-form-label" required for="email-icon">Estimativa de horas para estágio</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bi bi-clock"></i></span>
                                            <input type="number" id="name-icon" class="form-control" name="estimativaHoras" placeholder="1,2,3,.." />
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-1 row">
                                    <div class="col-sm-12">
                                        <label class="col-form-label" required for="email-icon">Cor indicativa</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bi bi-droplet"></i></span>
                                            <input type="color" id="name-icon" class="form-control " style="height:39px;" name="cor" />
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary" style="float:right;">Cadastrar</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <h2>Lista </h2>
                        <h6>Estes são os tipos de processos operacionais no sistema</h6>
                        <br />
                        <div class="card p-1">
                            <?php foreach ($stageTypes as $type) { ?>
                                <div class="card mb-0 pb-0" id="bodyRequestDash" style="margin-bottom:5px !important;">
                                    <h6 style="font-weight:bold !important; margin-bottom:10px;">
                                        <div style="height:15px; width:15px; margin-right:15px; border-radius:15px;float:left; background-color:<?= htmlspecialchars($type['cor']) ?> !important;"></div>
                                        <?= htmlspecialchars($type['nome']) ?>
                                        <div style=" font-size:12px; float:right; margin-top:-5px;" class="badge rounded-pill bg-light-secondary">Padrão</div>
                                        <div style=" font-size:12px; float:right; margin-top:-5px;margin-right:10px;" class="badge rounded-pill bg-light-info "><?= htmlspecialchars($type['estimativaHoras']) ?> Horas</div>
                                    </h6>

                                </div>

                            <?php } ?>
                            <?php if (!isset($defaultStages["error"])) { ?>
                                <?php foreach ($defaultStages as $stage) { ?>

                                    <div class="card mb-0 pb-0" id="bodyRequestDash" style="margin-bottom:5px !important;">
                                        <h6 style="font-weight:bold !important; margin-bottom:10px;">
                                            <div style="height:15px; width:15px; margin-right:15px; border-radius:15px;float:left; background-color:<?= htmlspecialchars($stage['cor']) ?> !important;"></div>
                                            <?= htmlspecialchars($stage["label"]) ?> (<?= htmlspecialchars($stage["id"]) ?>)
                                            <div style=" font-size:12px; float:right; margin-top:-5px;" class="badge rounded-pill bg-light-secondary">Padrão</div>
                                            <div style=" font-size:12px; float:right; margin-top:-5px;margin-right:10px;" class="badge rounded-pill bg-light-info "><?= htmlspecialchars($stage['estimativaHoras']) ?> Horas</div>
                                            <div style=" font-size:12px; float:right; margin-top:-5px;margin-right:10px;" class="badge rounded-pill bg-light-primary "><i class="bi bi-person-raised-hand"></i></div>
                                        </h6>

                                    </div>
                                    
                                <?php } ?>
                            <?php } else { ?>
                                <h6>Nada a listar</h6>
                            <?php } ?>
                        </div>

                    </div>
                </div>

            </div>




            <div class="sidenav-overlay"></div>
            <div class="drag-target"></div>

            <!-- endbuild -->

            <!-- Vendors JS -->
            <!-- BEGIN: Vendor JS-->
            <script src="<?= Config::BASE_URL ?>layout/app-assets/vendors/js/vendors.min.js"></script>
            <!-- BEGIN Vendor JS-->

            <!-- BEGIN: Page Vendor JS-->
            <script src="<?= Config::BASE_URL ?>layout/app-assets/vendors/js/editors/quill/katex.min.js"></script>
            <script src="<?= Config::BASE_URL ?>layout/app-assets/vendors/js/editors/quill/highlight.min.js"></script>
            <script src="<?= Config::BASE_URL ?>layout/app-assets/vendors/js/editors/quill/quill.min.js"></script>
            <!-- END: Page Vendor JS-->

            <!-- BEGIN: Theme JS-->
            <script src="<?= Config::BASE_URL ?>layout/app-assets/js/core/app-menu.js"></script>
            <script src="<?= Config::BASE_URL ?>layout/app-assets/js/core/app.js"></script>
            <!-- END: Theme JS-->

            <!-- BEGIN: Page JS-->
            <script src="<?= Config::BASE_URL ?>layout/app-assets/js/scripts/forms/form-quill-editor.js"></script>
            <?php
            require __DIR__ . "/../../" . Config::BASE_PATH_JS . str_replace(".view", ".js.php", basename(__FILE__, ".php"));
            ?>



</body>

</html>