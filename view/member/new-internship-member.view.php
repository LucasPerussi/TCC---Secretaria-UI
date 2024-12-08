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
    <title>Novo Estágio</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="layout/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <!-- END: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="layout/assets/css/style.css">
</head>

<body class="vertical-layout vertical-menu-modern navbar-floating footer-static menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!--BEGIN: Navbar -->
    <?php include "view/src/header.php"; ?>
    <!--END: Navbar -->

    <!--BEGIN: Sidebar -->
    <?php include "view/src/mainMenu.php"; ?>

    <!-- BEGIN: Content-->
    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Cadastrar Estágio</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= Config::BASE_URL . 'internship-list' ?>">Meus Estágios</a></li>
                                    <li class="breadcrumb-item active">Novo Estágio</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="content-body">
                <div class="row">
                    <div class="col-md-7 col-sm-12">
                        <div class="card p-1">
                            <form id="registerInternship">
                                <div class="row">
                                    <div class="mb-1 row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="professor_orientador">Professor Orientador</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="input-group input-group-merge">
                                                <select class="form-select" name="professor_orientador" id="professor_orientador">
                                                    <option value="25">Professor A</option>
                                                    <option value="26">Professor B</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="empresa">Empresa</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="input-group input-group-merge">
                                                <select class="form-select" name="empresa" id="empresa">
                                                    <option value="1">Empresa X</option>
                                                    <option value="4">Empresa Y</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="area_atuacao">Área de Atuação</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bi bi-briefcase"></i></span>
                                                <input type="text" class="form-control" name="area_atuacao" placeholder="Ex: Desenvolvimento de Software" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="data_inicio">Data de Início</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                                <input type="date" class="form-control" name="data_inicio" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-1 row">
                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="duracaoMeses">Duração (em meses)</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bi bi-clock"></i></span>
                                                <input type="number" class="form-control" name="duracaoMeses" placeholder="6" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary" style="float:right;">Cadastrar Estágio</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-4 col-sm-12">
                        <h1 style="font-size:250px; text-align:center;">🏢</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
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

</html>