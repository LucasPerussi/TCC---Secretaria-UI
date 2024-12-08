<?php

use API\Controller\Config;
use const Siler\Config\CONFIG;
use API\enum\Notification_enum;

?>

<script src="path/to/dist/feather.js"></script>
<script src="https://unpkg.com/feather-icons"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">


<style>
    .header-navbar .navbar-container ul.navbar-nav li>a.nav-link {
        color: white;
    }

    .header-navbar .navbar-container {
        /* background: linear-gradient(to right, #7634ff, #1f8cd4); */
        <?php if ((isset($_COOKIE['theme']))  && ($_COOKIE['theme'] == "Dark")) : ?>background: #27282B;
        <?php else : ?>background: #fff;
        <?php endif; ?>border-radius: 16px;
    }

    .vertical-layout .header-navbar .navbar-container ul.navbar-nav li.dropdown .dropdown-menu {
        border-radius: 16px;
    }

    .header-navbar .navbar-container ul.navbar-nav li.dropdown-cart .dropdown-menu.dropdown-menu-end,
    .header-navbar .navbar-container ul.navbar-nav li.dropdown-notification .dropdown-menu.dropdown-menu-end {
        border-radius: 16px;
        padding: 5px;
    }

    .card-image .card-img {
        border-radius: 50% !important;
    }

    .menu-toggle {
        <?php if ((isset($_COOKIE['theme']))  && ($_COOKIE['theme'] == "Dark")) : ?>color: white !important;
        <?php else : ?>color: #27282B !important;
        <?php endif; ?>
    }

    .navbar-container .search-input .search-list.show {
        padding-bottom: 10px;
        padding-left: 15px;
    }

    .navbar-container .search-input .search-list li.auto-suggestion:hover,
    .navbar-container .search-input .search-list li.auto-suggestion.current_item {
        background-color: #249ccc;
    }


    .current_item:hover {
        border-radius: 16px;
    }

    .main-menu {
        border-radius: 0px 16px 16px 0px;
    }

    .swal2-container .swal2 {
        border-radius: 16px;
    }

    .card {
        border-radius: 16px;
    }

    .btn-primary .btn-outline-primary {
        border-radius: 16px;
    }

    .nav-pills .nav-link.active {
        border-radius: 16px;
    }

    .navbar-container .search-input .search-list {
        border-radius: 16px;
    }

    .navbar-container .search-input.open .dropdown-item .dropdown-item .search-input.open {
        border-radius: 18px !important;
    }

    .header-navbar.floating-nav {
        border-radius: 20px;
    }

    .header-navbar .navbar-container ul.navbar-nav li i.ficon,
    .header-navbar .navbar-container ul.navbar-nav li svg.ficon {
        color: white;
    }
</style>
<!-- BEGIN: Header-->
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light <?php if ((isset($_COOKIE['themeS']))  && ($_COOKIE['themeS'] != "Dark")) : ?> navbar-shadow <?php endif; ?> container-xxl">
    <div class="navbar-container d-flex content" style="
    padding-bottom: 0px;
    padding-top: 5px;
