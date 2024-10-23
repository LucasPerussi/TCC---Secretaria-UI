<?php

use API\Controller\Config;

$page_title = "Join Company";

?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
 
  <?php include "view/src/head.php"; ?>

  <link rel="stylesheet" href="src/css/login.css">
  <link rel="stylesheet" type="text/css" href="layout/assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="src/css/main.css">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css'>
  <link rel="stylesheet" href="./style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css'>
  <link rel="stylesheet" type="text/css" href="src/css/main.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/assets/owl.carousel.min.css'>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css" href="src/css/swiper-bundle.min.css">
    <link rel="stylesheet" type="text/css" href="src/css/carousel.css">
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
  <!--
  <link rel="stylesheet" type="text/css" href="<?= Config::BASE_CSS . str_replace(".view", ".css", basename(__FILE__, ".php")) ?>">-->
</head>
<!-- END: Head-->
<!-- BEGIN: Body-->
<body style="height:100%; overflow-x:hidden;"class="horizontal-layout horizontal-menu blank-page navbar-floating footer-static  " data-open="hover" data-menu="horizontal-menu" data-col="blank-page">
  <!-- BEGIN: Content-->
  <div class="app-content content ">
  <a href="<?=Config::BASE_URL . "logout"?>" style="position:fixed; left:5%; top:5%; padding:10px; z-index: 9; background-color:dimgray; border-radius:6px; color:ghostwhite;">Sigout</a>    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
        <div class="content-body ">
        <section id="dashboard-ecommerce">
                  
                 <div style="margin:10%; margin-top:150px;">
                    <div class="row">
                      <h1 style="font-family: 'Montserrat', sans-serif; font-size:32px; font-weight: 800; margin-top:-20px; z-index:1; color:white;">Acesse o portal de sua empresa</h1>
                      <h5 style="font-family: 'Montserrat', sans-serif; font-size:15px; font-weight: 800; margin-top:0px; z-index:1; color:white;">Selecione a conta e informe a senha de acesso. Ou se preferir, use uma conta genérica e acesse sua empresa depois.
                      <form style="background: transparent;" id="login-form">
                            <input type="text" hidden class="form-control form-control-merge" id="login-password" name="identifier" value="9999" />
                            <button class="btn btn-primary " tabindex="4"style="background-color:none; font-family: 'Montserrat', sans-serif; font-size:15px; font-weight: 800; max-width:600px; margin-top:20px; padding:15px; border-radius:10px; z-index:1;">Entrar com conta genérica </button>
                      </form></h5>
                      
                    </div>
                    <div  class="row">
                      <form method="GET" id="form" autocomplete="off">
                        <input style="font-family: 'Montserrat', sans-serif;border-style:solid; width:100%; max-width:600px; margin-top:10px; "  <?php if(isset($_GET["company-search"])){ echo "value='". $_GET["company-search"] . "'";};?> placeholder="Busque por sua empresa..." name="company-search"  id="search" type="text">
                        <button hidden type="submit" style="z-index:1; margin:-48px; border-style: hidden; background-color:white; width:40px;"><i class="bi bi-search"></i></button>
                      </form>
                    </div>
                    <div class="row">

 
                    <div class="slide-container swiper ">
                          <div class="slide-content swiper3">
                              <div class="card-wrapper swiper-wrapper" style="padding-top:30px; padding-bottom: 30px;">   
                  
                              <?php if (mysqli_num_rows($companies) > 0): ?>
                            <?php while($company = mysqli_fetch_assoc($companies)):?>
                              <?php
                                $verify2 = false;
                                if(isset($_GET["company-search"])){
                                  $filter2 = $_GET["company-search"];
                                  if ($filter2 == ""){$_GET["company-search"] ="All"; $filter2 = "a";};
                                  $nome2 = ' ' .$company["com_name"];
                                  $verify2 = mb_stripos($nome2, $filter2);
                                }                               
                              ?>
                             <?php if ((isset($verify2) && ($verify2 != "")) || (!isset($_GET["company-search"])) || ($_GET["company-search"] == "All")):?>



                                            <div class="card swiper-slide"
                                            style="border-radius: 25px; background-color: #<?=$company["com_color"]?>;">
                                            <div class="image-content" style="height:250px;border-radius:25px 25px 0 0;<?php if ($company["com_color"] == "#ffffff") {
                                              echo "box-shadow: 3px 2px 15px 1px #d3e0ff;";} ?>">
                                                <span class="overlay" style="background-color:<?=$company["com_color"]?>; z-index:1;"></span>
                                                  <img alt="picture" style="z-index:2;
                                                                            margin:10%;
                                                                            width:50%;
                                                                                                      "
                                                  " src="<?=$company["com_logo"]?>"  class="card-img">
                                            
                                            </div>

                                            <div class="card-content" style="align-items: left;">
                                                <div class="row" style="height:50px;padding-top:20px;">
                                                  <h2 class="name" style="font-size:16px;"><?=$company["com_name"]?></h2>
                                                </div>
                                                <a id="cta" href='<?= Config::BASE_URL . 'joinning/' .$company["com_identifier"]?>' style="border-radius:25px;margin:5%; margin-bottom:10px; width: 90%; padding: 5px; text-align: center; border-color: #5456572c;" >Ingressar</a>
                                            </div>
                                        </div>
                                           
                                          <?php endif?>
                                      <?php endwhile?>
                                  <?php endif?>



                                    </div>
                                </div>

                                <div class="swiper-button-next empresa-next swiper-navBtn"></div>
                                <div class="swiper-button-prev empresa-prev swiper-navBtn"></div>
                                <div class="swiper-pagination swiper-pagination3"></div>
                          </div>
                        </div>















