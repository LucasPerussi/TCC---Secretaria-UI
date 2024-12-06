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
    <title>WeJourney - Nova Empresa</title>

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
    <link rel="stylesheet" href="src/css/formative-validate.css">
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
                                <li class="breadcrumb-item"><a href="<?= Config::BASE_URL . 'dashboard' ?>">Dashboard</a></li>
                                <li class="breadcrumb-item active">Conurações de Usuário</li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <div class="content-header row">
                            <div class="content-header-left col-md-9 col-12 mb-2">
                                <div class="row breadcrumbs-top">
                                    <div class="col-12">
                                        <h2 class="content-header-title float-start mb-0">Validar horas formativas</h2>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card p-1 ">


                            <form id="changeNome">
                                <div class="row">
                                    <div class="col-sm-7">

                                        <label class="col-form-label" required for="email-icon">Tipo de evento:</label>

                                    </div>


                                </div>
                            </form>

                            <!-- Formulário de Sobrenome -->


                            <!-- Formulário de Curso -->
                            <form id="changeCurso">
                                <div class=" row">
                                    <div class="col-sm-7">
                                        <label class="col-form-label" for="email-icon">Comprovante de Participação (link)</label>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <button type="submit" class="btn btn-primary" style="float:right;">Ver Arquivo</button>
                                        </div>
                                    </div>
                                </div>
                            </form>

                        </div>


                        <br />
                        <div class="card" style="padding:20px;">
                            <h3>Conclusão</h3>
                            <div class="mb-1 row">
                                <div class="col-sm-12">
                                    <label class="col-form-label" for="email-icon">Professor</label>
                                </div>

                                <div class="custom-select-container">
                                    <form id="addTeacher">
                                        <select required name="professor" class="form-control select2">
                                            <option value="" disabled selected><?= __("request_request.settings-teacher.select") ?></option>
                                            <?php foreach ($teachers as $teacher) { ?>
                                                <option <?php if ($request["professor_avaliador"] == $teacher["id"]) {
                                                            echo "selected";
                                                        } ?> value="<?= $teacher["id"] ?>"><?= $teacher["nome"] ?> <?= $teacher["sobrenome"] ?></option>
                                            <?php } ?>
                                        </select>
                                    </form>
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <div class="col-sm-12">
                                    <label class="col-form-label" for="email-icon">Status</label>
                                </div>
                                <div class="col-sm-12">
                                    <div class="settings-radio-group">
                                        <label class="settings-radio-option">
                                            <input type="radio" class="settings-radio-option-2" name="conclusion-status" value="deferido">
                                            <span class="settings-radio-label"><?= __("request_request.settings-conclude.option-deferido") ?></span>
                                        </label>
                                        <label class="settings-radio-option">
                                            <input type="radio" class="settings-radio-option-2" name="conclusion-status" value="indeferido">
                                            <span class="settings-radio-label"><?= __("request_request.settings-conclude.option-indeferido") ?></span>
                                        </label>
                                        <label class="settings-radio-option">
                                            <input type="radio" class="settings-radio-option-2" name="conclusion-status" value="concluido">
                                            <span class="settings-radio-label"><?= __("request_request.settings-conclude.option-concluido") ?></span>
                                        </label>
                                        <label class="settings-radio-option">
                                            <input type="radio" class="settings-radio-option-2" name="conclusion-status" value="cancelado">
                                            <span class="settings-radio-label"><?= __("request_request.settings-conclude.option-cancelado") ?></span>
                                        </label>
                                    </div>
                                    <br>
                                </div>

                                <div class="col-sm-12">
                                    <textarea class="form-control" id="justificativa" name="justificativa" rows="3" placeholder="Justificativa" required></textarea>
                                </div>
                            </div>
                            <div class="mb-1 row">
                                <div class="col-sm-12">
                                    <label class="col-form-label" for="email-icon">Horas Concedidas</label>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bi bi-clock"></i></span>
                                        <input type="number" id="name-icon" class="form-control" name="horas_concedidas" placeholder="30" />
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary" style="float:right;">Confirmar</button>
                                </div>
                            </div>



                        </div>

                    </div>
                    <div class="col-md-6 col-sm-12">
                        <div class="content-header-left col-md-9 col-12 mb-2">
                            <div class="row breadcrumbs-top">
                                <div class="col-12">
                                    <h2 class="content-header-title float-start mb-0">Informações</h2>
                                </div>
                            </div>
                        </div>
                        <style>
                            #preview {
                                max-width: 250px;
                                max-height: 250px;
                                border-radius: 150px !important;
                                object-fit: cover;
                            }

                            #imageToCrop {
                                max-width: 100%;
                                max-height: 500px;
                                border-radius: 10px;
                            }

                            .selectedAvatar {
                                border: 3px solid #00adff;
                            }

                            .modal .modal-content {
                                /* background-color: #fff !important; */
                                padding: 0px !important;
                                border-radius: 20px !important;
                            }

                            .modal-header {

                                border-top-left-radius: 20px !important;
                                border-top-right-radius: 20px !important;
                            }
                        </style>
                        <div class="card p-2">
                            <p><strong>Chamado ID:</strong> #12345</p>
                            <p><strong>Status:</strong> Em andamento</p>
                            <p><strong>Responsável</strong> Fulano de Tal</p>
                            <p><strong>Data de Abertura:</strong> 23/11/2024</p>
                            <p><strong>Última Atualização:</strong> 24/11/2024</p>

                        </div>
                        <div class="card p-2">
                            <div class="card p-2" style="text-align:center !important;" id="bodyRequestDash">
                                <div class="row">
                                    <div class="col-md-5 col-sm-12">
                                        <img id="preview"
                                            src="<?= isset($_SESSION['user_picture']) ? $_SESSION['user_picture'] : 'placeholder.jpg' ?>"
                                            alt="Profile Picture"
                                            class="img-fluid rounded mb-0">
                                    </div>
                                    <div class="col-md-5 col-sm-12">
                                        <div style="text-align:left; margin-left:10px;margin-top:30px;">

                                            <h2>
                                                <?= $_SESSION['user_name'] ?>
                                            </h2>
                                            <span><?= $_SESSION['user_email'] ?></span>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>


                    <!-- Modal -->
                    <div class="modal fade" id="profilePicModal" tabindex="-1" role="dialog" aria-labelledby="profilePicModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="profilePicModalLabel"><?= __("complete_profile.modais.selecione") ?></h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="file" id="uploadImage" accept="image/*" class="form-control mb-3">
                                    <div class="text-center">
                                        <img id="imageToCrop" src="" alt="Image to Crop" class="img-fluid d-none">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="cropImage" class="btn btn-primary d-none"><?= __("complete_profile.modais.cortar") ?></button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                                </div>
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
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <?php
    require __DIR__ . "/../../" . Config::BASE_PATH_JS . str_replace(".view", ".js.php", basename(__FILE__, ".php"));
    ?>



</body>
<!-- END: Body-->

</html>