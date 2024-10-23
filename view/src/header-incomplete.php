

<?php
use API\Controller\Config;
use const Siler\Config\CONFIG;?>
<script src="path/to/dist/feather.js"></script>
<script src="https://unpkg.com/feather-icons"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">


 <style>
    .header-navbar .navbar-container ul.navbar-nav li > a.nav-link {
        color: white;
    }

    .header-navbar .navbar-container {
        /* background: linear-gradient(to right, #7634ff, #1f8cd4); */
        background: #3f3f40;
        border-radius: 9px;
    }
    .header-navbar .navbar-container ul.navbar-nav li i.ficon, .header-navbar .navbar-container ul.navbar-nav li svg.ficon {
        color: white;
    }
 </style>
 <!-- BEGIN: Header-->
 <nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
        <div class="navbar-container d-flex content">
            <div class="bookmark-wrapper d-flex align-items-center">
                <!-- <ul class="nav navbar-nav d-xl-none">
                    <li class="nav-item"><a class="nav-link menu-toggle" href="#"><div styles="margin-right:20px;"><i class="bi bi-justify"></i></div></a></li>
                </ul> -->
                    <ul class="nav navbar-nav bookmark-icons">  
                    <li class="nav-item dropdown d-lg-block" style="font-family: 'Bebas Neue', cursive; font-size: 25px; color:white;"><a style="font-family: 'Bebas Neue', cursive; font-size: 25px; color:white;"  href="#">                         <img height="25" src="<?= Config::BASE_URL ?>/src/img/logo/logo-<?php if ((isset($_COOKIE['theme']))  && ($_COOKIE['theme'] == "Dark")) : ?>branco<?php else : ?>preto<?php endif; ?>.svg" alt="logo">
</li>
                </ul>
            </div>
            <ul class="nav navbar-nav align-items-center ms-auto">
                <!-- <li id="searchHeader" style="margin-right:10px;" class="nav-item dropdown d-lg-block "><a href="#" class="nav-link"><i class="bi bi-search"></i></a></li> -->
                <script>
                    $("#searchHeader").click(function(e) {
                        Swal.fire({
                            title: '<strong>O que você procura?</u></strong>',
                            icon: 'none',
                            html:
                                '<form method="GET" action="<?php if((isset($_SESSION["company_identifier"])) && ($_SESSION["company_identifier"] != 9999)){echo Config::BASE_URL . "company/" . $_SESSION["company_identifier"];} else{ echo Config::BASE_URL . "dashboard"; } ;?>" id="form" autocomplete="off">' +
                                '<input style="font-family: "Montserrat", sans-serif;border-style:solid;" placeholder="Busque a plataforma, equipamento ou empresa..." name="search"  id="searchModal" type="text">' +
                                '<button  type="submit" style="z-index:1; margin:-48px; border-style: hidden; background-color:white; width:40px;"><i class="bi bi-search"></i></button>' +
                                '</form>',
                            showCloseButton: true,
                            showCancelButton: false,
                            showConfirmButton: false,
                            focusConfirm: false
                            
                        })            
                    }) 
                </script>
                
               
                <!-- <li class="nav-item dropdown d-lg-block change-theme"><a class="nav-link nav-link-style"><i class="bi bi-mask"></i></li> -->
                <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder"><?=$_SESSION['user_name'] . " " . $_SESSION['user_last_name']?>  </span><span class="user-status"><?php if ($_SESSION['user_role'] == 1){ echo ("Member");} else if (($_SESSION['user_role'] == 2) && ($_SESSION['company_id'] == 9999 )){ echo ("Master");} else {echo("admin");} ?></span></div><span class="avatar"><img class="round" height="45" alt="profile pic"  src="<?= $_SESSION["user_picture"]?>"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                        <!-- <a class="dropdown-item" href="<?=Config::BASE_URL . 'profile'?>"><i style="margin-right:10px;" class="bi bi-person-fill"></i> Perfil</a>
                        <a class="dropdown-item" href="<?=Config::BASE_URL . 'settings'?>"><i style="margin-right:10px;"  class="bi bi-toggles"></i> Configurações</a> -->
                        <a class="dropdown-item" href="<?=Config::BASE_URL . 'logout'?>"><svg  style="margin-right:10px;" xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-x-fill" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm6.146-2.854a.5.5 0 0 1 .708 0L14 6.293l1.146-1.147a.5.5 0 0 1 .708.708L14.707 7l1.147 1.146a.5.5 0 0 1-.708.708L14 7.707l-1.146 1.147a.5.5 0 0 1-.708-.708L13.293 7l-1.147-1.146a.5.5 0 0 1 0-.708z"/>
                        </svg> Logout</a>
                    </div>
                </li>
            </ul>
              
        </div>
    </nav>
    <!-- END: Header-->
    