<?php

use API\Controller\Config;

?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">


<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">

    <title>Logs</title>
    <meta name='robots' content='noindex'>


    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css"href="<?= Config::BASE_URL ?>layout/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css"href="<?= Config::BASE_URL ?>layout/app-assets/vendors/css/editors/quill/katex.min.css">
    <link rel="stylesheet" type="text/css"href="<?= Config::BASE_URL ?>layout/app-assets/vendors/css/editors/quill/monokai-sublime.min.css">
    <link rel="stylesheet" type="text/css"href="<?= Config::BASE_URL ?>layout/app-assets/vendors/css/editors/quill/quill.snow.css">
    <link rel="stylesheet" type="text/css"href="<?= Config::BASE_URL ?>layout/app-assets/vendors/css/editors/quill/quill.bubble.css">
    <link rel="stylesheet" type="text/css"href="<?= Config::BASE_URL ?>layout/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css"href="<?= Config::BASE_URL ?>layout/app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Inconsolata&amp;family=Roboto+Slab&amp;family=Slabo+27px&amp;family=Sofia&amp;family=Ubuntu+Mono&amp;display=swap">
    <!-- END: Vendor CSS-->

    <?php include "view/src/head.php"; ?>
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css"href="<?= Config::BASE_URL ?>layout/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css"href="<?= Config::BASE_URL ?>layout/app-assets/css/plugins/forms/form-quill-editor.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">

    <!-- END: Page CSS-->

    <style>
        /* Estilos básicos para a responsividade */
        /* body {
            font-family: Arial, sans-serif;
            margin: 20px;
        } */

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
            /* border: 1px solid #ddd; */
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
    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css"href="<?= Config::BASE_URL ?>layout/assets/css/style.css">
    <!-- END: Custom CSS-->

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
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Logs recentes </h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= Config::BASE_URL . 'dashboard' ?>">dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">Logs 
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row">
                <div class="col-md-3 col-xs-12 col-lg-3 col-sm-12">
                    <div class="card" style="padding:20px !important;margin-bottom:20px;">
                        <div class="row">
                            <h5 style="font-weight:bold !important;">Filtros </h5>
                            <span style="font-size:11px;">Some Filtros para especializar sua pesquisa. </span>

                        </div>
                        <br />
                        <div class="row">
                            <label for="" style="font-size:13px;">Função:
                                <select id="functionFilter" class="select2 form-select" style="width:100%;" onchange="displayData()">
                                    <option value="">Todas</option>
                                </select>
                            </label>
                        </div>
                        <br />
                        <div class="row">
                            <label for="" style="font-size:13px;">Usuário:
                                <select id="userEmailFilter" class="select2 form-select" style="width:100%;" onchange="displayData()">
                                    <option value="">Todas</option>
                                </select>
                            </label>

                        </div>
                        <br />
                        <div class="row">
                            <label for="" style="font-size:13px;">Status:
                                <select id="statusFilter" class="select2 form-select" style="width:100%;" onchange="displayData()">
                                    <option value="">Todas</option>
                                </select>
                            </label>

                        </div>
                    </div>
                </div>
                <div class="col-md-9 col-xs-12 col-lg-9 col-sm-12">
                    <div class="card" style="padding:20px !important;">
                        <div class="row">
                            <div class="col-6">
                                <h4 style="font-weight:bold !important;">Listagem de Logs</h4>
                                <span style="font-size:13px;">Aqui você encontra todos os equipamentos no inventário da sua empresa. </span>
                                <!-- <h4>Últimas Atividades <span class="btn btn-outline-info" style="padding:8px;color: #00cfe8 !important; text-align:end;right:20px;position:absolute;font-size:15px !important; margin-top:-10px;">Ver tudo</span></h4> -->
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

                        <br />
                        <div class="table-container" style="overflow:auto;">
                            <div class="input-group mb-0">
                                <span class="input-group-text" id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg></span>
                                <input type="text" id="searchInput" oninput="searchData()" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon-search1">
                            </div>
                            <table id="data-table" style="margin-top:0px;">
                                <thead id="table-header">
                                    <tr>
                                        <th id="id-header" style="color:white !important;">ID <i class="bi bi-arrow-down-up"></i></th>
                                        <!-- <th id="title-header" style="color:white !important;">Title <i class="bi bi-arrow-down-up"></i></th> -->
                                        <th id="function-header" style="color:white !important;">Function <i class="bi bi-arrow-down-up"></i></th>
                                        <th id="user-header" style="color:white !important;">User <i class="bi bi-arrow-down-up"></i></th>
                                        <th id="date-header" style="color:white !important;">Date <i class="bi bi-arrow-down-up"></i></th>
                                        <th id="status-header" style="color:white !important;">Status <i class="bi bi-arrow-down-up"></i></th>
                                        <th style="color:white !important;">Ações</th>
                                    </tr>
                                </thead>


                                <br />
                                <tbody id="table-body" style="border-radius: 20px !important;"></tbody>
                            </table>
                            <div class="no-results-message" id="noResultsMessage"></div>
                        </div>

                    </div>
                    <div class="pagination" id="pagination"></div>

                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="logModal" tabindex="-1" aria-labelledby="logModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content p-0">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="modalTitle">Detalhes do Log</h1>
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
    <!-- </div>
    </div>
    </div> -->
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.tiny.cloud/1/kax3g6nv8huzxh65lnkeyjb9qhudlkdh33rgg5zydz16c8pe/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <?php
    require __DIR__ . "/../../" . Config::BASE_PATH_JS . str_replace(".view", ".js.php", basename(__FILE__, ".php"));
    ?>

    <script src="<?= Config::BASE_URL ?>layout/app-assets/vendors/js/vendors.min.js"></script>


    <script src="<?= Config::BASE_URL ?>layout/app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="<?= Config::BASE_URL ?>layout/app-assets/js/core/app-menu.js"></script>
    <script src="<?= Config::BASE_URL ?>layout/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->



</body>
<!-- END: Body-->

</html>