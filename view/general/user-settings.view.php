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
                                <li class="breadcrumb-item active">Condifurações de Usuário</li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-6 col-sm-12">
                        <h1>Perfil</h1>
                        <h6>Atualize suas informações básicas</h6>
                        <br />
                        <div class="card p-1 ">

                            <!-- Formulário de E-mail -->
                            <form id="changeEmail">
                                <div class=" row">
                                    <div class="col-sm-3">
                                        <label class="col-form-label" for="email-icon"><?= htmlspecialchars(__("user_edit.email")) ?></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bi bi-envelope"></i></span>

                                            <input type="email" class="form-control" value="<?= htmlspecialchars($user["email"]) ?>" name="email" placeholder="email@exemplo.com" />
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <button type="submit" style="font-size: 11px; padding: 10px; width: 100%; margin-top: 5px; max-width: 100px; float: right; min-width:60px;" id="saveEmail" hidden class="btn btn-info">
                                            <?= htmlspecialchars(__("user_edit.salvar")) ?>
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <!-- Formulário de Registro -->
                            <form id="changeRegistro">
                                <div class=" row">
                                    <div class="col-sm-3">
                                        <label class="col-form-label" for="registro-icon">Registro</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bi bi-card-text"></i></span>

                                            <input type="text" maxlength="15" class="form-control" value="<?= htmlspecialchars($user["registro"]) ?>" name="registro" placeholder="Registro" />
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <button type="submit" style="font-size: 11px; padding: 10px; width: 100%; margin-top: 5px; max-width: 100px; float: right; min-width:60px;" id="saveRegistro" hidden class="btn btn-info">
                                            <?= htmlspecialchars(__("user_edit.salvar")) ?>
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <!-- Formulário de Nome -->
                            <form id="changeNome">
                                <div class=" row">
                                    <div class="col-sm-3">
                                        <label class="col-form-label" for="nome-icon"><?= htmlspecialchars(__("user_edit.nome")) ?></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bi bi-person"></i></span>

                                            <input type="text" class="form-control" value="<?= htmlspecialchars($user["nome"]) ?>" name="nome" placeholder="Nome" />
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <button type="submit" style="font-size: 11px; padding: 10px; width: 100%; margin-top: 5px; max-width: 100px; float: right; min-width:60px;" id="saveNome" hidden class="btn btn-info">
                                            <?= htmlspecialchars(__("user_edit.salvar")) ?>
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <!-- Formulário de Sobrenome -->
                            <form id="changeSobrenome">
                                <div class=" row">
                                    <div class="col-sm-3">
                                        <label class="col-form-label" for="sobrenome-icon"><?= htmlspecialchars(__("user_edit.sobrenome")) ?></label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bi bi-person-fill"></i></span>

                                            <input type="text" class="form-control" value="<?= htmlspecialchars($user["sobrenome"]) ?>" name="sobrenome" placeholder="Sobrenome" />
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <button type="submit" style="font-size: 11px; padding: 10px; width: 100%; margin-top: 5px; max-width: 100px; float: right; min-width:60px;" id="saveSobrenome" hidden class="btn btn-info">
                                            <?= htmlspecialchars(__("user_edit.salvar")) ?>
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <!-- Formulário de Data de Nascimento -->
                            <form id="changeNascimento">
                                <div class=" row">
                                    <div class="col-sm-3">
                                        <label class="col-form-label" for="nascimento-icon">Nascimento</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bi bi-calendar-date"></i></span>

                                            <input type="date" class="form-control" value="<?php $date = new DateTime($user["nascimento"]);
                                                                                            echo $date->format('Y-m-d'); ?>" name="nascimento" />
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <button type="submit" style="font-size: 11px; padding: 10px; width: 100%; margin-top: 5px; max-width: 100px; float: right; min-width:60px;" id="saveNascimento" hidden class="btn btn-info">
                                            <?= htmlspecialchars(__("user_edit.salvar")) ?>
                                        </button>
                                    </div>
                                </div>
                            </form>

                            <!-- Formulário de Curso -->
                            <form id="changeCurso">
                                <div class=" row">
                                    <div class="col-sm-3">
                                        <label class="col-form-label" for="curso-icon">Curso</label>
                                    </div>
                                    <div class="col-sm-8">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bi bi-book"></i></span>

                                            <input type="number" class="form-control" value="<?= htmlspecialchars($user["curso"]) ?>" name="curso" placeholder="Curso ID" />
                                        </div>
                                    </div>
                                    <div class="col-sm-1">
                                        <button type="submit" style="font-size: 11px; padding: 10px; width: 100%; margin-top: 5px; max-width: 100px; float: right; min-width:60px;" id="saveCurso" hidden class="btn btn-info">
                                            <?= htmlspecialchars(__("user_edit.salvar")) ?>
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <br />
                        <h1>Segurança <a href="change-password" class="btn btn-dark" style="float:right;">Alterar</a></h1>
                        <h6>Sempre opte por senhas seguras!</h6>
                        <br />
                        <br />
                        <br />
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <h1><?= __("complete_profile.aparencia") ?> </h1>
                        <p><?= __("complete_profile.aparencia_desc") ?></p>
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
                            <h3 style="font-weight:bolder !important;">Avatar </h3>
                            <h6>Se preferir, selecione um avatar que combine com você!</h6>
                            <br />
                            <h4 style="font-weight:bolder !important;">Abstrato</h4>
                            <br />

                            <div class="swiper-container-avatar" style="overflow:hidden; margin-bottom:15px; ">
                                <div class="swiper-wrapper">
                                    <?php for ($art = 1; $art < 9; $art++) { ?>
                                        <div class="swiper-slide" onclick="updatePicture(this, '<?= Config::BASE_URL . 'src/img/avatars/art-' . $art . '.webp' ?>')" style="max-width:100px !important;border-radius:100px !important;">
                                            <img src="<?= Config::BASE_URL . 'src/img/avatars/art-' . $art . '.webp' ?>" <?php if ($_SESSION["user_picture"] == Config::BASE_URL . 'src/img/avatars/art-' . $art . '.webp'): ?> class="selectedAvatar" <?php endif; ?> alt="avatar" style="width:100%; border-radius:100px;">
                                        </div>
                                    <?php } ?>
                                </div>
                            </div>
                            <br />
                            <h4 style="font-weight:bolder !important;">Cartoon</h4>
                            <br />
                            <div class="swiper-container-cartoon" style="overflow:hidden; margin-bottom:15px; ">
                                <div class="swiper-wrapper">
                                    <?php for ($art = 1; $art < 39; $art++) { ?>
                                        <div class="swiper-slide" onclick="updatePicture(this, '<?= Config::BASE_URL . 'src/img/avatars/pessoa-' . $art . '.webp' ?>')" style="max-width:100px !important;border-radius:100px !important;">
                                            <img src="<?= Config::BASE_URL . 'src/img/avatars/pessoa-' . $art . '.webp' ?>" <?php if ($_SESSION["user_picture"] == Config::BASE_URL . 'src/img/avatars/pessoa-' . $art . '.webp'): ?> class="selectedAvatar" <?php endif; ?> alt="avatar" style="width:100%; border-radius:100px;">
                                        </div>
                                    <?php } ?>
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