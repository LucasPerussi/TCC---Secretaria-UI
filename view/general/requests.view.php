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
    <title>Entidades</title>

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
                    <h1 style="font-weight:500; ">Chamados</h1>
                </div>
                <div class="content-body">


                    <!-- END: Page CSS-->
                    <style>
                        /* Estilos básicos para a responsividade */
                        .table-container {
                            width: 100%;
                        }

                        table {
                            width: 100%;
                            border-collapse: collapse;
                            margin-top: 20px;
                        }

                        th,
                        td {
                            padding: 8px;
                            font-size: 12px !important;
                            text-align: left;
                            cursor: pointer;
                        }

                        th {
                            border: solid 1px #001011db !important;
                            background-color: #001011db !important;
                        }

                        .pagination {
                            display: flex;
                            justify-content: center;
                            margin-top: 20px;
                        }

                        .page-link {
                            cursor: pointer;
                            padding: 10px;
                            margin: 0 5px;
                            text-decoration: none;
                            color: #000;
                            border: 1px solid #ddd;
                            border-radius: 4px;
                        }

                        .no-results-message {
                            margin-top: 10px;
                        }

                        .modal .modal-content {
                            padding: 0px !important;
                            border-radius: 10px !important;
                        }

                        .page-link:hover {
                            background-color: #f2f2f2;
                        }
                    </style>


                    <div class="row">
                        <div class="col-12">
                            <div class="card" style="padding:20px !important;">
                                <div class="row">
                                    <div class="col-6">
                                        <h4 style="font-weight:bold !important;">Listagem de Chamados</h4>
                                        <span style="font-size:13px;">Aqui você encontra todos os usuários registrados.</span>
                                    </div>
                                    <div class="col-6">
                                        <div class="dropdown" style="position:absolute; right:30px;">
                                            <label for="itemsPerPage" style="font-size:10px;">Itens por Pág.:
                                                <select id="itemsPerPage" class="form-control select" style="width:80px;" onchange="changeItemsPerPage()">
                                                    <option value="50">50</option>
                                                    <option value="100">100</option>
                                                    <option value="500">500</option>
                                                </select></label>
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <div class="table-container" style="overflow:auto;">
                                    <div class="input-group mb-0">
                                        <span class="input-group-text" id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                                <circle cx="11" cy="11" r="8"></circle>
                                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                            </svg></span>
                                        <input type="text" id="searchInput" oninput="searchData()" class="form-control" placeholder="Pesquisar..." aria-label="Pesquisar..." aria-describedby="basic-addon-search1">
                                    </div>
                                    <br />
                                    <table id="data-table" style="margin-top:0px;">
                                        <thead id="table-header">
                                            <tr>
                                                <th id="photo-header" style="color:white !important;">Número</th>
                                                <th id="name-header" style="color:white !important;">Nome <i class="bi bi-arrow-down-up"></i></th>
                                                <th id="registro-header" style="color:white !important;">Tipo <i class="bi bi-arrow-down-up"></i></th>
                                                <th id="curso-header" style="color:white !important;">Abertura <i class="bi bi-arrow-down-up"></i></th>
                                                <th id="curso-header" style="color:white !important;">Aluno <i class="bi bi-arrow-down-up"></i></th>
                                                <th id="curso-header" style="color:white !important;">Professor <i class="bi bi-arrow-down-up"></i></th>
                                                <th id="curso-header" style="color:white !important;">Servidor <i class="bi bi-arrow-down-up"></i></th>
                                                <th style="color:white !important;">Ações</th>
                                            </tr>
                                        </thead>
                                        <tbody id="table-body" style="border-radius: 20px !important;"></tbody>
                                    </table>
                                    <div class="no-results-message" id="noResultsMessage"></div>
                                </div>
                            </div>
                            <div class="pagination" id="pagination"></div>
                        </div>
                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="logModal" tabindex="-1" aria-labelledby="logModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content p-0">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="modalTitle">Detalhes do Usuário</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                                </div>
                                <div class="modal-body" id="modalBody">
                                    <!-- Conteúdo será preenchido dinamicamente -->
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                </div>
                            </div>
                        </div>
                    </div>


                    <?php
                    require __DIR__ . "/../../" . Config::BASE_PATH_JS . str_replace(".view", ".js.php", basename(__FILE__, ".php"));
                    ?>
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
                //require __DIR__ . "/../../" . Config::BASE_PATH_JS . str_replace(".view", ".js.php", basename(__FILE__, ".php"));
                ?>
</body>

</html>