<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="viewport" content="width=device-width, user-scalable=0" />
    <meta charset="Utf8mb4">
    <?php

    use API\Controller\Config;
    use API\enum\Settings;
    use API\enum\Timeline_enum;
    use API\Model\Timeline;

    include "view/src/head.php";
    ?>

    <?php if (mysqli_num_rows($users) > 0) : ?>
        <?php while ($user = mysqli_fetch_assoc($users)) : ?>
            <!-- <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/vendors/css/file-uploaders/dropzone.min.css"> -->

            <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/vendors/css/pickers/pickadate/pickadate.css">
            <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
            <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/vendors/css/vendors.min.css">
            <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/vendors/css/forms/select/select2.min.css">
            <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/css/core/menu/menu-types/vertical-menu.css">
            <!-- <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/assets/css/style.css">
            <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/css/plugins/forms/pickers/form-flat-pickr.css">
            <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/css/plugins/forms/pickers/form-pickadate.css">
            <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/css/bootstrap.css">
            <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/css/bootstrap-extended.css">
            <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/css/colors.css">
            <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/css/components.css">
            <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/css/themes/dark-layout.css">
            <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/css/themes/bordered-layout.css">
            <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/css/themes/semi-dark-layout.css"> -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">

            <!-- BEGIN: Page CSS-->
            <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/css/plugins/forms/form-file-uploader.css">
            <!-- END: Page CSS-->
            <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css'>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
            <script src="https://unpkg.com/feather-icons"></script>
            <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
            <script src="//code.jquery.com/jquery-1.10.2.js"></script>
            <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
            <meta name='robots' content='noindex'>
            <script src="sweetalert2.min.js"></script>
            <link rel="stylesheet" href="sweetalert2.min.css">
            <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
          


</head>
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  <?php if ($_SESSION["user_id"]) {
                                                                                        echo "menu-collapsed";
                                                                                    } else {
                                                                                        echo "menu-hide";
                                                                                    } ?> menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!--BEGIN: Navbar -->
    <?php include "view/src/header.php"; ?>
    <!--END: Navbar & BEGIN: Sidebar -->

    <!--BEGIN: Sidebar -->
    <?php
            if ($_SESSION["user_role"] == 5) {
                include "view/src/mainMenuPartner.php";
            } else {
                include "view/src/mainMenu.php";
            }
    ?>
    <!--END: Sidebar -->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row"></div>
            <div class="content-body">
                <section class="app-user-view-account">
                    <div class="row">
                        <!-- User Sidebar -->
                        <div class="col-xl-4 col-lg-5 col-md-5 order-5 order-md-0">
                            <?php include "view/src/profile-preview.php"; ?>
                        </div>
                        <!--/ User Sidebar -->

                        <!-- User Content -->
                        <div class="col-xl-8 col-lg-7 col-md-7 order-1 order-md-1">

                        <style>
                            h3 {
                                font-size: 18px !important;
                            }

                            .dropzone {
                                min-height: 100px !important;
                                max-height: 190px !important;
                            }

                            .dropzone .dz-message:before {
                                font-size: 30px !important;
                                top: unset !important;
                                width: 30px !important;
                                height: 30px !important;
                            }

                            .dropzone .dz-message .dz-button {
                                font-size: 0px !important;
                            }
                        </style>
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.css">
                        <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/css/plugins/forms/form-file-uploader.css">
                            <h1>Upload de Arquivos</h1>
                            <form id="my-dropzone" class="dropzone" method="post">
                                <input type="hidden" id="type" name="type" value="9998">
                                <input type="hidden" id="reference" name="reference" value="odsnjousfgn">
                                <input type="hidden" id="descricao" name="descricao" value="BACKUP SERIAL">
                                <input type="hidden" id="csrf_token" name="csrf_token" value="<?= $_SESSION["csrf_token"] ?>">
                            </form>

                            <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>
                            <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
                            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                            <script>
                                const Toast = Swal.mixin({
                                    toast: true,
                                    position: 'top-end',
                                    showConfirmButton: false,
                                    timer: 3000,
                                    timerProgressBar: true,
                                    didOpen: (toast) => {
                                        toast.addEventListener('mouseenter', Swal.stopTimer)
                                        toast.addEventListener('mouseleave', Swal.resumeTimer)
                                    }
                                })

                                // Configurações do Dropzone
                                Dropzone.options.myDropzone = {
                                    url: "<?= Config::BASE_ACTION_URL ?>/upload/file",
                                    paramName: "file",
                                    maxFilesize: 2, // Tamanho máximo do arquivo em MB
                                    maxFiles: 1, // Número máximo de arquivos
                                    dictDefaultMessage: "Arraste os arquivos aqui para fazer o upload",
                                    acceptedFiles: ".jpeg,.jpg,.png,.gif", // Tipos de arquivos aceitos
                                    init: function() {
                                        this.on("success", function(file, response) {
                                            console.log("Arquivo enviado com sucesso:", response);
                                            Toast.fire({
                                                icon: 'success',
                                                title: 'Seu arquivo foi enviado com sucesso!',
                                            })
                                        });
                                        this.on("error", function(file, response) {
                                            console.error("Erro ao enviar o arquivo:", response);
                                            Toast.fire({
                                                icon: 'error',
                                                title: response,
                                            })
                                        });
                                        this.on("maxfilesexceeded", function(file) {
                                            this.removeFile(file);
                                            Toast.fire({
                                                icon: 'error',
                                                title: 'Você não pode enviar mais do que 1 arquivo.',
                                            })
                                        });
                                        this.on("error", function(file, response) {
                                            if (file.size > this.options.maxFilesize * 1024 * 1024) {
                                                Toast.fire({
                                                    icon: 'error',
                                                    title: 'O arquivo excede o tamanho máximo permitido de 2MB.',
                                                })
                                                this.removeFile(file);
                                            }
                                        });
                                    }
                                };
                            </script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/dropzone.min.js"></script>



                        </div>
                        <!--/ User Content -->
                    </div>
                </section>


            </div>
        </div>
    </div>
    <!-- END: Content-->


    <style>
        .page-item .page-link {
            color: #3f3f40 !important;
        }
    </style>

    <!-- <script src="<?= Config::BASE_URL ?>layout/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="<?= Config::BASE_URL ?>layout/app-assets/js/scripts/forms/form-select2.js"></script> -->


    <!-- BEGIN: Page Vendor JS-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>



    <footer class="footer footer-static footer-light">
        <button class="btn btn-info btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    </footer>


    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="<?= Config::BASE_URL ?>layout/app-assets/vendors/js/vendors.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <!-- BEGIN: Page Vendor JS-->
    <script src="<?= Config::BASE_URL ?>/layout/app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <!-- <script src="<?= Config::BASE_URL ?>/layout/app-assets/vendors/js/file-uploaders/dropzone.min.js"></script> -->

    <script src="<?= Config::BASE_URL ?>layout/app-assets/js/core/app-menu.js"></script>
    <script src="<?= Config::BASE_URL ?>layout/app-assets/js/core/app.js"></script>

    <!-- <script src="<?= Config::BASE_URL ?>/src/js/file-uploaders.js"></script> -->
  

    <!-- END: Page JS-->
    <script>
        feather.replace()
    </script>

    <?php
            require __DIR__ . "/../../" . Config::BASE_PATH_JS . str_replace(".view", ".js.php", basename(__FILE__, ".php"));
    ?>








</body>
<!-- END: Body--> <?php endwhile; ?>
<?php endif; ?>

</html>