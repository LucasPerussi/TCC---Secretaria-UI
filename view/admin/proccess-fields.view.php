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
    <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/css/pages/dashboard-ecommerce.css">
    <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/css/plugins/extensions/ext-component-toastr.css">
    <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>src/css/dashboard.css">
    <link rel="stylesheet" href="<?= Config::BASE_URL ?>src/css/main.css">
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
                            <li class="breadcrumb-item"><a href="<?=Config::BASE_URL?>proccess-type/<?=$args['proccessId']?>">Processo</a></li>
                            <li class="breadcrumb-item active">Campos do Processo</li>
                            </ol>
                        </div>
                    </div>
                    <h1 style="font-weight:500; ">Campos </h1>
                </div>

            </div>
            <!-- <div class="content-header row"> </div> -->
            <div class="content-body">
                <!-- Dashboard Ecommerce Starts -->


                <?php if (!isset($proccess["error"])) { ?>
                    <div class="row">
                        <div class="col-md-4 col-sm-12">
                            <div class="card">
                                <h2><?= $proccess["nome"] ?></h2>
                                <h6>Processo (ID <?= $args["proccessId"] ?>)</h6>
                                <br />
                                <h6><span style=" font-size:10px;" class="badge rounded-pill bg-light-primary"><?= $proccess["hrs_resposta"] ?? 0 ?> Hrs. Resposta</span>
                                    <span style=" font-size:10px;" class="badge rounded-pill bg-light-success"><?= $proccess["hrs_resolucao"] ?? 0 ?> Hrs. Resolução</span>
                                    <a href="<?= $proccess["fluxograma"] ?? "#" ?> "><span style=" font-size:10px;float:right;" class="badge rounded-pill bg-dark"><i class="bi bi-eye"></i> Ver Fluxograma</span></a>
                                </h6>
                            </div>

                        </div>
                        <div class="col-md-8 col-sm-12">
                            <h2>Campos Padrões <a class="btn btn-dark" style="font-size:10px !important; float:right;" data-bs-toggle="modal" data-bs-target="#cadastrarCampoModal">Novo Campo Personalizado</a></h2>
                            <h6>Estes são os tipos de processos operacionais no sistema</h6>
                            <br />
                            <div id="default-fields-container">
                                <!-- Os campos serão renderizados aqui -->
                            </div>
                        </div>


                    </div>

                <?php } else { ?>
                    <div class="card">
                        <h6>Tipo de processo não encontrado.</h6>
                    </div>
                <?php } ?>


            </div>

            <!-- Modal -->
            <div class="modal fade" id="cadastrarCampoModal" tabindex="-1" aria-labelledby="cadastrarCampoModalLabel" aria-hidden="true">
                <div class="modal-dialog p-0">
                    <div class="modal-content p-0" style="padding:0px !important;border-radius:10px !important;">
                        <!-- Cabeçalho do Modal -->
                        <div class="modal-header">
                            <h4 class="modal-title" id="cadastrarCampoModalLabel">Cadastrar Campo Personalizado</h4>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                        </div>
                        <!-- Corpo do Modal -->
                        <div class="modal-body ">
                            <h6 style="font-size:12px;">Cadastre um novo tipo de campo, feito para este processo</h6>
                            <br />
                            <form id="newField">
                                <div class="mb-1">
                                    <label class="form-label" for="nome">Nome <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-asterisk"></i></span>
                                        <input type="text" id="nome" class="form-control" name="nome" placeholder="telefone, email, data_nascimento, ..." required />
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="label">Label <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-eye"></i></span>
                                        <input type="text" id="label" class="form-control" name="label" placeholder="Telefone, Email, Data de Nascimento ..." required />
                                    </div>
                                </div>
                                <div class="mb-1">
                                    <label class="form-label" for="tipo_dado">Tipo de Dado <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-code"></i></span>
                                        <select class="form-select" name="tipo_dado" id="tipo_dado" required>
                                            <?php foreach ($inputTypes as $type) { ?>
                                                <option value="<?= htmlspecialchars($type['id']) ?>">
                                                    <?= htmlspecialchars($type['nome']) ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <!-- Botões do Modal -->
                                <div class="d-flex justify-content-end">
                                    <button type="button" class="btn btn-secondary me-2" data-bs-dismiss="modal">Cancelar</button>
                                    <button type="submit" class="btn btn-primary">Cadastrar</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>


            <!-- END: Content-->
            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js'></script>
            <script src='https://use.fontawesome.com/826a7e3dce.js'></script>
            <script src="src/js/swiper-bundle.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

            <div class="sidenav-overlay"></div>
            <div class="drag-target"></div>

            <!-- endbuild -->

            <!-- Vendors JS -->


            <!-- Main JS -->
            <script src="test/assets/js/main.js"></script>

            <!-- <script src="<?= Config::BASE_URL ?>layout/app-assets/js/scripts/my-department.js"></script> -->
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