<?php

use API\Controller\Config;

include "view/src/head.php"; ?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">

    <meta name="author" content="Vroom">
    <meta name='robots' content='noindex'>
    <title>Gerenciar Estágios</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="layout/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/vendors/css/editors/quill/katex.min.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/vendors/css/editors/quill/quill.snow.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/vendors/css/editors/quill/quill.bubble.css">
    <link rel="stylesheet" type="text/css" href="layout/assets/css/style.css">
    <!-- END: Vendor CSS-->
</head>

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Navbar -->
    <?php include "view/src/header.php"; ?>
    <!-- END: Navbar -->

    <!-- BEGIN: Sidebar -->
    <?php include "view/src/mainMenu.php"; ?>
    <!-- END: Sidebar -->

    <!-- BEGIN: Content -->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header ps-0">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="breadcrumbs-top ps-0">
                        <ol class="breadcrumb ps-0">
                            <li class="breadcrumb-item"><a href="<?= Config::BASE_URL . 'dashboard' ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Histórico de Estágios</li>
                        </ol>
                    </div>
                </div>
            </div>

            <div class="content-body">
                <h1>Seu Estágio 
                    <a href="new-internship-member">
                        <span class="btn btn-dark" style="padding:7px;float:right; font-size:11px;">
                            <i class="bi bi-plus"></i> Cadastrar Estágio
                        </span>
                    </a>
                </h1>
                <div class="row">
    <div class="col-md-12 col-sm-12">
        <?php if (!isset($latest_internship["error"]) && !empty($latest_internship)) { ?>
            <h2>Meu Estágio Atual</h2>
            <br />
            <div class="card p-2" style="border: 2px solid #007bff;">
                <h4 style="color: #007bff;"><?= $latest_internship["empresa"] ?> - <?= $latest_internship["area_atuacao"] ?></h4>
                <p style="font-size:12px;">
                    <?php
                    $data_inicio = strtotime($latest_internship["data_inicio"]);
                    $data_renovacao = strtotime($latest_internship["data_renovacao"]);
                    echo date("d/m/Y", $data_inicio) . " - " . date("d/m/Y", $data_renovacao);
                    ?>
                </p>
                <div class="card-icons">
                    <span class="badge rounded-pill bg-light-warning">Ativo</span>
                    <span class="badge rounded-pill bg-light-primary">Código: <?= $latest_internship["codigo_estagio"] ?></span>
                    <a href="#">
                        <span class="btn btn-dark" style="padding:7px;float:right; font-size:11px;">
                            <i class="bi bi-pencil"></i> Editar
                        </span>
                    </a>
                </div>
            </div>
            <br />
        <?php } ?>
    </div>
    <div class="col-md-12 col-sm-12">
        <h2>Histórico de Estágios</h2>
        <br />
        <div class="card p-1">
            <?php if (!isset($internships["error"]) && !empty($internships)) { ?>
                <?php foreach ($internships as $internship) { ?>
                    <div class="card p-1 mb-2">
                        <h4><?= $internship["empresa"] ?> - <?= $internship["area_atuacao"] ?></h4>
                        <p style="font-size:11px;">
                            <?php
                            $data_inicio = strtotime($internship["data_inicio"]);
                            $data_renovacao = strtotime($internship["data_renovacao"]);
                            echo date("d/m/Y", $data_inicio) . " - " . date("d/m/Y", $data_renovacao);
                            ?>
                        </p>
                        <div class="card-icons">
                            <?php if ($internship["status"] == 1) { ?>
                                <span class="badge rounded-pill bg-light-warning">Ativo</span>
                            <?php } elseif ($internship["status"] == 2) { ?>
                                <span class="badge rounded-pill bg-light-success">Concluído</span>
                            <?php } ?>
                            <span class="badge rounded-pill bg-light-primary"><?= $internship["codigo_estagio"] ?></span>
                            <a href="#">
                                <span class="badge rounded-pill bg-light-danger" style="padding:7px;float:right; font-size:11px;">
                                    <i class="bi bi-trash"></i> Cancelar
                                </span>
                            </a>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <h6>Você ainda não tem estágios registrados 😥</h6>
            <?php } ?>
        </div>
    </div>
</div>
    
            </div>
        </div>
    </div>

        </div>
    </div>
    <!-- END: Content -->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer -->
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer -->

    <!-- BEGIN: Vendor JS-->
    <script src="layout/app-assets/vendors/js/vendors.min.js"></script>
    <script src="layout/app-assets/js/core/app-menu.js"></script>
    <script src="layout/app-assets/js/core/app.js"></script>
    <!-- END: Vendor JS-->

    <?php
            require __DIR__ . "/../../" . Config::BASE_PATH_JS . str_replace(".view", ".js.php", basename(__FILE__, ".php"));
    ?>
</body>

</html>
