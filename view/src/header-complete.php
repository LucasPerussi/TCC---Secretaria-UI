<?php

use API\Controller\Config;
use const Siler\Config\CONFIG; ?>

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
        <?php endif; ?>box-shadow: 0 4px 24px 0 rgba(34, 41, 47, 0.1);
        /* background: #3f3f40; */
        border-radius: 16px;
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
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="#">
                        <div styles="margin-right:20px;"><i class="bi bi-justify"></i></div>
                    </a></li>
            </ul>
            <ul class="nav navbar-nav bookmark-icons">
                <li class="nav-item dropdown d-lg-block" style="font-family: 'Bebas Neue', cursive; font-size: 25px; color:white;">
                  
                        <img height="25" src="<?= Config::BASE_URL ?>/src/img/logo/logo-<?php if ((isset($_COOKIE['theme']))  && ($_COOKIE['theme'] == "Dark")) : ?>branco<?php else : ?>preto<?php endif; ?>.svg" alt="logo">
                </li>
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
            <?php if ((isset($_SESSION["heroeAction"])) && ($_SESSION["heroeAction"])) : ?>
                <li class="nav-item nav-search"><a onclick="Voltar()" class="nav-link nav-link-search">Voltar ao
                        Master</i></a>
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
            <?php if ($_SESSION["user_theme"] == 1) : ?>
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
            <?php elseif ($_SESSION["user_theme"] == 2) : ?>
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




            <!-- <li class="nav-item nav-search" id="turnlight"><a href="#" onclick="changeLight()" class="nav-link nav-link-search"><i class="ficon" data-feather="sun"></i></a></li> -->
            <!-- <li class="nav-item nav-search" id="turnDark"><a href="#" onclick="changeDark()" class="nav-link nav-link-search"><i class="ficon" data-feather="moon"></i></a></li>
            <li class="nav-item nav-search" id="turnlight"><a href="#" onclick="changeLight()" class="nav-link nav-link-search"><i class="ficon" data-feather="sun"></i></a></li> -->

            <!-- <li  class="nav-item dropdown d-lg-block change-theme"><a class="nav-link nav-link-style"><i class="ficon" data-feather="sun"></i></a></li> -->
            <!-- <li  class="nav-item dropdown d-lg-block change-theme"><a class="nav-link nav-link-style"><?= ($_SESSION["theme"] == 2) ? '<i class="ficon" data-feather="moon"></i></a>' : '<i class="ficon" data-feather="sun"></i></a>' ?></li> -->

            <!-- <li class="nav-item dropdown d-lg-block change-theme"><a class="nav-link nav-link-style"><i class="bi bi-mask"></i></li> -->
            <?php if (isset($_SESSION["user_id"])) : ?>
                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none" style="color: white !important;"><span class="user-name fw-bolder"><?= $_SESSION['user_name'] . " " . $_SESSION['user_last_name'] ?>
                            </span><span class="user-status"><?php if ($_SESSION['user_role'] == 1) {
                                                                    echo ("Member");
                                                                } else if ($_SESSION['user_role'] == 5) {
                                                                    echo ("Parceiro");
                                                                } else if (($_SESSION['user_role'] == 2) && ($_SESSION['company_id'] == 9999)) {
                                                                    echo ("Master");
                                                                } else {
                                                                    echo ("admin");
                                                                } ?></span>
                        </div><span class="avatar"><img class="round" height="45" alt="profile pic" src="<?= $_SESSION["user_picture"] ?>"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">

                        <a class="dropdown-item" style="border-radius:8px;" href="<?= Config::BASE_URL . 'logout' ?>"><svg style="margin-right:10px;border-radius:" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-x-fill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z" />
                            </svg> <span> Logout</span></a>
                    </div>
                </li>
        </ul>
    <?php else : ?>
        <!-- <ul class="nav navbar-nav align-items-center ms-auto">              -->
        <li><button style="border-radius: 25px;
                        background-color: #4756BD;
                        padding: 10px;
                        width: 100%;
                        color: white;
                        border-style: hidden;
                        font-weight: medium;
                        font-size: 18px;
                        transition: all 0.5s ease-out;" onclick="location.href='<?php echo Config::BASE_URL . 'login' ?>'">Login</button>
        </li>
        </ul>
    <?php endif; ?>
    </div>
</nav>
<!-- END: Header-->