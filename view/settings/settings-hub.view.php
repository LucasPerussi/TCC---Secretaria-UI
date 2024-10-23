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
                h3 {
                    font-size: 18px !important;
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
                            <?php include "view/src/nav-settings.php"; ?>

                            <div id="user-edit-section" hidden>
                                <?php include "view/settings/user-edit.view.php"; ?>
                            </div>
                            <div id="business-card-section" hidden>
                                    <?php if (($_SESSION["allowBC"] == 1) && ($_SESSION["user_role"] != 5)):?>
                                    <?php include "view/settings/business-card-settings.view.php"; ?>
                                    <?php endif;?>
                                </div>
                            <div id="settings-section">
                                <?php include "view/settings/account.view.php"; ?>
                            </div>
                            <div id="timelines-section" hidden>
                                timeliness
                            </div>
                            <div id="security-section" hidden>
                                <?php include "view/settings/security.view.php"; ?>

                            </div>
                            <div id="change-password-section" hidden>
                                <?php include "view/settings/password.view.php"; ?>
                            </div>
                            <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
                            <script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>
                            <div id="logins-section" hidden>
                                <?php //include "view/settings/list-logins.view.php"; ?>
                            </div>
                            <div id="whitelist-section" hidden>
                            </div>
                            <div id="requests-section" hidden>
                                <?php include "view/settings/my-requests.view.php"; ?> 
                            </div>
                            <!--/ Empty Divs for Sections -->


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
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="<?= Config::BASE_URL ?>layout/app-assets/vendors/js/vendors.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    
    <script src="<?= Config::BASE_URL ?>layout/app-assets/js/core/app-menu.js"></script>
    <script src="<?= Config::BASE_URL ?>layout/app-assets/js/core/app.js"></script>

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