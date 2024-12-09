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
    <title>Trocar Senha</title>

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
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">


                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb ps-0">
                                <li class="breadcrumb-item"><a href="<?= Config::BASE_URL . 'settings' ?>">Configurações</a></li>
                                <li class="breadcrumb-item active">Segurança</li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <h1>Alteração de Senha</h1>
                        <h6>Atualize suas informações básicas</h6>
                        <br />
                        <div class="card" style="padding:20px;">
                            <!-- form -->
                            <form id="new-password" class="validate-form">
                                <div class="row">
                                    <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="account-old-password"><?= __("internal_pw_reset.atual") ?></label>
                                        <div class="input-group form-password-toggle input-group-merge">
                                            <input type="password" class="form-control" id="account-old-password" name="password" placeholder="<?= __("internal_pw_reset.atual_ph") ?>" data-msg="Please current password" />
                                            <div class="input-group-text cursor-pointer" id="toggleOldPassword">
                                                <i data-feather="eye"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="account-new-password"><?= __("internal_pw_reset.nova") ?></label>
                                        <div class="input-group form-password-toggle input-group-merge">
                                            <input required type="password" id="password" onkeyup="verificaForcaSenha()" name="new-password" class="form-control" placeholder="<?= __("internal_pw_reset.nova_ph") ?>" />
                                            <div class="input-group-text cursor-pointer" id="toggleNewPassword">
                                                <i data-feather="eye"></i>
                                            </div>
                                        </div>
                                        <span style="font-size:10px;" id="password-status"></span>
                                    </div>
                                    <div class="col-12 col-sm-6 mb-1">
                                        <label class="form-label" for="account-retype-new-password"><?= __("internal_pw_reset.confirmar") ?></label>
                                        <div class="input-group form-password-toggle input-group-merge">
                                            <input required type="password" onkeyup="check_pass()" class="form-control" id="confirm_password" name="confirm-new-password" placeholder="<?= __("internal_pw_reset.confirmar_ph") ?>" />
                                            <div class="input-group-text cursor-pointer" id="toggleConfirmPassword">
                                                <i data-feather="eye"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <p class="fw-bolder"><?= __("internal_pw_reset.requisitos.titulo") ?></p>
                                        <ul class="ps-1 ms-25">
                                            <li class="mb-50"><?= __("internal_pw_reset.requisitos.1") ?></li>
                                            <li class="mb-50"><?= __("internal_pw_reset.requisitos.2") ?></li>
                                            <li><?= __("internal_pw_reset.requisitos.3") ?></li>
                                        </ul>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" id="submit" disabled class="btn btn-primary me-1 mt-1"><?= __("internal_pw_reset.salvar") ?></button>
                                    </div>
                                </div>
                            </form>
                            <!--/ form -->
                        </div>
                      





                    </div>
                    <div class="col-md-4 col-sm-12">
                            <h1 style="font-size:250px; text-align:center;margin-top:50px;">🔐</h1>
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
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <?php
    require __DIR__ . "/../../" . Config::BASE_PATH_JS . str_replace(".view", ".js.php", basename(__FILE__, ".php"));
    ?>


    <script src="<?= Config::BASE_URL ?>layout/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>



    <script src="https://unpkg.com/feather-icons"></script>

</body>
<!-- END: Body-->

</html>