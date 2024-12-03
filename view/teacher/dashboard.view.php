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
    <title>Portal Professor</title>

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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Inclua as bibliotecas necessárias no seu HTML -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Opcional: Toasts do SweetAlert2 -->
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
    </script>


    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="layout/assets/css/style.css">
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

            <div class="content-body">
                <h1 style="font-weight:500; ">Portal Professor </h1>
                <br />


                <div class="row">
                    <div class="col-md-4 col-sm-12">
                        <div class="card options" style="padding:20px; ">
                            <h3 style="font-weight: 700 !important;">
                                Links úteis
                            </h3>
                            <p class=" mb-0" style="color:gray;">
                                Acesse recursos importantes de forma rápida</p>
                            <br />
                            <a href="<?= Config::BASE_URL ?>my-requests-as-teacher" class="btn secondaryButton" id="" style="padding:15px;width:100%;margin-bottom:15px;">Meus chamados</a>
                            <a href="<?= Config::BASE_URL ?>mural" class="btn secondaryButton" style="padding:15px;width:100%;margin-bottom:15px;">Mural</a>
                            <a href="<?= Config::BASE_URL ?>settings" class="btn secondaryButton" style="padding:15px;width:100%;margin-bottom:15px;">Configurações</a>
                        </div>
                    </div>
                    <div class="col-md-8 col-sm-12">
                        <h2>Minha fila <a href="my-requests-as-teacher" style="float:right; font-size:11px;padding:7px;" class="btn btn-dark">Ver Todos</a></h2>
                        <h6>Os chamados dos quais você está envolvido(a)</h6>
                        <br />
                        <div class="card p-1">
                            <?php if (!isset($myteacherRequests["error"])) { ?>
                                <?php foreach ($myteacherRequests as $request) { ?>
                                    <div class="card p-1 mb-0" id="bodyRequestDash" style="margin-bottom:5px !important;">
                                        <h5 style="font-weight:bold !important;"><?= $request["numero"] . " - " . $request["titulo"] ?> <a href="request/<?= $request["identificador"]?>" style="float:right; font-size:11px;padding:7px;" class="btn btn-dark">Acessar</a></h5>

                                        <div class="row">

                                            <div class="avatar-group" style="margin-top:0px;">
                                                <?php if ($request["usuario_processo_alunoTousuario"] !== null) { ?>
                                                    <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Aluno: <?= $request["usuario_processo_alunoTousuario"]["nome"] . ' ' . $request["usuario_processo_alunoTousuario"]["sobrenome"] . ' - (' . $request["usuario_processo_alunoTousuario"]["email"] . ')' ?> " class="avatar avatar-sm pull-up">
                                                        <img src="<?= $request["usuario_processo_alunoTousuario"]["foto"] != "" ? Config::BASE_URL . $request["usuario_processo_alunoTousuario"]["foto"] : Config::BASE_URL . 'src/img/avatars/generic.webp' ?>" alt="Avatar" height="32" width="32" />
                                                    </div>
                                                <?php }; ?>
                                                <?php if ($request["usuario_processo_professor_avaliadorTousuario"] !== null) { ?>
                                                    <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Professor: <?= $request["usuario_processo_professor_avaliadorTousuario"]["nome"] . ' ' . $request["usuario_processo_professor_avaliadorTousuario"]["sobrenome"] . ' - (' . $request["usuario_processo_professor_avaliadorTousuario"]["email"] . ')' ?> " class="avatar avatar-sm pull-up">
                                                        <img src="<?= $request["usuario_processo_professor_avaliadorTousuario"]["foto"] != "" ? Config::BASE_URL . $request["usuario_processo_professor_avaliadorTousuario"]["foto"] : Config::BASE_URL . 'src/img/avatars/generic.webp' ?>" alt="Avatar" height="32" width="32" />
                                                    </div>
                                                <?php }; ?>
                                                <?php if ($request["usuario_processo_servidor_responsavelTousuario"] !== null) { ?>
                                                    <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top" title="Servidor: <?= $request["usuario_processo_servidor_responsavelTousuario"]["nome"] . ' ' . $request["usuario_processo_servidor_responsavelTousuario"]["sobrenome"] . ' - (' . $request["usuario_processo_servidor_responsavelTousuario"]["email"] . ')' ?> " class="avatar avatar-sm pull-up">
                                                        <img src="<?= $request["usuario_processo_servidor_responsavelTousuario"]["foto"] != "" ? Config::BASE_URL . $request["usuario_processo_servidor_responsavelTousuario"]["foto"] : Config::BASE_URL . 'src/img/avatars/generic.webp' ?>" alt="Avatar" height="32" width="32" />
                                                    </div>
                                                <?php }; ?>
                                                <span style="font-size:10px;margin-left:5px;padding:7px !important;" class="badge rounded-pill bg-light-secondary ms-1">Abert.: <?php $date = new DateTime($request["data_abertura"]);
                                                                                                                                                                                echo $date->format('d/m/Y'); ?></span>
                                                <?php if ($request["data_limite_resolucao"] != null): ?>
                                                    <span style="font-size:10px;margin-left:5px;padding:7px !important;" class="badge rounded-pill bg-light-secondary">Limite: <?php $date = new DateTime($request["data_limite_resolucao"]);
                                                                                                                                                                                echo $date->format('d/m/Y'); ?></span>
                                                <?php endif; ?>
                                                <span style="font-size:10px;margin-left:5px;padding:7px !important;" class="badge rounded-pill bg-light-primary"><?= $request["tipo_solicitacao_processo_tipo_solicitacaoTotipo_solicitacao"]["nome"] ?></span>

                                            </div>




                                        </div>
                                    <?php } ?>
                                <?php } else { ?>
                                    <div class="card mb-0" id="bodyRequestDash" style="margin-bottom:5px !important;">
                                        aaaaaaaaaaaaaa
                                    </div>
                                <?php } ?>

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


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>


        <script src="https://cdn.tiny.cloud/1/kax3g6nv8huzxh65lnkeyjb9qhudlkdh33rgg5zydz16c8pe/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

        <!-- BEGIN: Vendor JS-->
        <script src="layout/app-assets/vendors/js/vendors.min.js"></script>


        <!-- BEGIN: Theme JS-->
        <script src="layout/app-assets/js/core/app-menu.js"></script>
        <script src="layout/app-assets/js/core/app.js"></script>
        <!-- END: Theme JS-->

        <!-- BEGIN: Page JS-->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
        <?php
        require __DIR__ . "/../../" . Config::BASE_PATH_JS . str_replace(".view", ".js.php", basename(__FILE__, ".php"));
        ?>

        <script src="<?= Config::BASE_URL ?>layout/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
        <script src="https://unpkg.com/feather-icons"></script>



</body>
<!-- END: Body-->

</html>