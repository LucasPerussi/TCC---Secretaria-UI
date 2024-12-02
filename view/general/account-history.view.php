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


    <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/css/plugins/forms/pickers/form-flat-pickr.css">
    <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/css/plugins/forms/pickers/form-pickadate.css">
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
    <style>
        /* Adiciona um estilo especial para a página ativa */
        .active-page {
            background-color: #007bf330;
            /* Azul, você pode mudar para a cor desejada */
            color: white;
            border-radius: 5px;

        }

        .timeline .timeline-item .timeline-point {
            height: 15px !important;
            width: 15px !important;
            text-align: center !important;
            margin-left: 4px !important;
            border: none !important;
        }
    </style>


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
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">


                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb ps-0">
                                <li class="breadcrumb-item"><a href="<?= Config::BASE_URL . 'settings' ?>">Configurações</a></li>
                                <li class="breadcrumb-item active">Timelines</li>
                            </ol>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">
                <section class="app-user-view-account">
                    <div class="row">
                        <!-- User Sidebar -->

                        <!--/ User Sidebar -->

                        <!-- User Content -->
                        <div class="col-xl-12 col-lg-12 col-md-12 order-1 order-md-1">


                            <!-- Activity Timeline -->
                            <div class="row">
                                <div class="col-8">
                                    <h1><?= __("settings.card_historico.titulo") ?></h1>
                                </div>
                                <div class="col-4">
                                    <div class="dropdown" style="float:right !important; ">
                                        <label for="itemsPerPage" style="font-size:12px;">Itens por Página:
                                            <select id="itemsPerPage" class="form-control select" onchange="changeItemsPerPage()">
                                                <option value="10">10</option>
                                                <option value="50">50</option>
                                                <option value="100">100</option>
                                            </select></label>
                                    </div>
                                </div>
                            </div>
                            <br />
                            <div class="input-group mb-0">
                                <span class="input-group-text" id="basic-addon-search1"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg></span>
                                <input type="text" id="searchInput" oninput="searchData()" class="form-control" placeholder="Search..." aria-label="Search..." aria-describedby="basic-addon-search1">
                            </div>
                            <br />


                            <div class="card" style="padding:20px; padding-bottom:20px;">
                                <div class="content-body">
                                    <!-- Timeline Starts -->
                                    <section class="basic-timeline">

                                        <ul class="timeline ms-50" id="timelines">

                                        </ul>
                                        <div class="no-results-message" id="noResultsMessage"></div>

                                    </section>
                                </div>
                            </div>
                            <br />
                            <div class="pagination" id="pagination" style="border-radius:20px !important; overflow:hidden; background-color:#f3f2f7"></div>
                            <br />

                            <!-- /Activity Timeline -->

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





    <script src="<?= Config::BASE_URL ?>layout/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="<?= Config::BASE_URL ?>layout/app-assets/js/scripts/forms/form-select2.js"></script>


    <!-- BEGIN: Page Vendor JS-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>



    <footer class="footer footer-static footer-light">
        <button class="btn btn-info btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    </footer>



    <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js'></script>


    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <!-- <script src="//code.jquery.com/jquery-1.10.2.js"></script> -->

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

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>


    <script>
        feather.replace()
    </script>








</body>


</html>