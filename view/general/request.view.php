<?php

use API\Controller\Config;
use API\Controller\ipdark;
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
                <h3 style="font-weight:500; "><?= $request["numero"] . " - " . $request["titulo"] ?> </h3>

                <div class="row">
                    <div class="col-md-8 col-sm-12">
                        <br />

                        <?php include "view/request/nav-request.php"; ?>




                        <!-- Seções Correspondentes -->
                        <div id="andamento-section" class="section active-section">
                            <h2>Andamento</h2>
                            <!-- Conteúdo da aba Andamento -->
                            <?php include "view/request/comments.php"; ?>
                        </div>

                        <div id="timeline-section" class="section">
                            <h2>Timeline</h2>
                            <br />
                            <!-- Conteúdo da aba Timeline -->
                            <?php include "view/request/timelines.php"; ?>
                        </div>

                        <div id="campos-section" class="section">
                            <h2>Informações</h2>
                            <br />
                            <?php include "view/request/information.php"; ?>

                        </div>

                        <div id="definicoes-section" class="section">
                            <h2>Definições</h2>
                            <br />
                            <!-- Conteúdo da aba Definições -->
                            <?php include "view/request/definition.php"; ?>
                        </div>


                    </div>
                    <div class="col-md-4 col-sm-12">
                        <div class="card p-1">

                            <div class="card p-1" style="text-align:center;" id="bodyRequestDash">
                                <h6>
                                    <img src="<?= Config::BASE_URL . $request["usuario_processo_alunoTousuario"]["foto"] ?>" alt="Foto Usuário" style="width:120px; width:120px; border-radius:60px; ">
                                </h6>
                                <h5>
                                    <?= $request["usuario_processo_alunoTousuario"]["nome"] . " " . $request["usuario_processo_alunoTousuario"]["sobrenome"] ?>
                                </h5>
                                <h6>
                                    <?= $request["usuario_processo_alunoTousuario"]["email"] ?>
                                </h6>
                                <h6>
                                    <span style="font-size:11px;" class="badge rounded-pill bg-light-secondary">Aluno</span>
                                </h6>
                            </div>
                            <?php if ($request["usuario_processo_professor_avaliadorTousuario"] != null) { ?>
                                <div class="card p-1" style="text-align:center;" id="bodyRequestDash">
                                    <div class="row">
                                        <div class="col-5">
                                            <h6>
                                                <img src="<?= Config::BASE_URL ?><?= $request["usuario_processo_professor_avaliadorTousuario"]["foto"] != "" ? $request["usuario_processo_professor_avaliadorTousuario"]["foto"] : "src/img/avatars/art-1.webp" ?>" alt="Foto Usuário" style="width:80px; width:80px; border-radius:60px; ">
                                            </h6>
                                        </div>
                                        <div class="col-7" style="text-align:left;">
                                            <h5>
                                                <?= $request["usuario_processo_professor_avaliadorTousuario"]["nome"] . " " . $request["usuario_processo_professor_avaliadorTousuario"]["sobrenome"] ?>
                                            </h5>
                                            <h6>
                                                <?= $request["usuario_processo_professor_avaliadorTousuario"]["email"] ?>
                                            </h6>
                                            <h6>
                                                <span style="font-size:11px;" class="badge rounded-pill bg-light-secondary">Professor</span>
                                            </h6>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <h5>Descrição</h5>
                            <div class="card p-1" id="bodyRequestDash">
                                <p><?= $request["descricao"] ?></p>
                            </div>
                            <h5>Processo</h5>
                            <div class="card p-1 pb-0" id="bodyRequestDash">
                                <p>
                                    <span style="font-size:11px;" class="badge rounded-pill bg-light-primary">Tipo: <?= $request["tipo_solicitacao_processo_tipo_solicitacaoTotipo_solicitacao"]["nome"] ?></span> <br />
                                    <span style="font-size:11px;" class="badge rounded-pill bg-light-info">Tempo Resposta:<?= $request["tipo_solicitacao_processo_tipo_solicitacaoTotipo_solicitacao"]["hrs_resposta"] ?> (Hrs.)</span><br />
                                    <span style="font-size:11px;" class="badge rounded-pill bg-light-danger">Tempo Resolução:<?= $request["tipo_solicitacao_processo_tipo_solicitacaoTotipo_solicitacao"]["hrs_resolucao"] ?> (Hrs.)</span><br />

                                    <?php foreach ($allStageTypes as $stage) { ?>
                                        <?php foreach ($proccessStages as $processStage) { ?>
                                            <?php if ($processStage["tipo"] == $stage["id"]) { ?>
                                                <?php if ($request["etapa_atual"] == $processStage['id']) { ?>
                                                    <span class="badge rounded-pill bg-light-danger" style="font-size:11px;background-color: <?= $stage["cor"] ?>30 !important; color:<?= $stage["cor"] ?> !important;">Etapa Atual: <?= $stage["nome"] ?></span>
                                                <?php } ?>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>



                                </p>
                            </div>
                            <h6>Aberto em</h6>
                            <p><?php
                                $timestamp = strtotime($request["data_abertura"]);
                                if ($timestamp !== false) {
                                    echo date("d/m/y \à\s H:i", $timestamp);
                                } else {
                                    echo "Data inválida";
                                }
                                ?></p>

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


            <?php
            require __DIR__ . "/../../" . Config::BASE_PATH_JS . str_replace(".view", ".js.php", basename(__FILE__, ".php"));
            ?>
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