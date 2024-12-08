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
    <title>Lista de Processos</title>

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
                                <li class="breadcrumb-item"><a href="<?= Config::BASE_URL . 'dashboard' ?>">Dashboard</a></li>
                                <li class="breadcrumb-item active">Gerenciamento de Cursos</li>
                            </ol>
                        </div>
                    </div>
                    <h1 style="font-weight:500; ">Cursos</h1>
                </div>

            </div>
            <!-- <div class="content-header row"> </div> -->
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->


                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <h2>Cadastrar</h2>
                        <h6>Cadastre um novo tipo de curso</h6>
                        <br />
                        <div class="card" style="padding:10px;">
                            <form id="newCourse">
                                <div class="mb-1 row">
                                    <div class="col-sm-12">
                                        <label class="col-form-label" for="nome">Nome</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bi bi-pencil"></i></span>
                                            <input type="text" id="nome" class="form-control" name="nome" placeholder="Nome do curso" />
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-1 row">
                                    <div class="col-sm-12">
                                        <label class="col-form-label" for="descricao">Descrição</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bi bi-textarea"></i></span>
                                            <textarea id="descricao" class="form-control" name="descricao" placeholder="Descrição detalhada"></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-1 row">
                                    <div class="col-sm-12">
                                        <label class="col-form-label" for="coordenador">Coordenador</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bi bi-person"></i></span>
                                            <select required name="coordenador" class="form-control select2">
                                                <option value="" disabled selected><?= __("request_request.settings-teacher.select") ?></option>
                                                <?php foreach ($teachers as $teacher) { ?>
                                                    <option <?php if ($request["professor_avaliador"] == $teacher["id"]) {
                                                                echo "selected";
                                                            } ?> value="<?= $teacher["id"] ?>"><?= $teacher["nome"] ?> <?= $teacher["sobrenome"] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>



                                    </div>
                                </div>

                                <div class="mb-1 row">
                                    <div class="col-sm-12">
                                        <label class="col-form-label" for="horas_formativas">Horas Formativas</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bi bi-clock"></i></span>
                                            <input type="number" id="horas_formativas" class="form-control" name="horas_formativas" placeholder="Horas formativas" />
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-1 row">
                                    <div class="col-sm-12">
                                        <label class="col-form-label" for="semestres">Semestres</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                            <input type="number" id="semestres" class="form-control" name="semestres" placeholder="Quantidade de semestres" />
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
                            <?php foreach ($courses as $course) { ?>
                                <div class="card mb-0 pb-1" id="bodyRequestDash" style="margin-bottom:5px !important;">
                                    <h5 style="font-weight:bold !important; "><?= $course["nome"] ?>
                                    </h5>
                                    <h6><?= $course["descricao"] ?></h6>
                                    <br />
                                    <h6>
                                        <span style=" font-size:10px !important;" class="badge rounded-pill bg-light-primary"><?= $course["horas_formativas"] ?? 0 ?> Hrs. Formativas</span>
                                        <span style=" font-size:10px !important;" class="badge rounded-pill bg-light-success"><?= $course["semestres"] ?? 0 ?> Semestres</span>
                                        <span style=" font-size:10px !important;" class="badge rounded-pill bg-light-info"> Coordenador:
                                            <?php foreach ($teachers as $teacher) { ?>
                                                <?php if ($course["coordenador"] == $teacher["id"]) { ?>
                                                    <?= $teacher["nome"] ?> <?= $teacher["sobrenome"] ?> (<?= $teacher["id"] ?>)
                                                <?php } ?>
                                            <?php } ?>
                                        </span>
                                        <a href="<?= $course["fluxograma"] ?>"><span style=" font-size:10px !important;float:right;margin-right:5px;padding:6px;color: #7367f0 !important;" class="btn btn-outline-primary"> <i class="bi bi-people"></i> Alunos</span></a>
                                    </h6>



                                </div>
                            <?php } ?>

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

            <?php
            require __DIR__ . "/../../" . Config::BASE_PATH_JS . str_replace(".view", ".js.php", basename(__FILE__, ".php"));
            ?>
</body>

</html>