<?php

use API\Controller\Config;
use API\Controller\ipinfo;
use const Siler\Config\CONFIG; ?>

<?php if (!isset($_SESSION["user_id"])) : ?>
    <html>

    <head>
        <meta http-equiv="Refresh" content="0; url=<?= Config::BASE_URL . "login"; ?> " />
    </head>

    </html>
<?php else : ?>


            <!DOCTYPE html>
            <html class="loading" lang="en" data-textdirection="ltr">
            <script>
                console.log = function() {};
                console.error = function() {};
            </script>
            <!-- BEGIN: Head-->
    


            <head>

                <?php include "view/src/head.php"; ?>
                <meta charset="utf-8">
                <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
                <link rel="stylesheet" type="text/css" href="layout/app-assets/css/core/menu/menu-types/vertical-menu.css">
                <link rel="stylesheet" type="text/css" href="layout/app-assets/css/pages/dashboard-ecommerce.css">
                <link rel="stylesheet" type="text/css" href="layout/app-assets/css/plugins/extensions/ext-component-toastr.css">
                <link rel="stylesheet" type="text/css" href="src/css/dashboard.css">
                <link rel="stylesheet" href="src/css/main.css">
                <meta name='robots' content='noindex'>
                <link rel="stylesheet" type="text/css" href="src/css/swiper-bundle.min.css">
                <link rel="stylesheet" type="text/css" href="src/css/carousel.css">
                <title>WeJourney - Painel Admin</title>

                <style>
                    @import url('https://fonts.googleapis.com/css2?family=Montserrat:wght@900&display=swap');
                </style>
                <link rel="stylesheet" type="text/css" href="layout/assets/css/style.css">
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
                        <!-- <div class="content-header row"> </div> -->
                        <div class="content-body">
                            <!-- Dashboard Ecommerce Starts -->
                            <h1 style="font-weight:500; "><?= __("dashboard_member.titulo") ?> <a href="<?= Config::BASE_URL . 'customize-dashboard' ?>" style="text-align:end; float:right;font-size:13px;"><i class="bi bi-pencil-square"></i> Personalizar</a></h1>

                            <!-- AVISO DE USUÁRIOS PENDENTES DE APROVACAO  -->
                            

                            <div class="row kb-search-content-info match-height">
                                <h2 style="font-weight:500; margin-top: 20px; "><?= __("dashboard_member.titulo2") ?> <a href="<?= Config::BASE_URL . 'customize-dashboard' ?>" style="text-align:end; float:right;font-size:13px;"><i class="bi bi-pencil-square"></i></h1>
                                    <!-- email -->
                                     <div class="card-container">
                                        <div class="col-12 kb-search-content">
                                            <div class="gray">
                                                <a href="<?= Config::BASE_URL .  "company-tickets" ?>">

                                                    <div class="card-body text-left">
                                                        <h4><b><?= __("dashboard_member.top_cards.titulo_chamado") ?><i class="bi bi-chevron-right" style="right:10px;position:absolute;margin-top:15px;"></i></b></h4>
                                                        <p class=" mt-0 mb-0"><?= __("dashboard_member.top_cards.data_chamado") ?>
                                                        </p>
                                                        <span class="card-icon big green"><b>Tempo restante: 2 dias e 3 horas</b></span>
                                                        <span class="card-icon small red"><b>Aberto</b></span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <br />
                                        <div class="col-12 kb-search-content">
                                            <div class="gray">
                                                <a href="<?= Config::BASE_URL .  "admin-request" ?>">
                                                    
                                                    <div class="card-body text-left">
                                                        <h4><b><?= __("dashboard_member.top_cards.titulo_chamado") ?><i class="bi bi-chevron-right" style="right:10px;position:absolute;margin-top:15px;"></i></b></h4>
                                                        <p class=" mt-0 mb-0"><?= __("dashboard_member.top_cards.data_chamado") ?>
                                                        </p>
                                                        <span class="card-icon medium red"><b>Atrasado</b></span>
                                                        <span class="card-icon small red"><b>Aberto</b></span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <br />
                                        <!-- personalization -->
                                        <div class="col-12 kb-search-content">
                                            <div class="gray">
                                                <a href="#">

                                                    <div class="card-body text-left">
                                                        <h4><b><?= __("dashboard_member.top_cards.titulo_chamado") ?><i class="bi bi-chevron-right" style="right:10px;position:absolute;margin-top:15px;"></i></b></h4>
                                                        <p class=" mt-0 mb-0"><?= __("dashboard_member.top_cards.data_chamado") ?>
                                                        </p>
                                                        <span class="card-icon small green"><b>Resolvido</b></span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                        <br />
                                        <div class="col-12 kb-search-content">
                                            <div class="gray">
                                                <a href="#">

                                                    <div class="card-body text-left">
                                                        <h4><b><?= __("dashboard_member.top_cards.titulo_chamado") ?><i class="bi bi-chevron-right" style="right:10px;position:absolute;margin-top:15px;"></i></b></h4>
                                                        <p class=" mt-0 mb-0"><?= __("dashboard_member.top_cards.data_chamado") ?>
                                                        </p>
                                                        <span class="card-icon small green"><b>Resolvido</b></span>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                            </div>







                                <!-- </div> -->
                                <!-- </div> -->
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

                                <!-- <script src="layout/app-assets/js/scripts/my-department.js"></script> -->
                                <?php include "view/src/footer.php"; ?>
                                <style>
                                    .owl-stage-outer {
                                        height: 500px;

                                    }

                                    .cards {
                                        margin-right: 10px;
                                    }
                                </style>
            </body>

            </html>
   
<?php endif; ?>