<!-- 
                       <div style="margin-top:40px;" class="carousel-wrap">
                        <div style="width:100%;" class="owl-carousel">
                          <?php if (mysqli_num_rows($companies) > 0): ?>
                            <?php while($company = mysqli_fetch_assoc($companies)):?>
                              <?php
                                $verify2 = false;
                                if(isset($_GET["company-search"])){
                                  $filter2 = $_GET["company-search"];
                                  if ($filter2 == ""){$_GET["company-search"] ="All"; $filter2 = "a";};
                                  $nome2 = ' ' .$company["com_name"];
                                  $verify2 = mb_stripos($nome2, $filter2);
                                }                               
                              ?>
                             <?php if ((isset($verify2) && ($verify2 != "")) || (!isset($_GET["company-search"])) || ($_GET["company-search"] == "All")):?>
                                <a href="<?= Config::BASE_URL . 'joinning/' .$company["com_identifier"]?>">
                                  <div style="width:100%;" class="item">
                                    <div style="background-color: <?=$company["com_color"]?>; display: table-cell; vertical-align: middle; height:400px; width:100%; min-width:300px;"  id="companies" class="cards card"> 
                                    <img style="max-width:180px; min-width:100px; margin-left:40px; " src="<?=$company["com_logo"]?>" alt="logo">
                                    </div>
                                  </div>
                                </a>
                              <?php endif?>
                            <?php endwhile?>
                          <?php endif?>
                        </div>
                      </div>
                    </div> -->
                   
<br>

                      <!-- /////////////                       Fim dos carroseis                                         ////////// -->

                  </div>  
           
                </section>






