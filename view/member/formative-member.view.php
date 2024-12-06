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
    <title>Horas Formativas</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="layout/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/vendors/css/editors/quill/katex.min.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/vendors/css/editors/quill/monokai-sublime.min.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/vendors/css/editors/quill/quill.snow.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/vendors/css/editors/quill/quill.bubble.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Inconsolata&amp;family=Roboto+Slab&amp;family=Slabo+27px&amp;family=Sofia&amp;family=Ubuntu+Mono&amp;display=swap">
    <!-- END: Vendor CSS-->

    <?php include "view/src/head.php"; ?>
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="layout/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/css/plugins/forms/form-quill-editor.css">

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">

    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="layout/assets/css/style.css">
    <!-- END: Custom CSS-->
    <style>
        /* Estilização opcional para centralizar o gráfico */
        
        .chart-container {
            width: 80%;
            /* max-width: 600px; */
        }
    </style>
</head>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static   menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!--BEGIN: Navbar -->
    <?php include "view/src/header.php"; ?>
    <!--END: Navbar -->

    <!--BEGIN: Sidebar -->
    <?php include "view/src/mainMenu.php"; ?>

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header ps-0">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="breadcrumbs-top ps-0">
                        <ol class="breadcrumb ps-0">
                            <li class="breadcrumb-item"><a href="<?= Config::BASE_URL . 'dashboard' ?>">Dashboard</a></li>
                            <li class="breadcrumb-item active">Horas Formativas</li>
                        </ol>
                    </div>
                </div>

            </div>
            <div class="content-body">
                <h1>Horas Formativas <a href="new-formative-member">
                        <span class="btn btn-dark" style="padding:7px;float:right; font-size:11px;"><i class="bi bi-plus"></i> Cadastrar</span>
                    </a></h1>
                <h6>Administrar Atividades Formativas</h6>
                <br />
                <div class="row">
                    <div class="col-md-5 col-sm-12">
                        <h2>Meus registros</h2>
                        <br />
                        <div class="card p-1">
                            <?php if ((!isset($hours["error"])) && (!empty($hours))) { ?>
                                <?php foreach ($hours as $hour) { ?>
                                    <div class="card p-1" id="bodyRequestDash">
                                        <h4><?= $types[$hour["tipo"]]["nome"] ?></h4>
                                        <p><?php
                                            $timestamp = strtotime($hour["data_evento"]);
                                            if ($timestamp !== false) {
                                                echo date("d/m/y", $timestamp);
                                            } else {
                                                echo "Data inválida";
                                            }
                                            ?> - <?= $hour["descricao"] ?></p>
                                        <div class="card-icons">
                                            <h6 style="font-size:11px;">


                                                <span class="badge rounded-pill bg-light-<?php if ($hour["status_aprovacao"] == 1) {
                                                                                                echo "warning";
                                                                                            } elseif ($hour["status_aprovacao"] == 2) {
                                                                                                echo "success";
                                                                                            } else {
                                                                                                echo "danger";
                                                                                            } ?>"><?php if ($hour["status_aprovacao"] == 1) {
                                                                                                        echo "Pendente";
                                                                                                    } elseif ($hour["status_aprovacao"] == 2) {
                                                                                                        echo "Aprovado";
                                                                                                    } else {
                                                                                                        echo "Recusado";
                                                                                                    } ?></span>
                                                <span class="badge rounded-pill bg-light-primary"><?php if ($hour["status_aprovacao"] == 1) {
                                                                                                        echo $hour["horas_solicitadas"] . " Horas Solicitadas";
                                                                                                    } elseif ($hour["status_aprovacao"] == 2) {
                                                                                                        echo $hour["horas_concedidas"] . " de " . $hour["horas_solicitadas"] . " Horas Solicitadas";
                                                                                                    } else {
                                                                                                        echo "0 hr. concedidas";
                                                                                                    } ?></span>
                                                <a href="<?= $hour["comprovante"] ?>" target="_blank">
                                                    <span class="btn btn-dark" style="padding:7px;float:right; font-size:11px;"><i class="bi bi-paperclip"></i> Comprovante</span>
                                                </a>
                                                <a href="#">
                                                    <span class="badge rounded-pill bg-light-danger me-1" style="padding:7px;float:right; font-size:11px;"><i class="bi bi-trash"></i></span>
                                                </a>
                                                <a>
                                                    <span data-bs-toggle="tooltip" data-bs-placement="bottom" data-bs-original-title="Data de envio: <?php
                                                                                                                                                        $timestamp = strtotime($hour["data_envio"]);
                                                                                                                                                        if ($timestamp !== false) {
                                                                                                                                                            echo date("d/m/y \à\s H:i", $timestamp);
                                                                                                                                                        } else {
                                                                                                                                                            echo "Data inválida";
                                                                                                                                                        }
                                                                                                                                                        ?> " class="badge rounded-pill bg-light-info" style="padding:7px;float:right; font-size:11px; margin-right:5px;"><i class="bi bi-info"></i></span>
                                                </a>
                                                <!-- <span class="btn btn-dark" style="padding:7px;float:right; font-size:11px;"><i class="bi bi-eye"></i> Ver Detalhes</span> -->
                                            </h6>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } else { ?>
                                    <h6>Você ainda não registrou suas horas 😥</h6>
                            <?php } ?>
                            
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-12">

                        <h2>Meus Progresso</h2>
                        <br />
                        <div class="card p-1">
                            <h3>60 horas</h3>
                            <p><?= __("formative_member.total-hours") ?></p>
                        </div>
                        <div class="large-cards-container">
                            <h2>Percentual de Registros por Tipo</h2>
                            <br />
                            <div class="card p-1">

                                <div class="chart-container">
                                    <canvas id="pieChart"></canvas>
                                </div>
                            </div>

                           
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- END: Content-->

        <div class="sidenav-overlay"></div>
        <div class="drag-target"></div>

        <!-- BEGIN: Footer-->

        <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
        <!-- END: Footer-->
        <script>
            $(function() {
                var valorDaDiv = $(".editor").text();
                $("#body").val(valorDaDiv);
            });
        </script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>


        <script src="https://cdn.tiny.cloud/1/kax3g6nv8huzxh65lnkeyjb9qhudlkdh33rgg5zydz16c8pe/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

        <!-- BEGIN: Vendor JS-->
        <script src="layout/app-assets/vendors/js/vendors.min.js"></script>
        <!-- BEGIN Vendor JS-->

        <!-- BEGIN: Page Vendor JS-->
        <script src="layout/app-assets/vendors/js/editors/quill/katex.min.js"></script>
        <script src="layout/app-assets/vendors/js/editors/quill/highlight.min.js"></script>
        <script src="layout/app-assets/vendors/js/editors/quill/quill.min.js"></script>
        <!-- END: Page Vendor JS-->

        <!-- BEGIN: Theme JS-->
        <script src="layout/app-assets/js/core/app-menu.js"></script>
        <script src="layout/app-assets/js/core/app.js"></script>
        <!-- END: Theme JS-->

        <!-- BEGIN: Page JS-->
        <script src="layout/app-assets/js/scripts/forms/form-quill-editor.js"></script>
        <?php
        require __DIR__ . "/../../" . Config::BASE_PATH_JS . str_replace(".view", ".js.php", basename(__FILE__, ".php"));
        ?>



</body>
<!-- END: Body-->

</html>