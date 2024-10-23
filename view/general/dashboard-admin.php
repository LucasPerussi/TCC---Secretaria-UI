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

    <?php if (mysqli_num_rows($companyResult) > 0) : ?>
        <?php while ($myCompany = mysqli_fetch_assoc($companyResult)) : ?>

            <!DOCTYPE html>
            <html class="loading" lang="en" data-textdirection="ltr">
            <script>
                console.log = function() {};
                console.error = function() {};
            </script>
            <!-- BEGIN: Head-->
            <?php
            $waitingApproval = "false";
            if (mysqli_num_rows($waiting) > 0) {
                $_SESSION["pending-users"] = "true";
            }
            ?>


            <head>

                <?php include "view/src/head.php"; ?>
                <meta charset="utf-8">
                <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
                <link rel="stylesheet" type="text/css" href="layout/app-assets/css/core/menu/menu-types/vertical-menu.css">
                <link rel="stylesheet" type="text/css" href="layout/app-assets/css/pages/dashboard-ecommerce.css">
                <link rel="stylesheet" type="text/css" href="layout/app-assets/css/plugins/extensions/ext-component-toastr.css">
                <link rel="stylesheet" href="src/css/dashboard.css">
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

                <style>
                    .carousel-wrap {
                        margin: 90px auto;
                        padding: 0 5%;
                        width: 100%;
                        position: relative;
                    }

                    /* fix blank or flashing items on carousel */
                    .owl-carousel .item {
                        position: relative;
                        z-index: 100;
                        /*-webkit-backface-visibility: hidden; */
                    }

                    /* end fix */
                    .owl-nav>div {
                        margin-top: -26px;
                        position: absolute;
                        top: 50%;
                        color: #cdcbcd;
                    }

                    .owl-nav i {
                        font-size: 52px;
                    }

                    .owl-nav .owl-prev {
                        left: -30px;
                    }

                    .owl-nav .owl-next {
                        right: -30px;
                    }
                </style>
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
                        <div class="content-header row"> </div>
                        <div class="content-body">
                            <!-- Dashboard Ecommerce Starts -->
                            <h1 style="font-weight:500; "><?= __("dashboard_admin.titulo") ?> <a href="<?= Config::BASE_URL . 'customize-dashboard' ?>" style="text-align:end; float:right;font-size:13px;"><i class="bi bi-pencil-square"></i> Personalizar</a></h1>
                            <!-- AVISO DE PRODUTOS EM FIM DE GARANTIA  -->

                            <?php if (($produtosVencendo) && ($preferences["avs_inv"] > 0)) : ?>
                                <section id="knowledge-base-content" style="margin-top:0px;">
                                    <div class="row kb-search-content-info match-height">
                                        <!-- email -->
                                        <div class="col-md-12 col-sm-12 col-12 kb-search-content">
                                            <div class="card" style="border: 2px solid !important;margin-bottom:20px;">
                                                <a href="<?= Config::BASE_URL .  "company-inventory" ?>">
                                                    <div class="card-body text-left">
                                                        <h4> <i class="bi bi-exclamation-triangle-fill"></i> Aviso de fim de garantia!<i class="bi bi-chevron-right" style="right:10px;position:absolute;margin-top:15px;"></i></h4>
                                                        <p class=" mt-0 mb-0">Alguns de seus produtos estão próximos do fim do período
                                                            de garantia, ou expirados. Clique aqui para ver quais.
                                                        </p>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                </section>
                            <?php endif; ?>

                            <?php foreach ($tracking as $ship) { ?>
                                <?php if (!isset($ship["error"])) : ?>
                                    <?php if ($ship["transportadora"] == Config::TRANSP_MOVVI) {
                                    ?>
                                        <div id="tabcontent">
                                            <?php if (($ship["status_code"] != 10) && ($ship["status_code"] != 100)) : ?>
                                                <a href="<?= Config::BASE_URL ?>delivery-tracking-movvi?transportadora=MOVVI&origem=<?= $ship["cnpjOrigem"] ?>&destino=unset&nfe=<?= $ship["nfe"] ?>">
                                                    <div class="card" style="padding:20px;" data-carrier="Movvi">
                                                        <h4 style="font-weight:600 !important;">Processo de Entrega 🚚 </h4>
                                                        <span style="font-size:11px;"><?= $ship["munOrigem"] ?> / <?= $ship["ufOrigem"] ?> -> <?= $ship["munDestino"] ?> / <?= $ship["ufDestino"] ?> - Previsão de Entrega: <?= date("d/m/Y", strtotime($ship["previsaoEntrega"])) ?> </span>
                                                        <br />
                                                        <h6>
                                                            <span class="badge badge-light-success mb-1">NF-e <?= $ship["nfe"] ?></span>
                                                            <span class="badge badge-light-info mb-1"><?= $ship["status"] ?></span>
                                                            <span class="badge badge-light-warning mb-1">MOVVI</span>
                                                        </h6>
                                                        <div class="progress">
                                                            <?php if ($ship["status_code"] == 90) : ?>
                                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100">
                                                                    Cancelado
                                                                </div>
                                                            <?php else : ?>
                                                                <?php if ($ship["status_code"] >= 1) : ?>
                                                                    <div class="progress-bar bg-warning" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
                                                                        Enviado
                                                                    </div>
                                                                <?php endif; ?>
                                                                <?php if (($ship["status_code"] == 99) || ($ship["status_code"] == 20) || ($ship["status_code"] == 100) || ($ship["status_code"] == 10)) : ?>
                                                                    <div class="progress-bar bg-info" role="progressbar" style="width: 35%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                                        Em Transporte
                                                                    </div>
                                                                <?php endif; ?>
                                                                <?php if (($ship["status_code"] == 20) || ($ship["status_code"] == 100) || ($ship["status_code"] == 10)) : ?>
                                                                    <div class="progress-bar bg-primary" role="progressbar" style="width: 35%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                                        Rota de Entrega
                                                                    </div>
                                                                <?php endif; ?>

                                                                <?php if (($ship["status_code"] == 100) || ($ship["status_code"] == 10)) : ?>
                                                                    <div class="progress-bar bg-success" role="progressbar" style="width: 15%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                                        Entregue
                                                                    </div>
                                                                <?php endif; ?>
                                                            <?php endif; ?>

                                                        </div>
                                                    </div>
                                                </a>

                                            <?php endif; ?>
                                        </div>
                                    <?php } else { ?>
                                        <?php if (($ship["status"] != "ENTREGA REALIZADA NORMALMENTE") && ($ship["status_code"] != "099")) : ?>
                                            <a href="<?= Config::BASE_URL ?>delivery-tracking-manually?transportadora=JAMEF&origem=<?= $ship["cnpjOrigem"] ?>&destino=unset&nfe=<?= $ship["nfe"] ?>">
                                                <div class="card" style="padding:20px;" data-carrier="Jamef">
                                                    <h4 style="font-weight:600 !important;">Processo de Entrega 🚚 </h4>
                                                    <span style="font-size:11px;"><?= $ship["munOrigem"] ?> / <?= $ship["ufOrigem"] ?> -> <?= $ship["munDestino"] ?> / <?= $ship["ufDestino"] ?> - Previsão de Entrega: <?= date("d/m/Y", strtotime($ship["previsaoEntrega"])) ?> </span>
                                                    <br />
                                                    <h6>
                                                        <span class="badge badge-light-success mb-1">NF-e <?= $ship["nfe"] ?></span>
                                                        <span class="badge badge-light-info mb-1"><?= $ship["status"] ?></span>
                                                        <span class="badge badge-light-danger mb-1">JAMEF</span>
                                                    </h6>
                                                    <div class="progress">
                                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 15%" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100">
                                                            Enviado
                                                        </div>
                                                        <div class="progress-bar bg-info" role="progressbar" style="width: 35%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">
                                                            Em Transporte
                                                        </div>
                                                        <div class="progress-bar bg-primary" role="progressbar" style="width: 35%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                            Rota de Entrega
                                                        </div>
                                                        <div class="progress-bar bg-success" role="progressbar" style="width: 15%" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100">
                                                            Entregue
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        <?php endif; ?>
                                    <?php }; ?>
                                <?php endif; ?>
                            <?php }; ?>

                            <?php if ($preferences["prj_ong"] > 0) : ?>
                                <div class="row">
                                    <div class="col-12">
                                        <?php $contProjects = 0; ?>
                                        <?php foreach ($projects["data"] as $project) { ?>
                                            <?php if (($contProjects == 0) && ($project["id"] != 0)) { ?>
                                                <?php $contProjects++; ?>
                                                <div class="row">
                                                    <div class="card" style="width:98%;margin:1%;margin-top:0px; margin-bottom:0px;padding:20px;" id="bodyRequestProject">
                                                        <div class="row">
                                                            <h4>Projeto <?= $project["number"] ?></h4>

                                                        </div>
                                                        <div class="row">

                                                            <div style="margin-top:5px; margin-bottom:5px; text-align:left;margin-left:1%; border-radius:20px; width:98%;" id="bodylightProject">

                                                                <div class="wrapper">
                                                                    <nav class="stepper">
                                                                        <ul class="stepper__list">
                                                                            <li class="stepper__list__item ">
                                                                                <svg class="stepper__list__icon" id="done" viewbox="0 0 24 24">
                                                                                    <path class="st0" d="M12 20c4.4 0 8-3.6 8-8s-3.6-8-8-8-8 3.6-8 8 3.6 8 8 8zm0 1.5c-5.2 0-9.5-4.3-9.5-9.5S6.8 2.5 12 2.5s9.5 4.3 9.5 9.5-4.3 9.5-9.5 9.5z">
                                                                                    </path>
                                                                                    <path class="st0" d="M11.1 12.9l-1.2-1.1c-.4-.3-.9-.3-1.3 0-.3.3-.4.8-.1 1.1l.1.1 1.8 1.6c.1.1.4.3.7.3.2 0 .5-.1.7-.3l3.6-4.1c.3-.3.4-.8.1-1.1l-.1-.1c-.4-.3-1-.3-1.3 0l-3 3.6z">
                                                                                    </path>
                                                                                </svg>
                                                                                <span class="stepper__list__title" id="done">1.
                                                                                    Pedido
                                                                                    Aprovado</span>
                                                                            </li>

                                                                            <li class="stepper__list__item ">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" id="<?php if (($project["stage"] >= 1) && ($project["stage"] < 2)) {
                                                                                                                                echo "current";
                                                                                                                            } else {
                                                                                                                                echo "done";
                                                                                                                            } ?>" width="16" height="16" fill="currentColor" class="stepper__list__icon stepper__list__icon--current bi bi-cash-coin" viewBox="0 0 16 16">
                                                                                    <path fill-rule="evenodd" d="M11 15a4 4 0 1 0 0-8 4 4 0 0 0 0 8zm5-4a5 5 0 1 1-10 0 5 5 0 0 1 10 0z" />
                                                                                    <path d="M9.438 11.944c.047.596.518 1.06 1.363 1.116v.44h.375v-.443c.875-.061 1.386-.529 1.386-1.207 0-.618-.39-.936-1.09-1.1l-.296-.07v-1.2c.376.043.614.248.671.532h.658c-.047-.575-.54-1.024-1.329-1.073V8.5h-.375v.45c-.747.073-1.255.522-1.255 1.158 0 .562.378.92 1.007 1.066l.248.061v1.272c-.384-.058-.639-.27-.696-.563h-.668zm1.36-1.354c-.369-.085-.569-.26-.569-.522 0-.294.216-.514.572-.578v1.1h-.003zm.432.746c.449.104.655.272.655.569 0 .339-.257.571-.709.614v-1.195l.054.012z" />
                                                                                    <path d="M1 0a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h4.083c.058-.344.145-.678.258-1H3a2 2 0 0 0-2-2V3a2 2 0 0 0 2-2h10a2 2 0 0 0 2 2v3.528c.38.34.717.728 1 1.154V1a1 1 0 0 0-1-1H1z" />
                                                                                    <path d="M9.998 5.083 10 5a2 2 0 1 0-3.132 1.65 5.982 5.982 0 0 1 3.13-1.567z" />
                                                                                </svg>
                                                                                <span class="stepper__list__title" id="<?php if (($project["stage"] >= 1) && ($project["stage"] < 2)) {
                                                                                                                            echo "current";
                                                                                                                        } else {
                                                                                                                            echo "done";
                                                                                                                        } ?>">2.
                                                                                    Faturado</span>
                                                                            </li>


                                                                            <li class="stepper__list__item ">
                                                                                <svg class="stepper__list__icon stepper__list__icon--current" xmlns="http://www.w3.org/2000/svg" id="<?php if (($project["stage"] >= 3) && ($project["stage"] < 9)) {
                                                                                                                                                                                            echo "current";
                                                                                                                                                                                        } elseif ($project["stage"] < 3) {
                                                                                                                                                                                            echo "pending";
                                                                                                                                                                                        } else {
                                                                                                                                                                                            echo "done";
                                                                                                                                                                                        } ?>" width="16" height="16" fill="currentColor" class="bi bi-truck" viewBox="0 0 16 16">
                                                                                    <path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h9A1.5 1.5 0 0 1 12 3.5V5h1.02a1.5 1.5 0 0 1 1.17.563l1.481 1.85a1.5 1.5 0 0 1 .329.938V10.5a1.5 1.5 0 0 1-1.5 1.5H14a2 2 0 1 1-4 0H5a2 2 0 1 1-3.998-.085A1.5 1.5 0 0 1 0 10.5v-7zm1.294 7.456A1.999 1.999 0 0 1 4.732 11h5.536a2.01 2.01 0 0 1 .732-.732V3.5a.5.5 0 0 0-.5-.5h-9a.5.5 0 0 0-.5.5v7a.5.5 0 0 0 .294.456zM12 10a2 2 0 0 1 1.732 1h.768a.5.5 0 0 0 .5-.5V8.35a.5.5 0 0 0-.11-.312l-1.48-1.85A.5.5 0 0 0 13.02 6H12v4zm-9 1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm9 0a1 1 0 1 0 0 2 1 1 0 0 0 0-2z" />
                                                                                </svg>
                                                                                <span class="stepper__list__title" id="<?php if (($project["stage"] >= 3) && ($project["stage"] < 9)) {
                                                                                                                            echo "current";
                                                                                                                        } elseif ($project["stage"] < 3) {
                                                                                                                            echo "pending";
                                                                                                                        } else {
                                                                                                                            echo "done";
                                                                                                                        } ?>">3.
                                                                                    Entrega</span>
                                                                            </li>

                                                                            <?php if ($project["inbound"] != 3) : ?>
                                                                                <li class="stepper__list__item stepper__list__item--current">
                                                                                    <svg class="stepper__list__icon stepper__list__icon--current" id="<?php if (($project["stage"] >= 9) && ($project["stage"] < 19)) {
                                                                                                                                                            echo "current";
                                                                                                                                                        } elseif ($project["stage"] < 9) {
                                                                                                                                                            echo "pending";
                                                                                                                                                        } else {
                                                                                                                                                            echo "done";
                                                                                                                                                        } ?>" width="24" height="24" viewbox="0 0 24 24">
                                                                                        <path d="M12.2 20a8 8 0 1 0 0-16 8 8 0 0 0 0 16zm0 1.377a9.377 9.377 0 1 1 0-18.754 9.377 9.377 0 0 1 0 18.754zm-4-8a1.377 1.377 0 1 1 0-2.754 1.377 1.377 0 0 1 0 2.754zm4 0a1.377 1.377 0 1 1 0-2.754 1.377 1.377 0 0 1 0 2.754zm4 0a1.377 1.377 0 1 1 0-2.754 1.377 1.377 0 0 1 0 2.754z" fill="#00BDD5 " fill-rule="evenodd"></path>
                                                                                    </svg><a><span class="stepper__list__title" id="<?php if (($project["stage"] >= 9) && ($project["stage"] < 19)) {
                                                                                                                                        echo "current";
                                                                                                                                    } elseif ($project["stage"] < 9) {
                                                                                                                                        echo "pending";
                                                                                                                                    } else {
                                                                                                                                        echo "done";
                                                                                                                                    } ?>">4.
                                                                                            Instalação</span></a>
                                                                                </li>


                                                                                <li class="stepper__list__item stepper__list__item--pending">
                                                                                    <svg class="stepper__list__icon stepper__list__icon--current" xmlns="http://www.w3.org/2000/svg" id="<?php if (($project["stage"] >= 40) && ($project["stage"] < 45)) {
                                                                                                                                                                                                echo "current";
                                                                                                                                                                                            } elseif ($project["stage"] < 40) {
                                                                                                                                                                                                echo "pending";
                                                                                                                                                                                            } else {
                                                                                                                                                                                                echo "done";
                                                                                                                                                                                            } ?>" width="16" height="16" fill="currentColor" class="bi bi-mortarboard" viewBox="0 0 16 16">
                                                                                        <path d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5ZM8 8.46 1.758 5.965 8 3.052l6.242 2.913L8 8.46Z" />
                                                                                        <path d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Zm-.068 1.873.22-.748 3.496 1.311a.5.5 0 0 0 .352 0l3.496-1.311.22.748L8 12.46l-3.892-1.556Z" />
                                                                                    </svg><span class="stepper__list__title" id="<?php if (($project["stage"] >= 40) && ($project["stage"] < 45)) {
                                                                                                                                        echo "current";
                                                                                                                                    } elseif ($project["stage"] < 40) {
                                                                                                                                        echo "pending";
                                                                                                                                    } else {
                                                                                                                                        echo "done";
                                                                                                                                    } ?>">5.
                                                                                        Treinamento</span>
                                                                                </li>
                                                                            <?php endif; ?>

                                                                            <li class="stepper__list__item stepper__list__item--pending">
                                                                                <svg class="stepper__list__icon stepper__list__icon--current" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-star-half" id="<?php if (($project["stage"] >= 50) && ($project["stage"] < 99)) {
                                                                                                                                                                                                                                                            echo "current";
                                                                                                                                                                                                                                                        } elseif ($project["stage"] < 50) {
                                                                                                                                                                                                                                                            echo "pending";
                                                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                                                            echo "done";
                                                                                                                                                                                                                                                        } ?>" viewBox="0 0 16 16">
                                                                                    <path d="M5.354 5.119 7.538.792A.516.516 0 0 1 8 .5c.183 0 .366.097.465.292l2.184 4.327 4.898.696A.537.537 0 0 1 16 6.32a.548.548 0 0 1-.17.445l-3.523 3.356.83 4.73c.078.443-.36.79-.746.592L8 13.187l-4.389 2.256a.52.52 0 0 1-.146.05c-.342.06-.668-.254-.6-.642l.83-4.73L.173 6.765a.55.55 0 0 1-.172-.403.58.58 0 0 1 .085-.302.513.513 0 0 1 .37-.245l4.898-.696zM8 12.027a.5.5 0 0 1 .232.056l3.686 1.894-.694-3.957a.565.565 0 0 1 .162-.505l2.907-2.77-4.052-.576a.525.525 0 0 1-.393-.288L8.001 2.223 8 2.226v9.8z" />
                                                                                </svg><span class="stepper__list__title" id="<?php if (($project["stage"] >= 50) && ($project["stage"] < 99)) {
                                                                                                                                    echo "current";
                                                                                                                                } elseif ($project["stage"] < 50) {
                                                                                                                                    echo "pending";
                                                                                                                                } else {
                                                                                                                                    echo "done";
                                                                                                                                } ?>">6.
                                                                                    Feedback</span>
                                                                            </li>

                                                                        </ul>
                                                                    </nav>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                                <div style="text-align:left;border-radius:20px; padding:20px;padding-bottom:10px; margin-top:10px;" id="bodylightProject">
                                                                    <h6><span style="margin-right:30px;">Status:</span>
                                                                        <?php
                                                                        switch ($project["stage"]) {
                                                                            case 1:
                                                                                echo "<span style='font-weight:600 !important;color: #00BDD5 !important;'> Pendente de faturamento</span>";
                                                                                break;
                                                                            case 2:
                                                                                echo "<span style='font-weight:600 !important;color: #00BDD5 !important;'> Faturado</span>";
                                                                                break;
                                                                            case 3:
                                                                                echo "<span style='font-weight:600 !important;color: #00BDD5 !important;'> Envio Iniciado</span>";
                                                                                break;
                                                                            case 4:
                                                                                echo "<span style='font-weight:600 !important;color: #3CB371 !important;'> Na transportadora (Rastreavel)</span>";
                                                                                break;
                                                                            case 5:
                                                                                echo "<span style='font-weight:600 !important;color: #3CB371 !important;'> Na transportadora (Não Rastreavel) </span>";
                                                                                break;
                                                                            case 9:
                                                                                echo "<span style='font-weight:600 !important;color: #3CB371 !important;'> Entregue</span>";
                                                                                break;
                                                                            case 10:
                                                                                echo "<span style='font-weight:600 !important;color: #00BDD5 !important;'> Em alinhamento de Instalação</span>";
                                                                                break;
                                                                            case 11:
                                                                                echo "<span style='font-weight:600 !important;color: #00BDD5 !important;'> Instalação Física Agendada</span>";
                                                                                break;
                                                                            case 12:
                                                                                echo "<span style='font-weight:600 !important;color: #3CB371 !important;'> Instalação Física Realizada</span>";
                                                                                break;
                                                                            case 13:
                                                                                echo "<span style='font-weight:600 !important;color: #00BDD5 !important;'> Configuração Agendada</span>";
                                                                                break;
                                                                            case 19:
                                                                                echo "<span style='font-weight:600 !important;color: #3CB371 !important;'> Configuração Concluída</span>";
                                                                                break;
                                                                            case 40:
                                                                                echo "<span style='font-weight:600 !important;color: #00BDD5 !important;'> Treinamento Agendado</span>";
                                                                                break;
                                                                            case 45:
                                                                                echo "<span style='font-weight:600 !important;color: #3CB371 !important;'> Treinamento Realizado</span>";
                                                                                break;
                                                                            case 50:
                                                                                echo "<span style='font-weight:600 !important;color: #DC143C !important;'> Aguardando Feedback</span>";
                                                                                break;
                                                                            case 99:
                                                                                echo "<span style='font-weight:600 !important;color: #3CB371 !important;'> Concluído</span>";
                                                                                break;

                                                                            default:
                                                                                echo "<span style='font-weight:600 !important;color: #DC143C !important;'> Cancelado</span>";
                                                                                break;
                                                                        }

                                                                        ?>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                                                <div style="text-align:left;border-radius:20px;  padding:20px;padding-bottom:10px;margin-top:10px;border:2px solid ;">
                                                                    <a href="<?= Config::BASE_URL ?>inbound/<?= $project["number"] ?>">
                                                                        <h6 style="font-weight:bold;">Ver Processo</h6>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                                                                <div style="text-align:left;border-radius:20px;  padding:20px;padding-bottom:10px;margin-top:10px;border:2px solid ;">
                                                                    <a href="<?= Config::BASE_URL ?>company-projects">
                                                                        <h6 style="font-weight:bold;">Todos os Processos</h6>
                                                                    </a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <br />




                                            <?php }; ?>
                                        <?php }; ?>
                                    </div>
                                </div>
                            <?php endif; ?>
                            <!-- <h1 style="font-weight:500; color: #70a991 !important;">Painel Master </h1> -->

                            <!-- <section id="knowledge-base-content" style="margin-top:0px;"> -->
                            <div class="row kb-search-content-info match-height">
                                <!-- email -->
                                <div class="col-md-4 col-sm-6 col-12 kb-search-content">
                                    <div class="card">
                                        <a href="<?= Config::BASE_URL .  "company-tickets" ?>">

                                            <div class="card-body text-left">
                                                <h4><?= __("dashboard_admin.top_cards.meus_chamados") ?><i class="bi bi-chevron-right" style="right:10px;position:absolute;margin-top:15px;"></i></h4>
                                                <p class=" mt-0 mb-0"><?= __("dashboard_admin.top_cards.meus_chamados_desc") ?>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-6 col-12 kb-search-content">
                                    <div class="card">
                                        <a href="<?= Config::BASE_URL .  "admin-request" ?>">
                                            <div class="card-body text-left">
                                                <h4><?= __("dashboard_admin.top_cards.abrir_chamado") ?><i class="bi bi-chevron-right" style="right:10px;position:absolute;margin-top:15px;"></i></h4>
                                                <p class=" mt-0 mb-0"><?= __("dashboard_admin.top_cards.abrir_chamado_desc") ?>
                                                </p>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <br />
                                <!-- personalization -->
                                <div class="col-md-4 col-sm-6 col-12 kb-search-content">
                                    <div class="card">
                                        <a href="<?= Config::BASE_URL . "rooms/" . $_SESSION["company_identifier"] ?>">

                                            <div class="card-body text-left">
                                                <h4><?= __("dashboard_admin.top_cards.salas") ?><i class="bi bi-chevron-right" style="right:10px;position:absolute;margin-top:15px;"></i></h4>
                                                <p class=" mt-0 mb-0"><?= __("dashboard_admin.top_cards.salas_desc") ?></p>
                                            </div>
                                        </a>
                                    </div>
                                </div>


                                <!-- LOGO DA EMPRESA -->
                                <?php if ($preferences["logo_emp"] > 0) : ?>
                                    <div class="col-md-<?= $preferences["logo_emp"] * 4 ?> col-sm-6 col-12 kb-search-content">
                                        <div class="card" style="    
                                                        width: 100%;
                                                        background-color: <?= $myCompany["com_color"] ?> !important;
                                                        background-position: center;
                                                        display: flex;
                                                        justify-content: center;
                                                        align-items: center;">
                                            <img style="width:60%; justify-content:center;text-align:center; padding:30px;" src="<?= $myCompany["com_logo"] ?>" alt="us">

                                        </div>
                                    </div>
                                <?php endif; ?>

                                <!-- GRAFICO DE ACESSOS OU ULTIMAS COMPRAS -->
                                <?php if ($preferences["ult_com"] > 0) : ?>

                                    <div class="col-md-<?= $preferences["ult_com"] * 4 ?> col-sm-12 col-12 kb-search-content">
                                        <!--    SE TEM VENDAS -->
                                        <?php if ($sales != "[]") { ?>
                                            <div class="card" style="padding:20px;">
                                                <h4>Últimas Compras <a href="<?= Config::BASE_URL . 'company-sales' ?>" class="btn btn-outline-info " style="float:right; font-size:12px; padding:10px !important;">Ver Todas</a></h4>
                                                <br />
                                                <?php $cont = 0; ?>
                                                <?php foreach (json_decode($sales) as $sale) { ?>
                                                    <?php $cont++; ?>
                                                    <?php if ($cont == 1) { ?>

                                                        <!-- mb_strimwidth($sale->name, 0, 30, "...") -->
                                                        <a target="_blank" href="<?= Config::BASE_URL . 'company-sale/' . $sale->deal . '?sale=' . $sale->name ?>">

                                                            <div class="card" style="padding:20px; padding-bottom:10px; margin-bottom:10px;" id="bodyRequestDash">
                                                                <h5 style="font-weight:700 !important;"> Pedido <?= $sale->deal ?><?php if ($sale->stage == "40015047") : ?><span class="badge rounded-pill badge-light-success" style="float:right; font-size:11px;">Concluído</span><?php elseif (($sale->stage == "40015046") || ($sale->stage == "40015045")) : ?><span class="badge rounded-pill badge-light-info" style="float:right; font-size:11px;">Aberto</span><?php else : ?><span class="badge rounded-pill badge-light-warning" style="float:right; font-size:11px;">Registrado</span><?php endif; ?><span class="badge rounded-pill badge-light-info me-1" style="font-size:11px;float:right;">Mais Recente</span></h5>
                                                                <span style="font-size:12px;">Vendedor: <?= $sale->seller ?> | Data: <?= $sale->date ?> </span>

                                                                <div class="card mt-1 p-2">
                                                                    <span><strong> Status de Entrega: </strong> <?php if ($sale->stage == "40015045") : ?>Pedido Recebido / Andamento<?php elseif ($sale->stage == "40015046") : ?>Produtos na transportadora<?php elseif ($sale->stage == "40015047") : ?>Produtos Entregues<?php else : ?>Indefinido<?php endif; ?></span>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    <?php }; ?>
                                                    <?php if (($cont > 1) && ($cont < 6)) { ?>
                                                        <a target="_blank" href="<?= Config::BASE_URL . 'company-sale/' . $sale->deal . '?sale=' . $sale->name ?>">
                                                            <div class="card" style="padding:20px; padding-bottom:10px; margin-bottom:10px;" id="bodyRequestDash">
                                                                <h6 style="font-weight:700 !important;"> Pedido <?= $sale->ploomes_order ?>
                                                                    <?php if ($sale->stage == "40015047") : ?><span class="badge rounded-pill badge-light-success" style="float:right; font-size:11px;">Concluído</span><?php elseif (($sale->stage == "40015046") || ($sale->stage == "40015045")) : ?><span class="badge rounded-pill badge-light-info" style="float:right; font-size:11px;">Aberto</span><?php else : ?><span class="badge rounded-pill badge-light-warning" style="float:right; font-size:11px;">Registrado</span><?php endif; ?><span class="badge rounded-pill badge-light-info me-1" style="font-size:11px;float:right;"><?= $sale->date ?></span>
                                                                </h6>
                                                            </div>
                                                        </a>
                                                    <?php }; ?>
                                                    <?php if ($cont > 5) {
                                                        break;
                                                    } ?>

                                                <?php }; ?>
                                            </div>
                                        <?php } else { ?>
                                            <!--    SE NÃO TEM VENDAS -->
                                            <div class="card" style="padding:10px;">
                                                <div style="margin-top:20px; margin-bottom:20px; text-align:left;margin-left:10px;">
                                                    <h5><?= __("dashboard_admin.grafico") ?></h5>
                                                    <br />
                                                    <div id="chartLogins"></div>
                                                </div>
                                            </div>

                                        <?php }; ?>


                                    </div>
                                    <!-- </div> -->
                                <?php endif; ?>

                                <!-- acessos rapidos -->
                                <div class="col-md-4 col-sm-12 col-12 kb-search-content">
                                    <div class="row">
                                        <div class="card" style="width:94%; margin-left:3%;">
                                            <a href="<?= Config::BASE_URL .  "company-settings" ?>">

                                                <div class="card-body text-left">
                                                    <h4><?= __("dashboard_admin.bottom_cards.config") ?><i class="bi bi-chevron-right" style="right:10px;position:absolute;margin-top:15px;"></i></h4>
                                                    <p class=" mt-0 mb-0"  style="font-size:12px;"><?= __("dashboard_admin.bottom_cards.config_desc") ?>
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="card" style="width:94%; margin-left:3%;">
                                            <a href="<?= Config::BASE_URL . "company-inventory" ?>">
                                                <div class="card-body text-left">
                                                    <h4>Inventário da empresa<i class="bi bi-chevron-right" style="right:10px;position:absolute;margin-top:15px;"></i></h4>
                                                    <p class=" mt-0 mb-0" style="font-size:12px;">Veja a relação de equipamentos da empresa
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="card" style=" width:94%; margin-left:3%;">
                                            <a href="<?= Config::BASE_URL .  "item-management" ?>">
                                                <div class="card-body text-left">
                                                    <h4>Itens de Inventário<i class="bi bi-chevron-right" style="right:10px;position:absolute;margin-top:15px;"></i></h4>
                                                    <p class=" mt-0 mb-0" style="font-size:12px;">Cadastre e atualize seus equipamentos por serial number
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="card" style=" width:94%; margin-left:3%;">
                                            <a href="<?= Config::BASE_URL .  "company-logs" ?>">
                                                <div class="card-body text-left">
                                                    <h4><?= __("dashboard_admin.bottom_cards.logs") ?><i class="bi bi-chevron-right" style="right:10px;position:absolute;margin-top:15px;"></i></h4>
                                                    <p class=" mt-0 mb-0" style="font-size:12px;"><?= __("dashboard_admin.bottom_cards.logs_desc") ?>
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="card" style="margin-bottom:13px;width:94%; margin-left:3%;">
                                            <a href="<?= Config::BASE_URL . "list-rooms" ?>">
                                                <div class="card-body text-left">
                                                    <h4><?= __("dashboard_admin.bottom_cards.materiais") ?><i class="bi bi-chevron-right" style="right:10px;position:absolute;margin-top:15px;"></i></h4>
                                                    <p class=" mt-0 mb-0"  style="font-size:12px;">
                                                        <?= __("dashboard_admin.bottom_cards.materiais_desc") ?>
                                                    </p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <!-- chamados com a wetalk -->
                                <?php if ($preferences["cha_wet"] > 0) : ?>
                                    <div class="col-md-<?= $preferences["cha_wet"] * 4 ?> col-sm-6 col-12 kb-search-content">
                                        <div class="card mb-1" style="padding:10px;padding-top:0px;  height:500px !important;overflow-y:auto; ">
                                            <div class="card-body text-left mt-0">
                                                <h3>
                                                    <?= __("dashboard_admin.chamados_wetalk") ?></h3>
                                                <p class="mt-1 mb-0" style="color:gray;">
                                                    <?= __("dashboard_admin.chamados_wetalk_desc") ?></p>

                                                <div class="row" style="margin-top:20px;">

                                                    <?php if (mysqli_num_rows($tickets) > 0) : ?>
                                                        <?php while ($ticket = mysqli_fetch_assoc($tickets)) : ?>
                                                            <a target="_blank" href="<?= Config::BASE_URL ?>request/<?= $ticket["tkt_identifier"] ?>">
                                                                <div class="card mb-1" style=" width:100%;padding:20px;" id="bodyRequestDash">
                                                                    <div class="row ">
                                                                        <h5 style="margin-bottom:10px;justify-content:left;text-align:left;">
                                                                            <?= $ticket["tkt_title"] ?></h5>
                                                                        <h6 style="margin-bottom:10px;justify-content:left;text-align:left; font-size:12px;">
                                                                            <?= $ticket["tkt_number"] ?>

                                                                            -
                                                                            <?php $timestamp = strtotime($ticket["tkt_created_at"]);
                                                                            $formatted_date = date("d/m/y \à\s H:i", $timestamp);
                                                                            echo $formatted_date; ?>

                                                                        </h6>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div style="justify-content:left;text-align:left;">
                                                                            <?php if ($ticket["tkt_urgency"] == 0) : ?>
                                                                                <span class="badge rounded-pill badge-light-dark"><?= __("request.informacoes.status_urgencia.0") ?></span>
                                                                            <?php elseif ($ticket["tkt_urgency"] == 1) : ?>
                                                                                <span class="badge rounded-pill badge-light-info"><?= __("request.informacoes.status_urgencia.1") ?></span>
                                                                            <?php elseif ($ticket["tkt_urgency"] == 2) : ?>
                                                                                <span class="badge rounded-pill badge-light-info"><?= __("request.informacoes.status_urgencia.2") ?></span>
                                                                            <?php elseif ($ticket["tkt_urgency"] == 3) : ?>
                                                                                <span class="badge rounded-pill badge-light-secondary"><?= __("request.informacoes.status_urgencia.3") ?></span>
                                                                            <?php elseif ($ticket["tkt_urgency"] == 4) : ?>
                                                                                <span class="badge rounded-pill badge-light-warning"><?= __("request.informacoes.status_urgencia.4") ?></span>
                                                                            <?php elseif ($ticket["tkt_urgency"] == 5) : ?>
                                                                                <span class="badge rounded-pill badge-light-warning"><?= __("request.informacoes.status_urgencia.5") ?></span>
                                                                            <?php elseif ($ticket["tkt_urgency"] == 6) : ?>
                                                                                <span class="badge rounded-pill badge-light-danger"><?= __("request.informacoes.status_urgencia.6") ?></span>
                                                                            <?php else : ?>
                                                                                <span class="badge rounded-pill badge-light-dark"><?= __("request.informacoes.status_urgencia.default") ?>
                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </a>

                                                        <?php endwhile; ?>
                                                    <?php else : ?>
                                                        <h5><?= __("dashboard_admin.nenhum_chamado") ?></h5>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>




                                <!-- chamados empresa -->
                                <?php if ($preferences["cha_int"] > 0) : ?>

                                    <div class="col-md-<?= $preferences["cha_int"] * 4 ?> col-sm-6 col-12 kb-search-content">
                                        <div class="card mb-1" style="padding:10px;padding-top:0px;  height:500px !important; overflow-y:auto;">
                                            <div class="card-body text-left mt-0">
                                                <h3>
                                                    <?= __("dashboard_admin.chamados_empresa") ?><?= $myCompany["com_name"] ?></h3>
                                                <p class="mt-1 mb-0" style="color:gray;">
                                                    <?= __("dashboard_admin.chamados_empresa_desc") ?></p>

                                                <div class="row" style="margin-top:20px;">
                                                    <?php if (mysqli_num_rows($ticketsInternal) > 0) : ?>
                                                        <?php while ($ticketI = mysqli_fetch_assoc($ticketsInternal)) : ?>
                                                            <a target="_blank" href="<?= Config::BASE_URL ?>request/<?= $ticketI["tkt_identifier"] ?>">
                                                                <div class="card mb-1" style=" width:100%;padding:20px;" id="bodyRequestDash">
                                                                    <div class="row ">
                                                                        <h5 style="margin-bottom:10px;justify-content:left;text-align:left;">
                                                                            <?= $ticketI["tkt_title"] ?></h5>
                                                                        <h6 style="margin-bottom:10px;justify-content:left;text-align:left; font-size:12px;">
                                                                            <?= $ticketI["tkt_number"] ?>

                                                                            -
                                                                            <?php $timestamp = strtotime($ticketI["tkt_created_at"]);
                                                                            $formatted_date = date("d/m/y \à\s H:i", $timestamp);
                                                                            echo $formatted_date; ?>

                                                                        </h6>
                                                                    </div>
                                                                    <div class="row">
                                                                        <div style="justify-content:left;text-align:left;">
                                                                            <?php if ($ticketI["tkt_urgency"] == 0) : ?>
                                                                                <span class="badge rounded-pill badge-light-dark"><?= __("request.informacoes.status_urgencia.0") ?></span>
                                                                            <?php elseif ($ticketI["tkt_urgency"] == 1) : ?>
                                                                                <span class="badge rounded-pill badge-light-info"><?= __("request.informacoes.status_urgencia.1") ?></span>
                                                                            <?php elseif ($ticketI["tkt_urgency"] == 2) : ?>
                                                                                <span class="badge rounded-pill badge-light-info"><?= __("request.informacoes.status_urgencia.2") ?></span>
                                                                            <?php elseif ($ticketI["tkt_urgency"] == 3) : ?>
                                                                                <span class="badge rounded-pill badge-light-secondary"><?= __("request.informacoes.status_urgencia.3") ?></span>
                                                                            <?php elseif ($ticketI["tkt_urgency"] == 4) : ?>
                                                                                <span class="badge rounded-pill badge-light-warning"><?= __("request.informacoes.status_urgencia.4") ?></span>
                                                                            <?php elseif ($ticketI["tkt_urgency"] == 5) : ?>
                                                                                <span class="badge rounded-pill badge-light-warning"><?= __("request.informacoes.status_urgencia.5") ?></span>
                                                                            <?php elseif ($ticketI["tkt_urgency"] == 6) : ?>
                                                                                <span class="badge rounded-pill badge-light-danger"><?= __("request.informacoes.status_urgencia.6") ?></span>
                                                                            <?php else : ?>
                                                                                <span class="badge rounded-pill badge-light-dark"><?= __("request.informacoes.status_urgencia.default") ?>
                                                                                </span>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </a>

                                                        <?php endwhile; ?>
                                                    <?php else : ?>
                                                        <h5><?= __("dashboard_admin.nenhum_chamado") ?></h5>
                                                    <?php endif; ?>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>





                                <!-- GRAFICO DE PUBLICAÇÕES -->
                                <?php if ($preferences["gra_pub"] > 0) : ?>


                                    <div class="col-md-<?= $preferences["gra_pub"] * 4 ?> col-sm-6 col-12 kb-search-content">

                                        <div class="card" style="padding:30px !important; padding-left:0px; height:500px !important;">
                                            <h3>
                                                Publicações Mais Vistas</h3>
                                            <p class="mb-0" style="color:gray;">
                                                Estas são as pulicações em alta em sua empresa</p>

                                            <div style="margin-top:20px; margin-bottom:20px; text-align:left;">

                                                <br />
                                                <div id="charVisualiza"></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif ?>
                                <!-- GRAFICO DE PUBLICAÇÕES -->
                                <?php if ($preferences["sal_mai"] > 0) : ?>


                                    <div class="col-md-<?= $preferences["sal_mai"] * 4 ?> col-sm-6 col-12 kb-search-content">

                                        <div class="card" style="padding:30px !important; padding-left:0px; height:500px !important;">
                                            <h3>
                                                Salas Mais Acessadas</h3>
                                            <p class="mb-0" style="color:gray;">
                                                Estas são as salas em alta em sua empresa</p>

                                            <div style="margin-top:20px; margin-bottom:20px; text-align:left;">

                                                <br />
                                                <div id="charMaioresRoomsTrinta"></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif ?>



                                <?php if ($preferences["top_pub"] > 0) : ?>

                                    <div class="col-md-<?= $preferences["top_pub"] * 4 ?> col-sm-6 col-12 kb-search-content">

                                        <div class="card " style="padding:10px;padding-top:0px; height:500px !important;">
                                            <div class="slide-container swiper ">
                                                <div class="slide-content swiper2">
                                                    <div class="card-wrapper swiper-wrapper">

                                                        <?php $cont = 0; ?>
                                                        <?php if (mysqli_num_rows($resultAlta) > 0) : ?>
                                                            <?php while ($contentAlta = mysqli_fetch_assoc($resultAlta)) : ?>
                                                                <?php if ($contentAlta["cnt_company"] == 9999) : ?>
                                                                    <?php if ($cont < 10) : ?>
                                                                        <?php $cont++; ?>



                                                                        <div class="card swiper-slide" id="cardSmaller" style="border-radius: 25px; background-color: #f8f8f8;">
                                                                            <div class="image-content">
                                                                                <span class="overlay" style="border-radius: 20px 20px 0px 0px !important;background-color:<?php if ($cont == 1) {
                                                                                                                                                                                echo "#e6cc4c";
                                                                                                                                                                            } elseif ($cont == 2) {
                                                                                                                                                                                echo "#d4d0bc";
                                                                                                                                                                            } elseif ($cont == 3) {
                                                                                                                                                                                echo "#bf8970";
                                                                                                                                                                            } else {
                                                                                                                                                                                echo "#544fe5";
                                                                                                                                                                            } ?>"></span>

                                                                                <div class="card-image">
                                                                                    <img style="z-index:2; border: 4px solid <?php if ($cont == 1) {
                                                                                                                                    echo "#e6cc4c";
                                                                                                                                } elseif ($cont == 2) {
                                                                                                                                    echo "#d4d0bc";
                                                                                                                                } elseif ($cont == 3) {
                                                                                                                                    echo "#bf8970";
                                                                                                                                } else {
                                                                                                                                    echo "#544fe5";
                                                                                                                                } ?>;" src="<?= $contentAlta["cnt_banner"] ?>" alt="" class="card-img">
                                                                                </div>
                                                                                <div class="row" style="height:25px">
                                                                                    <span style="bottom: 5%;left: 5%;font-size: 25px;position: absolute;color: white !important;"><?= $cont; ?>
                                                                                        º</span>
                                                                                </div>
                                                                            </div>

                                                                            <div class="card-content" style="align-items: left;">
                                                                                <div class="row" style="height:20px; ">
                                                                                    <?php if ($contentAlta["cnt_produto2"] == 1) : ?>
                                                                                        <span class="badge rounded-pill badge-light-info" style="width:60px;margin-left:30px; background-color: #0e72ed;padding-top:5px;"><span class="branco" style="color:white !important;">Zoom</span></span>
                                                                                    <?php elseif ($contentAlta["cnt_produto2"] == 2) : ?>
                                                                                        <span class="badge rounded-pill badge-light-info" style="width:60px; margin-left:30px; background-color: #4b53bc;padding-top:5px;"><span class="branco" style="color:white !important;">Teams</span></span>
                                                                                    <?php elseif ($contentAlta["cnt_produto2"] == 3) : ?>
                                                                                        <span class="badge rounded-pill badge-light-dark" style="width:60px; margin-left:30px; background-color: white;padding-top:5px;"><span style="color:gray !important;">Google</span></span>
                                                                                    <?php elseif ($contentAlta["cnt_produto2"] == 4) : ?>
                                                                                        <span class="badge rounded-pill badge-light-Success" style="width:60px;  margin-left:30px; background-color: black;padding-top:5px;"><span class="branco" style="color:white !important;"><?= __("dashboard_admin.publicacoes.geral") ?></span></span>
                                                                                    <?php else : ?>
                                                                                        <span class="badge rounded-pill badge-light-Success" style="width:60px;  margin-left:30px; background-color: black;padding-top:5px;"><span class="branco" style="color:white !important;"><?= __("dashboard_admin.publicacoes.geral") ?></span></span>
                                                                                    <?php endif; ?>
                                                                                    <?php if ($contentAlta["cnt_target"] == 2) : ?>
                                                                                        <span class="badge rounded-pill badge-light-info" style="width:60px;margin-left:5px; background-color: #65656587;padding-top:5px;"><span class="branco" style="color:white !important;">Tech</span>
                                                                                        <?php endif; ?>
                                                                                </div>
                                                                                <div class="row" style="height:80px;padding:20px;">
                                                                                    <p class="name"><?= $contentAlta["cnt_title"] ?></p>
                                                                                </div>
                                                                                <a id="cta" href='<?php echo Config::BASE_URL . 'player/' . $contentAlta['cnt_unique'] ?> ' style="border-radius:25px;margin:5%; margin-bottom:10px; width: 90%; padding: 5px; text-align: center; border-color: #5456572c;"><?= __("dashboard_admin.publicacoes.acessar") ?></a>
                                                                            </div>
                                                                        </div>
                                                                    <?php endif ?>
                                                                <?php endif ?>
                                                            <?php endwhile ?>

                                                        <?php else : ?>
                                                            <h5><?= __("dashboard_admin.publicacoes.nenhuma") ?></h5>
                                                        <?php endif ?>




                                                    </div>
                                                </div>

                                                <div class="swiper-button-next alta-next swiper-navBtn"></div>
                                                <div class="swiper-button-prev alta-prev swiper-navBtn"></div>
                                                <div class="swiper-pagination swiper-pagination2"></div>
                                            </div>
                                        </div>


                                    </div>
                                <?php endif ?>












                                <!-- </div> -->
                                <!-- </div> -->
                                <!-- END: Content-->
                                <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
                                <script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js'></script>
                                <script src='https://use.fontawesome.com/826a7e3dce.js'></script>
                                <script src="src/js/swiper-bundle.min.js"></script>

                                <script>
                                    var data = <?= $getCompanyMaioresRoomsTrinta ?>;
                                    // Cria o gráfico com os dados
                                    var options = {
                                        chart: {
                                            height: 300,
                                            type: 'bar',
                                        },
                                        series: [{
                                            name: 'Total de Acessos',
                                            data: data.map(function(d) {
                                                return d.total_acessos;
                                            }),
                                        }],
                                        xaxis: {
                                            categories: data.map(function(item) {
                                                return item.nome;
                                            })
                                        },
                                        plotOptions: {
                                            bar: {
                                                borderRadius: 4,
                                                horizontal: true,
                                            }
                                        },
                                        yaxis: {
                                            // title: {
                                            //     text: 'Salas Acessadas  (30 Dias)'
                                            // },
                                        },
                                        colors: [
                                            '<?php if ($myCompany["com_color"] != "#ffffff") {
                                                    echo $myCompany["com_color"];
                                                } else {
                                                    echo "#00BDD5";
                                                } ?>'
                                        ],
                                        // colors: ['#007aff'],
                                    };
                                    var chart = new ApexCharts(document.querySelector("#charMaioresRoomsTrinta"), options);
                                    chart.render();
                                </script>
                                <script>
                                    var swiper = new Swiper(".swiper2", {
                                        slidesPerView: 3,
                                        spaceBetween: 25,
                                        // autoplay: true,
                                        loop: false,
                                        centerSlide: 'false',
                                        fade: 'true',
                                        grabCursor: 'true',
                                        pagination: {
                                            el: ".swiper-pagination2",
                                            clickable: true,
                                            dynamicBullets: true,
                                        },
                                        navigation: {
                                            nextEl: ".alta-next",
                                            prevEl: ".alta-prev",
                                        },

                                        breakpoints: {
                                            0: {
                                                slidesPerView: 1.3,
                                            },
                                            650: {
                                                slidesPerView: 2,
                                            },
                                            950: {
                                                slidesPerView: 3,
                                            },
                                        },
                                    });
                                    // Dados dos acessos
                                    var data = <?= $getSystemLogins ?>;

                                    var options = {
                                        chart: {
                                            height: 280,
                                            type: 'area',
                                        },
                                        series: [{
                                            name: '<?= __("dashboard_admin.acessos") ?>',
                                            data: data.map(function(d) {
                                                return d.total_acessos;
                                            }),
                                        }],
                                        xaxis: {
                                            categories: data.map(function(item) {
                                                return item.dia + '/' + item.mes + '/' + item.ano;
                                            })
                                        },
                                        yaxis: {
                                            // title: {
                                            //     text: '<?= __("dashboard_admin.acessos") ?>'
                                            // },
                                        },
                                        colors: [
                                            '<?php if ($myCompany["com_color"] != "#ffffff") {
                                                    echo $myCompany["com_color"];
                                                } else {
                                                    echo "#00BDD5";
                                                } ?>'
                                        ],
                                        // colors: ['#007aff'],
                                    };

                                    var chart = new ApexCharts(document.querySelector("#chartLogins"), options);
                                    chart.render();
                                </script>

                                <script>
                                    // maiores postagens
                                    var data = <?= $getCompanyMaioresPostagens ?>;


                                    // Cria o gráfico com os dados
                                    var options = {
                                        chart: {
                                            height: 350,
                                            type: 'bar',
                                        },
                                        series: [{
                                            name: '<?= __("dashboard_admin.total_acessos") ?>',
                                            data: data.map(function(d) {
                                                return d.total_acessos;
                                            }),
                                        }],
                                        xaxis: {
                                            categories: data.map(function(item) {
                                                return item.nome;
                                            })
                                        },
                                        plotOptions: {
                                            bar: {
                                                borderRadius: 4,
                                                horizontal: true,
                                            }
                                        },
                                        yaxis: {
                                            // title: {
                                            //     text: '<?= __("dashboard_admin.acessadas") ?>'
                                            // },
                                        },
                                        colors: [
                                            '<?php if ($myCompany["com_color"] != "#ffffff") {
                                                    echo $myCompany["com_color"];
                                                } else {
                                                    echo "#00BDD5";
                                                } ?>'
                                        ],
                                        // colors: ['#007aff'],
                                    };

                                    var chart = new ApexCharts(document.querySelector("#charVisualiza"), options);
                                    chart.render();
                                </script>

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
        <?php endwhile; ?>
    <?php endif; ?>
<?php endif; ?>