">
        <div class="bookmark-wrapper d-flex align-items-center" style="margin-top:-6px !important;">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="#">
                        <div styles="margin-right:20px;"><i class="bi bi-justify"></i></div>
                    </a></li>
            </ul>
            <ul class="nav navbar-nav bookmark-icons">
                <li class="nav-item dropdown d-lg-block" style="font-family: 'Bebas Neue', cursive; font-size: 25px; color:white;"><a style="font-family: 'Bebas Neue', cursive; font-size: 25px; color:white;" href="<?php if ((isset($_SESSION["company_identifier"])) && (!isset($_SESSION["user_id"]))) {
                                                                                                                                                                                                                            echo Config::BASE_URL . 'company/' . $_SESSION["company_identifier"];
                                                                                                                                                                                                                        } else {
                                                                                                                                                                                                                            echo Config::BASE_URL . 'dashboard';
                                                                                                                                                                                                                        } ?>">
                        <img style="width:140px !important;height:auto !important; margin-top: 0px;" src="<?= Config::BASE_URL ?>src/img/logo/sept-<?php if ((isset($_COOKIE['theme']))  && ($_COOKIE['theme'] == "Dark")) : ?>branco.webp<?php else : ?>azul.png<?php endif; ?>" alt="logo"></a> </li>
            </ul>

        </div>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap');
        </style>


        <ul class="nav navbar-nav align-items-center ms-auto">


            <div id="timer" hidden style="padding:5px; border-radius:20px; background-color:#ff2551; color:#fff; "></div>

            <?php if (((isset($_SESSION["user_role"])) && (($_SESSION["user_role"] == 2) && ((isset($_SESSION["pending-users"])) && ($_SESSION["pending-users"] == "true")))) || ((isset($_SESSION["notifications"])) && ($_SESSION["notifications"] != ""))) : ?>
                <li class="nav-item dropdown dropdown-notification me-25" style="margin-top: -5px;">



                    <script>
                        // Defina o tempo inicial para 25 minutos
                        var initialTime = 30 * 60;
                        var currentTime = initialTime;

                        // window.addEventListener("load", function () {
                        //     localStorage.setItem("reset", "1");
                        // });

                        function monitorPageEvents() {
                            // Evento beforeunload: Executa antes de sair da página
                            window.addEventListener("beforeunload", function() {
                                localStorage.setItem("reset", "1");
                            });

                            // Evento unload: Executa ao sair da página
                            window.addEventListener("unload", function() {
                                localStorage.setItem("reset", "1");
                            });

                            // Evento load: Executa quando a página é carregada
                            window.addEventListener("load", function() {
                                // Verifica se o localStorage já foi definido para evitar duplicações
                                if (localStorage.getItem("reset") !== "1") {
                                    localStorage.setItem("reset", "1");
                                }
                            });
                        }

                        // Chame a função para monitorar os eventos
                        monitorPageEvents();

                        function checkTimer() {
                            var savedTime = localStorage.getItem("reset"); // Alterei de reset para savedTime
                            if (savedTime === "1") { // Alterei de reset para savedTime
                                currentTime = initialTime;
                                localStorage.setItem("reset", "0");
                                return;
                            }
                            return;
                        }

                        function updateTimerDisplay() {
                            var minutes = Math.floor(currentTime / 60);
                            var seconds = currentTime % 60;
                            document.getElementById("timer").innerHTML = `Fim da sessão em: ${minutes}:${seconds < 10 ? '0' : ''}${seconds}`;
                            checkTimer()
                        }

                        function startSessionTimer() {
                            updateTimerDisplay();
                            var timerInterval = setInterval(function() {
                                currentTime--;
                                updateTimerDisplay();

                                if (currentTime === 5 * 60) {
                                    document.getElementById("timer").hidden = false;
                                    showFiveMinuteModal();
                                } else if (currentTime <= 0) {
                                    document.getElementById("timer").innerHTML = `Sessão Expirada`;
                                    clearInterval(timerInterval);
                                    showSessionEndModal();
                                }
                                if (currentTime > 5 * 60) {
                                    document.getElementById("timer").hidden = true;
                                }

                            }, 1000);
                        }

                        function showFiveMinuteModal() {
                            Swal.fire({
                                title: 'Faltam 5 minutos para o fim da sessão',
                                text: 'Sua sessão finaliza em 5 minutos, atualize a página para renovar por mais 30 minutos.',
                                icon: 'warning',
                                showConfirmButton: true,
                                confirmButtonText: "Renovar Sessão",
                                showCancelButton: true,
                                confirmButtonColor: '#B22222',
                                cancelButtonColor: '#1f8cd4',
                                cancelButtonText: "Continuar Aqui",
                                timer: 300000, // 5 minutos em milissegundos
                                timerProgressBar: true,
                                onBeforeOpen: () => {
                                    Swal.showLoading()
                                },
                                onClose: () => {
                                    // Redefinir o temporizador para continuar a contagem regressiva
                                    startSessionTimer();
                                }
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload(true);
                                } else if (
                                    /* Read more about handling dismissals below */
                                    result.dismiss === Swal.DismissReason.cancel
                                ) {
                                    swalWithBootstrapButtons.fire(
                                        'Cancelled',
                                        'Lembre-se de atualizar em até 5 minutos para não ter sua sessão finalizada.',
                                        'error'
                                    )
                                }

                            })

                        }

                        function showSessionEndModal() {
                            Swal.fire({
                                title: 'Sessão Expirada!',
                                text: 'Sua sessão parece ter expirado. \n Por questão de segurança mantemos sessões limitadas a 30 minutos de IDLE. Tente renová-la, pressionando o botão abaixo.',
                                icon: 'error',
                                showConfirmButton: true,
                                confirmButtonText: "Renovar Sessão",
                                confirmButtonColor: '#1f8cd4',
                                allowOutsideClick: false,
                                backdrop: `
                            #000000cf
                                left top
                            
                            `
                            }).then((result) => {

                                location.reload(true);

                            });
                        }

                        // Inicie o temporizador da sessão quando a página for carregada
                        startSessionTimer();
                    </script>

                </li>

            <?php endif; ?>


            <style>
                .search-input.open {
                    position: absolute;
                    top: 0;
                    z-index: 1000;
                    height: 73px;
                    width: 100%;
                    display: block;
                    background: transparent;
                    border-radius: 0.5rem;
                }

                .main-menu.menu-light .navigation>li.open:not(.menu-item-closing)>a {
                    background-color: #4756BD;
                    color: #fff;
                }

                .tagSelected {
                    color: white !important;
                }

                .user-name .user-status {
                    color: white !important;
                }
            </style>

            <script>
                const currentTheme = obterCookie('theme');
                themeSwitch = document.getElementById("theme");
                var iconElement = document.getElementById("icon");

                if (currentTheme === "Dark") {
                    switchDark();
                    criarCookie('theme', 'Dark', 7); // Cria um cookie chamado 'usuario' com valor 'joao' que expira em 7 dias.
                } else {
                    switchLight();
                    criarCookie('theme', 'Light', 7); // Cria um cookie chamado 'usuario' com valor 'joao' que expira em 7 dias.
                    document.getElementById("themeDark").hidden = false;
                    document.getElementById("themeLight").hidden = true;
                    // document.querySelector("body").style.background = "#f87 ;"
                    // document.getElementsByClassName("header-navbar-shadow").style.background = "#f87 !important;"
                }


                function switchDark() {
                    changeDark();
                    // iconElement.setAttribute("data-feather", "sun");
                    // document.getElementById("themeDark").hidden = true;
                    // document.getElementById("themeLight").hidden = false;
                    criarCookie('theme', 'Dark', 7); // Cria um cookie chamado 'usuario' com valor 'joao' que expira em 7 dias.
                    // location.reload();

                }

                function switchLight() {
                    // iconElement.setAttribute("data-feather", "moon");
                    // document.getElementById("themeDark").hidden = false;
                    // document.getElementById("themeLight").hidden = true;
                    criarCookie('theme', 'Light', 7); // Cria um cookie chamado 'usuario' com valor 'joao' que expira em 7 dias.
                    // location.reload();


                }
            </script>
            <?php if ((isset($_SESSION["user_theme"])) && ($_SESSION["user_theme"] == 1)) : ?>
                <script>
                    function handleThemeChange(e) {
                        if (e.matches) {
                            // Dark mode
                            // changeDark();
                            if (obterCookie('theme') === "Light") {
                                criarCookie("theme", "Dark", 7);
                                location.reload();
                            }
                        } else {
                            // Light mode
                            // changeLight();
                            if (obterCookie('theme') === "Dark") {
                                criarCookie("theme", "Light", 7);
                                location.reload();
                            }
                        }
                    }

                    // Create a MediaQueryList object for the prefers-color-scheme media query
                    const darkModeMediaQuery = window.matchMedia('(prefers-color-scheme: dark)');

                    // Add an event listener for the change event
                    darkModeMediaQuery.addEventListener('change', handleThemeChange);

                    // Call the function initially to set the correct theme on page load
                    handleThemeChange(darkModeMediaQuery);
                </script>
            <?php elseif ((isset($_SESSION["user_theme"])) && ($_SESSION["user_theme"] == 2)) : ?>
                <script>
                    // changeDark();
                    if (obterCookie('theme') === "Light") {
                        criarCookie("theme", "Dark", 7);
                        location.reload();
                    }
                </script>
            <?php else : ?>
                <script>
                    // changeLight();
                    if (obterCookie('theme') === "Dark") {
                        criarCookie("theme", "Light", 7);
                        location.reload();
                    }
                </script>
            <?php endif; ?>




            <?php if (isset($_SESSION["user_id"])) : ?>
                <li class="nav-item dropdown dropdown-user" style="margin-top: -5px !important;"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex" style="color: white !important;"><span class="user-name fw-bolder"> <?php
                                                                                                                            // $sobrenomes = explode(" ", $_SESSION['user_lastName']);
                                                                                                                            // $ultimoSobrenome = end($sobrenomes);
                                                                                                                            // echo $_SESSION['user_name'] . ' ' . $ultimoSobrenome
                                                                                                                            echo $_SESSION['user_name']
                                                                                                                            ?>
                            </span><span class="user-status"><?= $_SESSION['user_role'] ?></span>
                        </div><span class="avatar"><img class="round" id="headerProfilePic" height="45" alt="profile pic" src="<?= $_SESSION["user_picture"] ?>"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">

                        <a class="dropdown-item" style="border-radius:8px;" href="<?= Config::BASE_URL . 'settings' ?>"><i style="margin-right:10px;" class="bi bi-toggles"></i> <span><?= __("header.profile.config") ?></span></a>
                        <a class="dropdown-item" style="border-radius:8px;" href="<?= Config::BASE_URL . 'logout' ?>"><svg style="margin-right:10px;border-radius:" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-x-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z" />
                            </svg> <span><?= __("header.profile.sair") ?></span></a>
                    </div>
                </li>
        </ul>

    <?php else : ?>
        <!-- <ul class="nav navbar-nav align-items-center ms-auto">              -->
        <li><button style="border-radius: 25px;
                        background-color: #0cf8a5;
                        padding: 10px;
                        width: 100%;
                        color: white !important;
                        border-style: hidden;
                        font-weight: medium;
                        font-size: 18px;
                        transition: all 0.5s ease-out;" onclick="location.href='<?php echo Config::BASE_URL . 'login' ?>'">Login</button>
        </li>
        </ul>
    <?php endif; ?>
    </div>
</nav>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>