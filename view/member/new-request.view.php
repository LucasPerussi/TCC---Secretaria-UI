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
                <?php if (!isset($_GET['tipo_de_chamado'])) { ?>
                    <!-- Dashboard Ecommerce Starts -->
                    <h1 style="font-weight:500; ">Abrir Chamado </h1>
                    <div class="row">
                        <div class="col-md-7 col-sm-12">
                            <div class="card p-1">
                                <form method="GET">
                                    <?php if (!isset($types["error"])) { ?>
                                        <div class="mb-1 row">
                                            <div class="col-sm-12">
                                                <h6>Selecione o tipo de chamado:</h6>
                                            </div>

                                            <div class="col-sm-12">
                                                <div class="input-group input-group-merge select">
                                                    <select class="form-select form-select-lg" name="tipo_de_chamado" id="selectLarge">
                                                        <?php foreach ($types as $type) { ?>
                                                            <option value="<?= htmlspecialchars($type['id']) ?>"><?= htmlspecialchars($type['nome']) ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary" style="float:right;">Iniciar</button>
                                            </div>
                                        </div>
                                    <?php } else { ?>
                                        <div class="card p-1">
                                            <h6>Tivemos um problema interno. Tente sair e entrar novamente em sua conta </h6>
                                        </div>
                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-12">
                            <h1 style="font-size:200px;text-align:center; color:#7367f0 !important;"><i class="bi bi-person-raised-hand"></i></h1>
                        </div>
                    </div>
                <?php } else { ?>
                    <div class="content-header row">
                        <div class="content-header-left col-md-9 col-12 mb-2">
                            <div class="row breadcrumbs-top">


                                <div class="breadcrumb-wrapper">
                                    <ol class="breadcrumb ps-0">
                                        <li class="breadcrumb-item"><a href="<?= Config::BASE_URL . 'new-request' ?>">Tipo de chamado</a></li>
                                        <li class="breadcrumb-item active">Nova Solicitação</li>
                                    </ol>
                                </div>
                            </div>
                            <h1 style="font-weight:500; "><?= $process["nome"] ?></h1>


                            <div class="card p-1">
                                <form id="newRequest">
                                    <div class="mb-1 row">
                                        <h5>Título</h5>
                                        <div class="col-sm-12">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bi bi-file-richtext"></i></span>
                                                <input type="text" id="name-icon" class="form-control" name="titulo" required placeholder="Título do Chamado" />
                                                <input type="text" id="name-icon" hidden class="form-control" value="<?=$_GET["tipo_de_chamado"]?>" name="processo" required  />

                                            </div>
                                        </div>

                                    </div>
                                    <div class="mb-1 row">
                                        <h5>Descrição</h5>
                                        <div class="col-sm-12">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                                                <textarea name="descricao" class="form-control" required placeholder="Descrição do chamado"></textarea>

                                            </div>
                                        </div>
                                    </div>
                                    <br />
                                    <h4>Infomações adicionais necessárias</h4>
                                    <br/>

                                    <?php foreach ($proccessFields as $field) { ?>
                                        <?php foreach ($fieldtypesDb as $dbTypes) { ?>
                                            <?php if ($field["tipo"] == $dbTypes["id"]) { ?>
                                                <?php foreach ($inputTypes as $type) { ?>
                                                    <?php if ($dbTypes["tipo_dado"] == $type["id"]) { ?>
                                                        <div class="card mb-0 p-1 pb-0" id="bodyRequestDash" style="margin-bottom:10px !important;">
                                                            <div class="mb-1 row">
                                                                <h5><?= htmlspecialchars($field["nome_exibicao"]) ?></h5>
                                                                <div class="col-sm-12">
                                                                    <div class="input-group input-group-merge">
                                                                        <span class="input-group-text"><i class="bi <?= htmlspecialchars($type["icone"]) ?>"></i></span>
                                                                        <?php if ($type["htmlType"] != "textarea") { ?>
                                                                            <input type="<?= htmlspecialchars($type["htmlType"]) ?>" required id="name-icon" class="form-control" name="<?= htmlspecialchars($field["id"]) ?>" placeholder="<?= htmlspecialchars($type["placeholder"]) ?>" />
                                                                        <?php } else { ?>
                                                                            <textarea name="<?= htmlspecialchars($field["id"]) ?>" required class="form-control" placeholder="<?= htmlspecialchars($type["placeholder"]) ?>"></textarea>
                                                                        <?php } ?>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                <?php } ?>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary" style="float:right;">Registrar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-12">
                        <h1 style="font-size:200px;text-align:center; color:#7367f0 !important;"><i class="bi bi-person-raised-hand"></i></h1>

                        </div>

                    </div>


                <?php }; ?>


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