<?php

use API\Controller\Config;
use API\Controller\User;

header('Cache-Control: private, max-age=3600, must-revalidate');

use const Siler\Config\CONFIG; ?>




    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>WeJourney</title>
        <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
        <link rel="shortcut icon" href="src/img/icone.ico" type="image/ico">
        <!-- <meta name="viewport" content="width=device-width, user-scalable=0" /> -->
        <meta name="description" content="WeJourney é uma solução completa e personalizada para gerenciamento de ativos, compras e salas, oferecendo suporte fácil e materiais sempre atualizados, tudo integrado em um ambiente amigável e eficiente. ">
        <meta name="keywords" content="WeJourney suporte Wetalk.it videoconferencia zoom teams logitech ">
        <meta name="author" content="Wetalk.it - Lucas Perussi, Curitiba 2023">
        <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>src/css/swiper-bundle.min.css">
        <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/css/bootstrap.min.css">
        <!-- <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>layout/app-assets/css/bootstrap-extended.css"> -->
        <link rel="stylesheet" type="text/css" href="<?= Config::BASE_URL ?>src/css/carousel.css">
        <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
        <link rel="stylesheet" href="<?= Config::BASE_URL ?>src/css/index-new.css">


          <!-- Open Graph / Facebook -->
          <meta property="og:type" content="website">
            <meta property="og:url" content="https://www.wejourney.com.br>">
            <meta property="og:title" content="Conheça o Wejourney!">
            <meta property="og:description" content="WeJourney é uma solução completa e personalizada para gerenciamento de ativos, compras e salas, oferecendo suporte fácil e materiais sempre atualizados, tudo integrado em um ambiente amigável e eficiente.">
            <meta property="og:image" content="<?= Config::BASE_URL ?>src/img/logo-banner.png">
            <!-- Twitter -->
            <meta property="twitter:card" content="summary_large_image">
            <meta property="twitter:url" content="https://www.wejourney.com.br/">
            <meta property="twitter:title" content="Conheça o WeJourney!">
            <meta property="twitter:description" content="WeJourney é uma solução completa e personalizada para gerenciamento de ativos, compras e salas, oferecendo suporte fácil e materiais sempre atualizados, tudo integrado em um ambiente amigável e eficiente.">
            <meta property="twitter:image" content="<?= Config::BASE_URL ?>src/img/logo-banner.png">
        <!-- <link rel="stylesheet" href="<?= Config::BASE_URL ?>src/css/index-important.css"> -->


    </head>


    <body class="mobile">
        <nav>
            <div class="container-fluid nav-wrapper" style="height:75px !important;z-index:999 !important;">
                <div class="brand">
                    <a href="<?=Config::BASE_URL?>">
                        <img src="<?= Config::BASE_URL ?>src/img/logo/logo-ufpr.svg" style="max-height:55px" alt="Logo">
                    </a>
                </div>
                <div class="hamburger">
                    <span></span>
                    <span id="midSpan"></span>
                    <span></span>
                </div>
                <style>
                    .background-div {
                        height: 400px;
                        width: 100%;
                        /* display: ruby-text !important;            */
                        align-items: center;
                        justify-content: center;
                        /* filter: grayscale(100%); */
                        background-color: #001011;
                        /* background-image: url('<?= Config::BASE_URL ?>src/img/ufpr.jpg'); */
                        background-size: cover;
                        background-position: center;
                    }
                </style>
                <ul class="nav-list">
                    <li id="cardTop">
                        <a id="menuOptions" onclick="expandSpace()"><span id="subBtn">Recursos <i class="bi bi-chevron-down"></i></span></a>
                        <ul class="dropdown-list" id="space">
                            <li><a href="<?= Config::BASE_URL . 'my-requests' ?>">Gestão de chamados</a></li>
                            <li><a href="<?= Config::BASE_URL . 'blog' ?>">Vídeos educativos </a></li>
                        </ul>
                        <!-- <a id="menuOptions" class="dropdown-toggle" onclick="expandSpace()"><span id="subBtn">Recursos <i class="bi bi-chevron-down"></i></span></a>

                        <ul class="dropdown-list" id="resource">
                            <li><a href="<?= Config::BASE_URL . 'my-requests' ?>">Gestão de chamados</a></li>
                            <li><a href="<?= Config::BASE_URL . 'blog' ?>">Vídeos educativos </a></li>
                        </ul> -->
                    </li>
                    <li id="card">
                        <a id="menuOptions" onclick="expandSpace()"><span id="subBtn">Meu Espaço <i class="bi bi-chevron-down"></i></span></a>
                        <ul class="dropdown-list" id="space">
                            <li><a href="<?= Config::BASE_URL . 'dashboard' ?>" id="subMenu">Painel Principal</a></li>
                            <li><a href="<?= Config::BASE_URL . 'blog' ?>" id="subMenu">Artigos</a></li>
                            <!-- <li><a href="<?= Config::BASE_URL . '' ?>" id="subMenu">FAQ</a></li> -->
                            <li><a href="<?= Config::BASE_URL . 'dashboard' ?>" id="subMenu">Salas</a></li>
                            <li><a href="<?= Config::BASE_URL . 'badges' ?>" id="subMenu">Conquistas</a></li>
                            <li><a href="<?= Config::BASE_URL . 'collegues' ?>" id="subMenu">Colegas</a></li>
                            <li><a href="<?= Config::BASE_URL . 'settings' ?>" id="subMenu">Configurações</a></li>
                        </ul>
                    </li>
                    <li id="card">
                        <a href="#" id="menuOptions"><span id="subBtn">Novidades</span></a>
                    </li>
                    <li id="card"><a href="#" id="menuOptions"><span id="subBtn">FAQ</a></span></li>
                    <li id="card"><a href="#" id="menuOptions"><span id="subBtn">Soluções</a></span></li>
                    <li id="cardBottom"><a href="#" id="menuOptions"><span id="subBtn">Contato</a></span></li>

                    <?php if (isset($_SESSION["user_id"])) : ?>
                    <li id="lgnBtn">
                        <a href="<?= Config::BASE_URL . 'dashboard' ?>" id="menuOptionsLogin">
                  
                            <!-- <span style="font-size:13px; padding:0px !important; margin-top: 10px !important;">Olá, <?= $_SESSION["user_name"] ?><span> -->
                            <span style="font-size:13px;padding:0px; margin-right: 10px;">Acessar Painel</span>
                            <img style="width:50px; height:50px; border-radius:60px;" src="<?= $_SESSION["user_picture"] ?>" alt="picture">
                            
                      
                        </a>
                    </li>
                <?php else : ?>
                    <li id="lgnBtn"><a href="<?= Config::BASE_URL . 'login' ?>" id="menuOptionsLogin"><i id="icon-login" class="bi bi-person-circle"></i> Entrar</a> <a href="<?= Config::BASE_URL . 'register' ?>" class="btn ">Cadastre-se</a></li>
                <?php endif; ?>                    <!-- <li id="cadBtn">
                        <button class="btn">Cadastre-se</button>
                    </li> -->
                </ul>
            </div>
        </nav>

        <main>
            <div class="background-div">
                <img id="wjLogo" src="<?= Config::BASE_URL ?>src/img/logo/SEPTlogo_branco.webp" alt="logo">
                <br />
                <h1 id="title-banner">Sua nova <span style="color:#00518b;">secretaria online <br /></span> mais <span style="color:#00518b;">segura </span> e <span style="color:#00518b;">eficiente</h1>
                <br />
            </div>

            <div class="container-fluid">
                <div class="section">
                    <div class="row">
                        <div class="slide-container swiper ">
                            <div class="slide-content swiper9">
                                <div class="card-wrapper swiper-wrapper">
                                    <div class="col-md-3 col-sm-12 col-xs-12 swiper-slide">
                                        <div class="feature-card ">
                                            <div class="feature-icons-div">
                                                <img src="<?= Config::BASE_URL ?>src/img/icon-1.svg" style=" z-index:2; " class="feature-icons-inner" alt="rectangle">
                                            </div>
                                            <h5 class="feature-text">Faça a gestão do inventário de salas e equipamentos</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 swiper-slide">
                                        <div class="feature-card ">
                                            <div class="feature-icons-div">
                                                <img src="<?= Config::BASE_URL ?>src/img/icon-2.svg" style=" z-index:2; " class="feature-icons-inner" alt="rectangle">
                                            </div>
                                            <h5 class="feature-text">Acompanhe suas tarefas em tempo real</h5>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 swiper-slide">
                                        <div class="feature-card ">
                                            <div class="feature-icons-div">
                                                <img src="<?= Config::BASE_URL ?>src/img/icon-3.svg" style=" z-index:2; " class="feature-icons-inner" alt="rectangle">
                                            </div>
                                            <h5 class="feature-text">Aprenda a dominar todas as ferramentas por meio de tutoriais </h5>
                                        </div>
                                    </div>
                                    <div class="col-md-3 col-sm-12 col-xs-12 swiper-slide">
                                        <div class="feature-card ">
                                            <div class="feature-icons-div">
                                                <img src="<?= Config::BASE_URL ?>src/img/icon-4.svg" style=" z-index:2; " class="feature-icons-inner" alt="rectangle">
                                            </div>
                                            <h5 class="feature-text">Personalize as demandas de acordo com suas necessidades</h5>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-button-next prod-next swiper-navBtn"></div>
                                <div class="swiper-button-prev prod-prev swiper-navBtn"></div>
                                <div class="swiper-pagination swiper-pagination9"></div>
                            </div>
                        </div>
                    </div>
                </div> <!-- DIV SECTION END -->

                <div class="row">
                    <h1 class="titleNovidades">Novidades</h1>
                    <br />
                    <h7 class="secondaryText">Encontre vídeos, artigos e manuais referentes às principais ferramentas de colaboração do mercado.</h6>
                        <br />
                </div>
              
                <br />
                <div class="row">
                    <a href="<?= Config::BASE_URL . 'blog' ?>" class="cta-btn" style="text-align:center;">Acessar todos os artigos <img src="<?= Config::BASE_URL ?>src/img/arrow-access.svg" id="float:right;text-align:right; align-self:right;" height="15" alt="logo"></a>
                </div>
            </div>

            <div class="section-feature">
            </div>

          
            <div class="footer">
                <div class="row" style="text-align:center !important; justify-content:center !important;">
                    <h6 class="footerText" style="max-width:500px;text-align:center !important;"><span class="footerTextStrong">Secretaria Online</span> é um <span class="footerTextStrong">Portal do aluno</span> desenvolvido no projeto de TCC do curso de TADS.</h6>
                </div>
                <div class="row">
                    <img class="logoWetalkFooter" src="<?= Config::BASE_URL . 'src/img/logo/ufpr_logo_branca.png' ?>" alt="logoWetalk" srcset="">
                    <img class="logoWeJourneyFooter" src="<?= Config::BASE_URL . 'src/img/logo/SEPTlogo_branco.webp' ?>" alt="logoWetalk" srcset="">
                </div>
                <div class="row">
                    <a href="https://wetalkit.com.br/" class="cta-btn" style="margin-left:auto !important; margin-right:auto !important; margin-top:40px;">Conheça as soluções da Wetalk.it <img src="<?= Config::BASE_URL ?>src/img/arrow-access.svg" id="float:right;text-align:right; align-self:right;" height="15" alt="logo"></a>
                </div>

            </div>

                <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                <script src="sweetalert2.min.js"></script>
                <link rel="stylesheet" href="sweetalert2.min.css">
               
       

            <!-- <iframe src="https://scribehow.com/embed/Create_Wetalkit_Account_with_Lucas_Perussibirthdate_of_28071999__fAOj4UaFRYOFqhxNK458MA?as=scrollable" width="100%" height="640" allowfullscreen frameborder="0"></iframe> -->
            </div>
            <script src="<?= Config::BASE_URL ?>src/js/new-index.js"></script>
            <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
            <script src="<?= Config::BASE_URL ?>src/js/swiper-bundle.min.js"></script>
            <script>
                var swiper = new Swiper(".swiper9", {
                    slidesPerView: 3,
                    spaceBetween: 25,
                    // autoplay: true,
                    loop: false,
                    centerSlide: 'false',
                    fade: 'true',
                    grabCursor: 'true',
                    pagination: {
                        el: ".swiper-pagination9",
                        clickable: true,
                        dynamicBullets: true,
                    },
                    navigation: {
                        nextEl: ".prod-next",
                        prevEl: ".prod-prev",
                    },

                    breakpoints: {
                        0: {
                            slidesPerView: 1.4,
                        },
                        650: {
                            slidesPerView: 1.4,
                        },
                        950: {
                            slidesPerView: 2.2,
                        },
                        1100: {
                            slidesPerView: 3.2,
                        },
                        1300: {
                            slidesPerView: 3.5,
                        },
                        1500: {
                            slidesPerView: 4,
                        },
                    },
                });
            </script>
        </main>

    </body>

    </html>
