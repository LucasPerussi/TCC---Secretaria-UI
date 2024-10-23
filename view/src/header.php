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
                        <img  style="width:140px !important;height:auto !important; margin-top: 0px;" src="<?= Config::BASE_URL ?>src/img/logo/logo-<?php if ((isset($_COOKIE['theme']))  && ($_COOKIE['theme'] == "Dark")) : ?>branco<?php else : ?>preto<?php endif; ?>.png" alt="logo"></a> </li>
            </ul>

        </div>
        <style>
            @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@500&display=swap');
        </style>


        <ul class="nav navbar-nav align-items-center ms-auto">
            <!-- <li id="searchHeader" style="margin-right:10px;" class="nav-item dropdown d-lg-block "><a href="#" class="nav-link"><i class="bi bi-search"></i></a></li> -->
            <script>
                // $("#searchHeader").click(function(e) {
                //     Swal.fire({
                //         title: '<strong>O que você procura?</u></strong>',
                //         icon: 'none',
                //         html: '<form method="GET" action="<?php if ((isset($_SESSION["company_identifier"])) && ($_SESSION["company_identifier"] != 9999)) {
                                                                    echo Config::BASE_URL . "company/" . $_SESSION["company_identifier"];
                                                                } else {
                                                                    echo Config::BASE_URL . "dashboard";
                                                                }; ?>" id="form" autocomplete="off">' +
                //             '<input style="font-family: "Montserrat", sans-serif;border-style:solid;" placeholder="Busque a plataforma, equipamento ou empresa..." name="search"  id="searchModal" type="text">' +
                //             '<button  type="submit" style="z-index:1; margin:-48px; border-style: hidden; background-color:white; width:40px;"><i class="bi bi-search"></i></button>' +
                //             '</form>',
                //         showCloseButton: true,
                //         showCancelButton: false,
                //         showConfirmButton: false,
                //         focusConfirm: false

                //     })
                // })
            </script>
            <!-- <li class="nav-item nav-search"><a onclick="Voltar()" class="nav-link nav-link-search"><?php $horaAbertura = date("H");
                                                                                                        echo $horaAbertura; ?></i></a>
            </li> -->
            <!-- <li class="nav-item nav-search"><a data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Sistema em Manutenção. Retorno estimado para 16 horas"  class="badge rounded-pill bg-danger ">Sistema Offline</i></a>
            </li> -->
            <?php if ((isset($_SESSION["heroeAction"])) && ($_SESSION["heroeAction"])) : ?>
                <li class="nav-item nav-search" style="margin-top: -5px !important;"><a onclick="Voltar()" class="nav-link nav-link-search"><?= __("header.master") ?></i></a>
                </li>
                <script>
                    function Voltar() {
                        Swal.fire({
                            title: '<?= __("Voltar a ser Master? 🦸🦸‍♀️") ?>',
                            text: "Deseja retornar a sua conta master?",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#B22222',
                            cancelButtonColor: '#1f8cd4',
                            confirmButtonText: 'Confirmar'
                        }).then((result) => {
                            if (result.value) {
                                axios.post(`<?= Config::BASE_ACTION_URL ?>/heroe/returns`)
                                    .then(function(response) {
                                        window.location.href = "<?= Config::BASE_URL . "dashboard" ?>"
                                    })
                                    .catch(function(error) {
                                        Swal.fire({
                                            title: '<?= __("Error!") ?>',
                                            text: error.message,
                                            icon: 'error',
                                            showCancelButton: false,
                                            confirmButtonColor: '#1f8cd4',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: '<?= __("OK") ?>'
                                        })
                                    });
                            }
                        })
                        // })
                    }
                </script>
            <?php endif; ?>
            <div id="timer" hidden style="padding:5px; border-radius:20px; background-color:#ff2551; color:#fff; "></div>
            <?php if ((isset($_SESSION["user_role"])) && ($_SESSION["user_role"] != 5)) : ?>
                <li class="nav-item nav-search" style="margin-top: -5px !important;"><a href="#" class="nav-link nav-link-search"><i class="ficon" data-feather="search"></i></a>
                    <div class="search-input" style="border-radius:20px; height:55px; margin-top: -5px !important;">
                        <div class="search-input-icon" style="margin-top: -3px !important;"><i data-feather="search"></i></div>
                        <input class="form-control input" style="border-radius:20px; margin-top: -4px !important;height:64px !important; padding-left:60px !important;" type="text" placeholder="<?= __("header.barra_pesquisa") ?>" tabindex="-1" data-search="search">
                        <div class="search-input-close" style="margin-top: -3px !important;"><i data-feather="x"></i></div>
                        <ul class="search-list search-list-main"></ul>
                    </div>
                </li>
            <?php endif; ?>
            <?php if (((isset($_SESSION["user_role"])) && (($_SESSION["user_role"] == 2) && ((isset($_SESSION["pending-users"])) && ($_SESSION["pending-users"] == "true")))) || ((isset($_SESSION["notifications"])) && ($_SESSION["notifications"] != ""))) : ?>
                <li class="nav-item dropdown dropdown-notification me-25" style="margin-top: -5px;">

                    <a onclick="Automatic()" class="nav-link" href="#" data-bs-toggle="dropdown"><i class="ficon" data-feather="bell"></i>
                        <?php $cont = 0;
                        if (isset($_SESSION["user_id"])) {
                            foreach ($_SESSION["notifications"] as $item) { ?>
                                <?php if ($item["viewed"] == 0) { ?>
                                    <?php $cont++; ?>
                                <?php } ?>
                            <?php } ?>

                            <?php if ($cont > 0) { ?>
                                <span id="contador" class="badge rounded-pill bg-danger badge-up">
                                    <?= $cont ?>
                                </span>
                        <?php }
                        } ?>
                    </a>


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
                    <ul class="dropdown-menu dropdown-menu-media dropdown-menu-end">
                        <li class="dropdown-menu-header">
                            <div class="dropdown-header d-flex">
                                <h4 class="notification-title mb-0 me-auto"><?= __("header.notificacao.titulo") ?></h4>
                                <a onclick="limpar()" id="notBadge" style="padding:8px; font-size:10px; border-radius:10px;border-color:transparent; border: solid 1px #DC143C; right:5%;margin-right:5px;"><?= __("header.notificacao.limpar") ?></a>
                                <a onclick="ler()" id="notBadge" style="padding:8px; font-size:10px; border-radius:10px;border-color:transparent; border:solid 1px #4F4F4F; right:5%;"><?= __("header.notificacao.tudo_lido") ?></a>
                            </div>
                        </li>
                        <li class="scrollable-container media-list">
                            <?php foreach ($_SESSION["notifications"] as $item) { ?>
                                <a class="d-flex" href="<?= $item["url"] ?>">
                                    <div data-code="<?= $item["id"] ?>"
                                        onclick="readNotification(<?= $item['id'] ?>)"
                                        class="list-item d-flex align-items-start"
                                        style="<?php if ($item["viewed"] != 2 || $item["status"] != 2) { ?>  
                                        border-left: 7px solid <?= Notification_enum::getColorReal($item["type"]) ?> !important;
                                             <?php } ?>">
                                        <div class="me-1">
                                            <div>
                                                <span style="font-size:32px;"><?= Notification_enum::getIcone($item["type"]) ?></span>
                                            </div>
                                        </div>
                                        <div class="list-item-body flex-grow-1">
                                            <p class="media-heading" style="font-size:13px;">
                                                <span class="lerNot"
                                                    <?php if ($item["status"] == 1 && !($item["viewed"] == 2 && $item["status"] == 2)) { ?>
                                                    class="fw-bolder"
                                                    <?php } ?>>
                                                    <?= $item["title"] ?>
                                                </span>
                                            </p>
                                            <span style="margin-top:5px;font-size:11px;"><?= date("d/m/Y à\​\s H:i", strtotime($item["date"])) ?></span>
                                        </div>
                                    </div>
                                </a>
                            <?php } ?>


                            <?php if (((isset($_SESSION["user_role"])) && (($_SESSION["user_role"] == 2) && ((isset($_SESSION["pending-users"])) && ($_SESSION["pending-users"] == "true"))))) : ?>
                                <?php while ($pending = mysqli_fetch_assoc($waiting)) : ?>
                                    <a class="d-flex" href="<?= Config::BASE_URL .  "pending-users" ?>">
                                        <div class="list-item d-flex align-items-start">
                                            <div class="me-1">
                                                <div class="avatar"><img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="avatar" width="32" height="32"></div>
                                            </div>
                                            <div class="list-item-body flex-grow-1">
                                                <p class="media-heading"><span class="fw-bolder"><?= __("header.admin_aprovacao") ?></span></p><small class="notification-text"><?= __("header.admin_resposta") ?></small>
                                            </div>
                                        </div>
                                    </a>
                                <?php endwhile; ?>
                            <?php endif; ?>

                            <script>
                                function readNotification(id) {
                                    axios.post(`<?= Config::BASE_ACTION_URL ?>/read/notification/${id}`)
                                        .then(function(response) {
                                            console.log("codigo :" + id)
                                            console.log(response)
                                            if (response.data.error) {
                                                throw response.data;
                                            } else {
                                                // window.location.href = "<?= Config::BASE_URL . $_SESSION["last_page"] ?>"
                                            }
                                        })
                                        .catch(function(response) {
                                            Swal.fire({
                                                title: '<?= __("Error!") ?>',
                                                text: response.data,
                                                icon: 'error',
                                                showCancelButton: false,
                                                confirmButtonColor: '#1f8cd4',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: '<?= __("OK") ?>'
                                            })
                                        });
                                }


                                function limpar() {
                                    Swal.fire({
                                        title: '<?= __("Limpar Notificações") ?>',
                                        text: "Tem certeza que deseja excluir todas as suas notificações?",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#B22222',
                                        cancelButtonColor: '#1f8cd4',
                                        confirmButtonText: 'Confirmar'
                                    }).then((result) => {
                                        if (result.value) {
                                            axios.post(`<?= Config::BASE_ACTION_URL ?>/delete/notifications`)
                                                .then(function(response) {
                                                    console.log(response)
                                                    if (response.data != "sucesso!") {
                                                        throw response.data;
                                                    } else {
                                                        window.location.href = "<?= Config::BASE_URL . $_SESSION["last_page"] ?>"
                                                    }
                                                })
                                                .catch(function(response) {
                                                    Swal.fire({
                                                        title: '<?= __("Error!") ?>',
                                                        text: response.data,
                                                        icon: 'error',
                                                        showCancelButton: false,
                                                        confirmButtonColor: '#1f8cd4',
                                                        cancelButtonColor: '#d33',
                                                        confirmButtonText: '<?= __("OK") ?>'
                                                    })
                                                });
                                        }
                                    })
                                }

                                function ler() {
                                    Swal.fire({
                                        title: '<?= __("Marcar Tudo como Lido?") ?>',
                                        text: "Tem certeza que deseja marcar todas as suas notificações como lidas?",
                                        icon: 'warning',
                                        showCancelButton: true,
                                        confirmButtonColor: '#B22222',
                                        cancelButtonColor: '#1f8cd4',
                                        confirmButtonText: 'Confirmar'
                                    }).then((result) => {
                                        if (result.value) {
                                            axios.post(`<?= Config::BASE_ACTION_URL ?>/read/notifications`)
                                                .then(function(response) {
                                                    console.log(response)
                                                    if (response.data != "sucesso!") {
                                                        throw response.data;
                                                    } else {
                                                        window.location.href = "<?= Config::BASE_URL . $_SESSION["last_page"] ?>"
                                                    }
                                                })
                                                .catch(function(response) {
                                                    Swal.fire({
                                                        title: '<?= __("Error!") ?>',
                                                        text: response.data,
                                                        icon: 'error',
                                                        showCancelButton: false,
                                                        confirmButtonColor: '#1f8cd4',
                                                        cancelButtonColor: '#d33',
                                                        confirmButtonText: '<?= __("OK") ?>'
                                                    })
                                                });
                                        }
                                    })
                                }

                                function Automatic() {
                                    axios.post(`<?= Config::BASE_ACTION_URL ?>/read/automatic`)
                                        .then(function(response) {
                                            // console.log(response)
                                            if (response.data != "sucesso!") {
                                                // console.log(response.data);
                                            } else {
                                                document.getElementById("contador").hidden = true;
                                            }
                                        })


                                }
                            </script>
                        </li>
                    </ul>
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

            <!-- <li class="nav-item nav-search" id="turnDark">
                <label class="switch">
                    <input type="checkbox" id="theme-switch">
                    <span class="slider round"></span>
                </label>
            </li> -->
            <!-- <li class="nav-item nav-search"><a href="#" id="themeDark" onclick="switchDark()" class="nav-link nav-link-search"><i class="ficon" data-feather="moon" id="icon"></i></a><a href="#" id="themeLight" onclick="switchLight()" class="nav-link nav-link-search"><i class="ficon" data-feather="sun" id="icon"></i></a></li> -->
            <script>
                // Listener para o evento de mudança do switch
                // const currentTheme = localStorage.getItem("theme");
                const currentTheme = obterCookie('theme');
                themeSwitch = document.getElementById("theme");
                var iconElement = document.getElementById("icon");

                if (currentTheme === "Dark") {
                    switchDark();
                    criarCookie('theme', 'Dark', 7); // Cria um cookie chamado 'usuario' com valor 'joao' que expira em 7 dias.
                    // document.getElementById("themeDark").hidden = true;
                    // document.getElementById("themeLight").hidden = false;
                    // document.querySelector("body").style.background = "#f8f8f8;"
                    // document.getElementsByClassName("header-navbar-shadow").style.background = "#f8f8f8 !important;"
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
                        <div class="user-nav d-sm-flex d-none" style="color: white !important;"><span class="user-name fw-bolder"> <?php
                                                                                                                                    $sobrenomes = explode(" ", $_SESSION['user_last_name']);
                                                                                                                                    $ultimoSobrenome = end($sobrenomes);
                                                                                                                                    echo $_SESSION['user_name'] . ' ' . $ultimoSobrenome ?>
                            </span><span class="user-status"><?php if ($_SESSION['user_role'] == 1) {
                                                                    echo ("Member");
                                                                } else if ($_SESSION['user_role'] == 5) {
                                                                    echo ("Parceiro");
                                                                } else if ($_SESSION['user_role'] == 4) {
                                                                    echo ("Agente Wetalk");
                                                                } else if (($_SESSION['user_role'] == 2) && ($_SESSION['company_id'] == 9999)) {
                                                                    echo ("Master");
                                                                } else {
                                                                    echo ("admin");
                                                                } ?></span>
                        </div><span class="avatar"><img class="round" height="45" alt="profile pic" src="<?= $_SESSION["user_picture"] ?>"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                        <?php if ($_SESSION["user_role"] != 5) : ?>
                            <a class="dropdown-item" href="<?= Config::BASE_URL . 'profile' ?>" style="border-radius:8px;"><i style="margin-right:10px;" class="bi bi-person-fill"></i> <span><?= __("header.profile.perfil") ?></span></a>
                            <?php if ($_SESSION["allowBC"] == 1) : ?>
                                <a class="dropdown-item" style="border-radius:8px;" href="<?= Config::BASE_URL . 'business-card/' . $_SESSION["username"] ?>" target="_blank"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-vcard-fill" viewBox="0 0 16 16">
                                        <path d="M0 4a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V4Zm9 1.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4a.5.5 0 0 0-.5.5ZM9 8a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 0-1h-4A.5.5 0 0 0 9 8Zm1 2.5a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5Zm-1 2C9 10.567 7.21 9 5 9c-2.086 0-3.8 1.398-3.984 3.181A1 1 0 0 0 2 13h6.96c.026-.163.04-.33.04-.5ZM7 6a2 2 0 1 0-4 0 2 2 0 0 0 4 0Z" />
                                    </svg> <span style="margin-left:10px;"><?= __("header.profile.business_card") ?></span> </a>
                            <?php endif; ?>
                        <?php endif; ?>
                        <a class="dropdown-item" style="border-radius:8px;" href="<?= Config::BASE_URL . 'settings' ?>"><i style="margin-right:10px;" class="bi bi-toggles"></i> <span><?= __("header.profile.config") ?></span></a>
                        <a class="dropdown-item" style="border-radius:8px;" data-toggle="modal" data-target="#myModal" id="openModalButton"><i style="margin-right:10px;" class="bi bi-bug"></i> <span>Report Bug</span></a>
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

<script>
    const clientID = 'eeed9dbdec9477f'; // Replace with your Imgur Client ID

    const uploadImage = (image) => {
        let replacedImage = image.replace(/^data:image\/(png|jpg|jpeg|gif|heic);base64,/, "");

        return axios.post('https://api.imgur.com/3/image', {
            image: replacedImage,
            type: 'base64'
        }, {
            headers: {
                Authorization: 'Client-ID ' + clientID,
                Accept: 'application/json'
            }
        });
    };

    const waitForImagesToLoad = () => {
        return new Promise((resolve) => {
            const images = document.querySelectorAll('img');
            let loadedImagesCount = 0;
            const totalImages = images.length;

            if (totalImages === 0) {
                resolve();
            }

            images.forEach((image) => {
                if (image.complete) {
                    loadedImagesCount++;
                    if (loadedImagesCount === totalImages) {
                        resolve();
                    }
                } else {
                    image.addEventListener('load', () => {
                        loadedImagesCount++;
                        if (loadedImagesCount === totalImages) {
                            resolve();
                        }
                    });

                    image.addEventListener('error', () => {
                        loadedImagesCount++;
                        if (loadedImagesCount === totalImages) {
                            resolve();
                        }
                    });
                }
            });
        });
    };

    const captureViewport = () => {
        return html2canvas(document.body, {
            width: window.innerWidth,
            height: window.innerHeight,
            x: window.scrollX,
            y: window.scrollY,
            scrollX: 0,
            scrollY: 0,
            useCORS: true,
            logging: true
        });
    };

    document.getElementById('openModalButton').addEventListener('click', function() {
        // Close any open SweetAlert modals
        Swal.close();

        // Add a small delay to ensure the modal is fully closed
        setTimeout(() => {
            waitForImagesToLoad().then(() => {
                captureViewport().then(function(canvas) {
                    const base64Image = canvas.toDataURL('image/png');

                    // Show uploading modal
                    Swal.fire({
                        title: 'Uploading...',
                        text: 'Please wait while we upload your screenshot.',
                        allowOutsideClick: false,
                        didOpen: () => {
                            Swal.showLoading();

                            uploadImage(base64Image)
                                .then(response => {
                                    if (response.data.success && response.status === 200) {
                                        const imageUrl = response.data.data.link;
                                        Swal.fire({
                                            title: '🕷️ Reportar Bug ou Solicitar Melhoria',
                                            html: `
                                                <img src="${imageUrl}" alt="Screenshot" class="img-fluid mb-3">
                                                <form id="openBugReport">
                                                    <div class="form-group">
                                                        <input hidden value="<?= $_SESSION["csrf_token"] ?>" name="csrf_token" type="text">
                                                        <input hidden value="<?php
                                                                                // Função para obter a URL atual                        
                                                                                function getCurrentUrl()
                                                                                {
                                                                                    $protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
                                                                                    $host = $_SERVER['HTTP_HOST'];
                                                                                    $uri = $_SERVER['REQUEST_URI'];

                                                                                    return $protocol . $host . $uri;
                                                                                }

                                                                                echo getCurrentUrl();
                                                                                ?>" name="url" type="text">
                                                        <label for="imageTitle">Qual o problema ou solicitação? </label>
                                                        <br />
                                                        
                                                        <input type="text" class="form-control mt-1" name="title" required id="imageTitle" placeholder="Enter title">
                                                    </div>
                                                    <div class="form-group mt-2">
                                                        <label for="imageDescription">Detalhes</label>
                                                        <br />
                                                        <textarea class="form-control mt-1" id="imageDescription" name="description" required rows="3" placeholder="Enter description"></textarea>
                                                    </div>
                                                    <input type="text" hidden class="form-control" id="imageLink" name="picture" value="${imageUrl}" readonly>
                                                </form>
                                            `,
                                            showCancelButton: true,
                                            confirmButtonText: 'Enviar',
                                            cancelButtonText: 'Close',
                                            preConfirm: () => {
                                                const form = document.getElementById('openBugReport');
                                                if (form.checkValidity()) {
                                                    const data = new FormData(form);
                                                    const object = Object.fromEntries(data.entries());
                                                    return axios.post('<?= Config::BASE_ACTION_URL ?>/new-report', object)
                                                        .then(function(response) {
                                                            if (response.data !== "sucesso!") {
                                                                throw response.data;
                                                            } else {
                                                                Swal.fire({
                                                                    title: 'Agradecemos a ajuda!',
                                                                    text: "Já recebemos seu report por aqui e em breve lhe atualizamos sobre o tema.",
                                                                    icon: 'success',
                                                                    showCancelButton: false,
                                                                    allowOutsideClick: false,
                                                                    confirmButtonColor: '#1f8cd4',
                                                                    cancelButtonColor: '#d33',
                                                                    confirmButtonText: '<?= __("new_room_js.confirm") ?>'
                                                                }).then((result) => {
                                                                    if (result.isConfirmed) {

                                                                    }
                                                                });
                                                            }
                                                        })
                                                        .catch(function(error) {
                                                            Swal.fire({
                                                                title: 'Ops, tivemos um problema',
                                                                text: "Não fomos capazes de receber sua solicitação. Possivelmente estejamos com algum problema interno nesse momento e nossa equipe já deve estar tratando o problema. ",
                                                                icon: 'error',
                                                                showCancelButton: false,
                                                                confirmButtonColor: '#1f8cd4',
                                                                cancelButtonColor: '#d33',
                                                                confirmButtonText: '<?= __("new_room_js.ok") ?>'
                                                            });
                                                        });
                                                } else {
                                                    Swal.showValidationMessage('Por favor, preencha todos os campos obrigatórios.');
                                                }
                                            }
                                        });
                                    } else {
                                        Swal.fire({
                                            icon: 'error',
                                            title: 'Oops...',
                                            text: 'Upload failed!',
                                        });
                                    }
                                })
                                .catch(error => {
                                    console.error('Error uploading image:', error);
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Oops...',
                                        text: 'An error occurred!',
                                    });
                                });

                        }
                    });
                });
            });
        }, 500); // Delay of half a second before capturing the screenshot
    });
</script>