<!-- 
          <div class="container">
            <h1 style="margin-top:10%">Juntar-se à sua empresa</h1>
            <div class="row">
                      <h1 style="font-family: 'Montserrat', sans-serif; font-size:27px; font-weight: 800; margin-top:-20px; z-index:1;">Empresas</h1>
                    </div>
                    <div  class="row">
                      <form method="GET" id="form" autocomplete="off">
                        <input style="font-family: 'Montserrat', sans-serif;border-style:solid; width:100%; max-width:500px;min-width:150px; margin-top:10px; "  <?php if(isset($_GET["company-search"])){ echo "value='". $_GET["company-search"] . "'";};?> placeholder="Busque por sua empresa..." name="company-search"  id="search" type="text">
                        <button hidden type="submit" style="z-index:1; margin:-48px; border-style: hidden; background-color:white; width:40px;"><i class="bi bi-search"></i></button>
                      </form>
                    </div>
                    <div class="row">
                       <div style="margin-top:40px;" class="carousel-wrap">
                        <div style="width:100%;" class="owl-carousel">
                          <?php if (mysqli_num_rows($companies) > 0): ?>
                            <?php while($company = mysqli_fetch_assoc($companies)):?>
                              <?php
                                $verify2 = false;
                                if(isset($_GET["company-search"])){
                                  $filter2 = $_GET["company-search"];
                                  $nome2 = ' ' .$company["com_name"];
                                  $verify2 = mb_stripos($nome2, $filter2);
                                }                               
                              ?>
                             <?php if ((isset($verify2) && ($verify2 != "")) || (!isset($_GET["company-search"])) || ($_GET["company-search"] == "All")):?>
                                <a href="<?= Config::BASE_URL . 'company/' .$company["com_identifier"]?>">
                                  <div class="item">
                                    <div style="background-color: <?=$company["com_color"]?>; display: table-cell; vertical-align: middle; height:400px;"  id="companies" class="cards card"> 
                                    <img style="max-width:180px; min-width:100px; margin-left:40px; " src="<?=$company["com_logo"]?>" alt="logo">
                                    </div>
                                  </div>
                                </a>
                              <?php endif?>
                            <?php endwhile?>
                          <?php endif?>
                          
                        </div>
                      </div>
                    </div> -->
            
        </div>
      </div>
      <ul class="bg-bubbles">
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
        <li></li>
      </ul>
        <!-- /Login basic -->

      </div>
    </div>
  </div>


  <!-- END: Content-->

  <?php include "view/src/footer.php"; ?>
  <?php
    require __DIR__."/../default.js.php";?>
    
    <!-- BEGIN: Page JS-->
    <script src="layout/app-assets/js/scripts/forms/form-select2.js"></script>
    <!-- END: Page JS-->

  ?>
  <!-- PAGE JS -->
  <script src="<?= Config::BASE_URL ?>layout/app-assets/js/scripts/pages/auth-login.js"></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.1.3/owl.carousel.min.js'></script>
  <script src='https://use.fontawesome.com/826a7e3dce.js'></script>
  <script>
     $("#login-form").submit(function(e) {
        e.preventDefault();
        const data = new FormData(e.target);
        const object = Object.fromEntries(data.entries());
        axios.post('<?= Config::BASE_ACTION_URL ?>/company/generic', object)
            .then(function(response) {
                console.log(response)
                if (response.data.error) {
                    throw response.data;                      
                } else {
                    if (response.data == "Welcome!"){
                        window.location.href = "<?= Config::BASE_URL?>dashboard"
                    } else{
                        Swal.fire({
                            title: '<?= __("Sucesso!") ?>',
                            text: response.data,
                            icon: 'success',
                            showCancelButton: false,
                            allowOutsideClick: false,
                            confirmButtonColor: '#1f8cd4',
                            cancelButtonColor: '#d33',
                            confirmButtonText: '<?= __("Legal!") ?>'
                            }).then((result) => {
                            if (result.isConfirmed) {
                              window.location.href = "<?= Config::BASE_URL?>dashboard"
                            }
                        })
                    }
                    
                }
            })
            .catch(function(error) {
                Swal.fire({
                    title: '<?= __("Register failed!") ?>',
                    text: error.message,
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#1f8cd4',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '<?= __("OK") ?>'
                })
            });
    });

  </script>
<script src="src/js/swiper-bundle.min.js"></script>

<script>
   var swiper = new Swiper(".swiper3", {
        slidesPerView: 3,
        spaceBetween: 25,
        // autoplay: true,
        loop: false,
        centerSlide: 'false',
        fade: 'true',
        grabCursor: 'true',
        pagination: {
            el: ".swiper-pagination3",
            clickable: true,
            dynamicBullets: true,
        },
        navigation: {
            nextEl: ".empresa-next",
            prevEl: ".empresa-prev",
        },

        breakpoints: {
            0: {
                slidesPerView: 1.3,
            },
            520: {
                slidesPerView: 2,
            },
            950: {
                slidesPerView: 3,
            },
        },
    });
</script>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
  <?php
      require __DIR__."/../../".Config::BASE_PATH_JS . str_replace(".view", ".js.php", basename(__FILE__, ".php"));
  ?>
</body>
<!-- END: Body-->

</html>