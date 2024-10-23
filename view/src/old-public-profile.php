<?php
namespace API\Fetch;

use API\Controller\Config;?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Vuexy admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Vuexy admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="Lucas Perussi">
    <title>Vroom - Profile</title>
    <link rel="apple-touch-icon" href="../src/img/favcon-vr.ico">
    <link rel="shortcut icon" type="image/x-icon" href="../src/img/favcon-vr.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../layout/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../layout/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../layout/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="../layout/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="../layout/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="../layout/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../layout/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../layout/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../layout/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../layout/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../layout/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../layout/app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="../layout/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../layout/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../layout/app-assets/css/plugins/forms/form-validation.css">
    
    <link rel="stylesheet" type="text/css" href="../layout/app-assets/css/pages/page-profile.css">
    <!-- END: Page CSS-->
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../layout/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static   menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="">


<!--BEGIN: Navbar -->
<?php include "view/src/header.php"; ?>
<!--END: Navbar -->

<!--BEGIN: Sidebar -->
<?php include "view/src/mainMenu.php"; ?>
<!--END: Sidebar -->
   

<style>
    
.icon {
  margin-right: 5px;
  margin-top: 15px;
  display: inline-block;
  width: 1.5em;
  height: 1.5em;
  stroke-width: 0;
  stroke: currentColor;
  fill: currentColor;
}
.profile-card-social .icon-font {
  display: inline-flex;
}
</style>



 <!-- BEGIN: Content-->
 <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Profile</h2>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div id="user-profile">
                    <!-- profile header -->
                    <div class="row">
                        <div class="col-12">
                            <div class="card profile-header mb-2">
                                <!-- profile cover photo -->
                                <img style="max-height:250px;" class="card-img-top" src="https://i.ibb.co/rQgfZWz/BG.png" alt="User Profile Image" />
                                <!--/ profile cover photo -->

                                <div class="position-relative">
                                    <!-- profile picture -->
                                    <div class="profile-img-container d-flex align-items-center">
                                        <div class="profile-img">
                                            <img src="<?=$user["profile_pic"] ?>" class="rounded img-fluid" alt="Card image" />
                                        </div>
                                        <!-- profile title -->
                                        <div class="profile-title ms-3">
                                            <h2 class="text-white"><?=$user["name"] . " " . $user["last_name"]?></h2>
                                            <p class="text-white"><?=$user["company"]["name"]?></p>
                                        </div>
                                    </div>
                                </div>

                                <!-- tabs pill -->
                                <div class="profile-header-nav">
                                    <!-- navbar -->
                                    <nav class="navbar navbar-expand-md navbar-light justify-content-end justify-content-md-between w-100">
                                        <button class="btn btn-icon navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                                            <i data-feather="align-justify" class="font-medium-5"></i>
                                        </button>

                                        <!-- collapse  -->
                                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                            <div class="profile-tabs d-flex justify-content-between flex-wrap mt-1 mt-md-0">
                                                <ul class="nav nav-pills mb-0">
                                                    <li class="nav-item">
                                                        <a class="nav-link fw-bold active" href="#">
                                                            <span class="d-none d-md-block"><?= __("About") ?></span>
                                                            <i data-feather="rss" class="d-block d-md-none"></i>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link fw-bold" href="#">
                                                            <span class="d-none d-md-block"><?= __("Topics") ?></span>
                                                            <i data-feather="info" class="d-block d-md-none"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!-- edit button 
                                               <button on.click.href="<?=Config::BASE_URL . "profile-edit";?>" class="btn btn-primary">
                                                    <i data-feather="edit" class="d-block d-md-none"></i>
                                                    <span class="fw-bold d-none d-md-block"><?= __("Edit") ?></span>
                                                </button>-->
                                                <a href="<?=Config::BASE_URL . "profile-edit";?>" class="btn btn-outline-primary waves-effect">Editar</a>
                                            </div>
                                        </div>
                                        <!--/ collapse  -->
                                    </nav>
                                    <!--/ navbar -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--/ profile header -->

                    <!-- profile info section -->
                    <section id="profile-info">
                        <div class="row">
                            <!-- left profile info section -->
                            <div class="col-lg-3 col-12 order-1 order-lg-1">
                                <!-- about -->
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="mb-75"><?= __("About") ?></h5>
                                        <p class="card-text">
                                            <?=$user["text_about"] ?>
                                        </p>
                                        <div class="mt-2">
                                            <h5 class="mb-75">Department:</h5>
                                            <p class="card-text"><?=$user_base["departament"]["name"]?></p>
                                        </div>
                                        <div class="mt-2">
                                            <h5 class="mb-75">Lives:</h5>
                                            <?php 
                                            if(!isset($user_base["city"]["name"])){
                                                $city = "Cidade N/C";
                                            } else{
                                                $city = $user_base["city"]["name"];
                                            } 
                                            if(!isset($user["enum_country"]["nome_pais"])){
                                                $country = "País N/C";
                                            } else{
                                                $country = $user["enum_country"]["nome_pais"];
                                            } 
                                            ?>
                                            <p class="card-text"><?=$city?>, <?=$country?></p>
                                        </div>
                                        <div class="mt-2">
                                            <h5 class="mb-75">Email:</h5>
                                            <p name="verified" class="card-text"><?=$user["email"] ?> <!--<i style="color:royalblue;" data-feather='check-circle'></i>--></p>
                                        </div>
                                        <div class="mt-2">
                                            <h5 class="mb-75">Phone:</h5>
                                            <p class="card-text"><?=$user["phone"] ?>
                                            <?php if($user["phone_verified"] != 1):?>
                                                <b style="color: red; font-size: 8px; margin-left: 5%;"><i  data-feather='alert-triangle'></i> Não Verificado!</b>
                                            <?php else:?>
                                                <i style="color:royalblue;" data-feather='check-circle'></i>
                                                <?php endif;?>
                                        </p>
                                        </div>
                                    </div>
                                </div>
                                <!--/ about -->

                               

                               
                            </div>
                            <!--/ left profile info section -->

                            <!-- center profile info section -->
                            <div class="col-lg-6 col-12 order-3 order-lg-2">
                                <!-- post 1 -->
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                            <!-- avatar -->
                                            <div class="avatar me-1">
                                                <img src="../layout/app-assets/images/portrait/small/avatar-s-18.jpg" alt="avatar img" height="50" width="50" />
                                            </div>
                                            <!--/ avatar -->
                                            <div class="profile-user-info">
                                                <h6 class="mb-0">Leeanna Alvord</h6>
                                                <small class="text-muted">12 Dec 2018 at 1:16 AM</small>
                                            </div>
                                        </div>
                                        <p class="card-text">
                                            Wonderful Machine· A well-written bio allows viewers to get to know a photographer beyond the work. This
                                            can make the difference when presenting to clients who are looking for the perfect fit.
                                        </p>
                                        <!-- post img -->
                                        <img class="img-fluid rounded mb-75" src="../layout/app-assets/images/profile/post-media/2.jpg" alt="avatar img" />
                                        <!--/ post img -->

                                        <!-- like share -->
                                        <div class="row d-flex justify-content-start align-items-center flex-wrap pb-50">
                                            <div class="col-sm-6 d-flex justify-content-between justify-content-sm-start mb-2">
                                                <a href="#" class="d-flex align-items-center text-muted text-nowrap">
                                                    <i data-feather="heart" class="profile-likes font-medium-3 me-50"></i>
                                                    <span>1.25k</span>
                                                </a>

                                                <!-- avatar group with tooltip -->
                                                <div class="d-flex align-items-center">
                                                    <div class="avatar-group ms-1">
                                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" title="Trina Lynes" class="avatar pull-up">
                                                            <img src="../layout/app-assets/images/portrait/small/avatar-s-1.jpg" alt="Avatar" height="26" width="26" />
                                                        </div>
                                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" title="Lilian Nenez" class="avatar pull-up">
                                                            <img src="../layout/app-assets/images/portrait/small/avatar-s-2.jpg" alt="Avatar" height="26" width="26" />
                                                        </div>
                                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" title="Alberto Glotzbach" class="avatar pull-up">
                                                            <img src="../layout/app-assets/images/portrait/small/avatar-s-3.jpg" alt="Avatar" height="26" width="26" />
                                                        </div>
                                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" title="George Nordic" class="avatar pull-up">
                                                            <img src="../layout/app-assets/images/portrait/small/avatar-s-5.jpg" alt="Avatar" height="26" width="26" />
                                                        </div>
                                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" title="Vinnie Mostowy" class="avatar pull-up">
                                                            <img src="../layout/app-assets/images/portrait/small/avatar-s-4.jpg" alt="Avatar" height="26" width="26" />
                                                        </div>
                                                    </div>
                                                    <a href="#" class="text-muted text-nowrap ms-50">+140 more</a>
                                                </div>
                                                <!-- avatar group with tooltip -->
                                            </div>

                                            <!-- share and like count and icons -->
                                            <div class="col-sm-6 d-flex justify-content-between justify-content-sm-end align-items-center mb-2">
                                                <a href="#" class="text-nowrap">
                                                    <i data-feather="message-square" class="text-body font-medium-3 me-50"></i>
                                                    <span class="text-muted me-1">1.25k</span>
                                                </a>

                                                <a href="#" class="text-nowrap">
                                                    <i data-feather="share-2" class="text-body font-medium-3 mx-50"></i>
                                                    <span class="text-muted">1.25k</span>
                                                </a>
                                            </div>
                                            <!-- share and like count and icons -->
                                        </div>
                                        <!-- like share -->

                                        <!-- comments -->
                                        <div class="d-flex align-items-start mb-1">
                                            <div class="avatar mt-25 me-75">
                                                <img src="../layout/app-assets/images/portrait/small/avatar-s-6.jpg" alt="Avatar" height="34" width="34" />
                                            </div>
                                            <div class="profile-user-info w-100">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h6 class="mb-0">Kitty Allanson</h6>
                                                    <a href="#">
                                                        <i data-feather="heart" class="text-body font-medium-3"></i>
                                                        <span class="align-middle text-muted">34</span>
                                                    </a>
                                                </div>
                                                <small>Easy & smart fuzzy search🕵🏻 functionality which enables users to search quickly.</small>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-start mb-1">
                                            <div class="avatar mt-25 me-75">
                                                <img src="../layout/app-assets/images/portrait/small/avatar-s-8.jpg" alt="Avatar" height="34" width="34" />
                                            </div>
                                            <div class="profile-user-info w-100">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h6 class="mb-0">Jackey Potter</h6>
                                                    <a href="#">
                                                        <i data-feather="heart" class="profile-likes font-medium-3"></i>
                                                        <span class="align-middle text-muted">61</span>
                                                    </a>
                                                </div>
                                                <small>
                                                    Unlimited color🖌 options allows you to set your application color as per your branding 🤪.
                                                </small>
                                            </div>
                                        </div>
                                        <!--/ comments -->

                                        <!-- comment box -->
                                        <fieldset class="mb-75">
                                            <label class="form-label" for="label-textarea"><?= __("Add Comment") ?></label>
                                            <textarea class="form-control" id="label-textarea" rows="3" placeholder="Add Comment"></textarea>
                                        </fieldset>
                                        <!--/ comment box -->
                                        <button type="button" class="btn btn-sm btn-primary"><?= __("Post Comment") ?></button>
                                    </div>
                                </div>
                                <!--/ post 1 -->

                               
                            </div>
                            <!--/ center profile info section -->

                            <!-- right profile info section -->
                            <div class="col-lg-3 col-12 order-2">
                                <!-- latest profile pictures -->
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="mb-0">Social Network</h5>
                                        <div class="profile-card-social">
                                            <a href="https://www.facebook.com/iaMuhammedErdem" class="profile-card-social__item facebook" target="_blank">
                                            <span class="icon-font">
                                                <svg class="icon"><use xlink:href="#icon-facebook"></use></svg>
                                            </span>
                                            </a>

                                            <a href="https://twitter.com/iaMuhammedErdem" class="profile-card-social__item twitter" target="_blank">
                                            <span class="icon-font">
                                                <svg class="icon"><use xlink:href="#icon-twitter"></use></svg>
                                            </span>
                                            </a>

                                            <a href="https://www.instagram.com/iamuhammederdem" class="profile-card-social__item instagram" target="_blank">
                                            <span class="icon-font">
                                                <svg class="icon"><use xlink:href="#icon-instagram"></use></svg>
                                            </span>
                                            </a>

                                            <a href="https://www.behance.net/iaMuhammedErdem" class="profile-card-social__item behance" target="_blank">
                                            <span class="icon-font">
                                                <svg class="icon"><use xlink:href="#icon-behance"></use></svg>
                                            </span>
                                            </a>

                                            <a href="https://github.com/muhammederdem" class="profile-card-social__item github" target="_blank">
                                            <span class="icon-font">
                                                <svg class="icon"><use xlink:href="#icon-github"></use></svg>
                                            </span>
                                            </a>

                                            <a href="https://codepen.io/JavaScriptJunkie" class="profile-card-social__item codepen" target="_blank">
                                            <span class="icon-font">
                                                <svg class="icon"><use xlink:href="#icon-codepen"></use></svg>
                                            </span>
                                            </a>

                                            <a href="http://muhammederdem.com.tr/" class="profile-card-social__item link" target="_blank">
                                            <span class="icon-font">
                                                <svg class="icon"><use xlink:href="#icon-link"></use></svg>
                                            </span>
                                            </a>
                                        </div>
                    
    </div>
                                    </div>
                                </div>
                                <!--/ latest profile pictures -->

              
                                            </div>
                                        </div>
                                        <!--/ polls card -->
                                    </div>
                                    <!--/ right profile info section -->
                                </div>

                                <!-- reload button -->
                                <div class="row">
                                    <div class="col-12 text-center">
                                        <button type="button" class="btn btn-sm btn-primary block-element border-0 mb-1">Load More</button>
                                    </div>
                                </div>
                                <!--/ reload button -->
                    </section>
                    <!--/ profile info section -->
                </div>

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <svg hidden="hidden">
  <defs>
    <symbol id="icon-codepen" viewBox="0 0 32 32">
      <title>codepen</title>
      <path d="M31.872 10.912v-0.032c0-0.064 0-0.064 0-0.096v-0.064c0-0.064 0-0.064-0.064-0.096 0 0 0-0.064-0.064-0.064 0-0.064-0.064-0.064-0.064-0.096 0 0 0-0.064-0.064-0.064 0-0.064-0.064-0.064-0.064-0.096l-0.192-0.192v-0.064l-0.064-0.064-14.592-9.696c-0.448-0.32-1.056-0.32-1.536 0l-14.528 9.696-0.32 0.32c0 0-0.064 0.064-0.064 0.096 0 0 0 0.064-0.064 0.064 0 0.064-0.064 0.064-0.064 0.096 0 0 0 0.064-0.064 0.064 0 0.064 0 0.064-0.064 0.096v0.064c0 0.064 0 0.064 0 0.096v0.064c0 0.064 0 0.096 0 0.16v9.696c0 0.064 0 0.096 0 0.16v0.064c0 0.064 0 0.064 0 0.096v0.064c0 0.064 0 0.064 0.064 0.096 0 0 0 0.064 0.064 0.064 0 0.064 0.064 0.064 0.064 0.096 0 0 0 0.064 0.064 0.064 0 0.064 0.064 0.064 0.064 0.096l0.256 0.256 0.064 0.032 14.528 9.728c0.224 0.16 0.48 0.224 0.768 0.224s0.544-0.064 0.768-0.224l14.528-9.728 0.32-0.32c0 0 0.064-0.064 0.064-0.096 0 0 0-0.064 0.064-0.064 0-0.064 0.064-0.064 0.064-0.096 0 0 0-0.064 0.064-0.064 0-0.064 0-0.064 0.064-0.096v-0.032c0-0.064 0-0.064 0-0.096v-0.064c0-0.064 0-0.096 0-0.16v-9.664c0-0.064 0-0.096 0-0.224zM17.312 4l10.688 7.136-4.768 3.168-5.92-3.936v-6.368zM14.56 4v6.368l-5.92 3.968-4.768-3.168 10.688-7.168zM2.784 13.664l3.392 2.304-3.392 2.304c0 0 0-4.608 0-4.608zM14.56 28l-10.688-7.136 4.768-3.2 5.92 3.936v6.4zM15.936 19.2l-4.832-3.232 4.832-3.232 4.832 3.232-4.832 3.232zM17.312 28v-6.432l5.92-3.936 4.8 3.168-10.72 7.2zM29.12 18.272l-3.392-2.304 3.392-2.304v4.608z"></path>
    </symbol>

    <symbol id="icon-github" viewBox="0 0 32 32">
      <title>github</title>
      <path d="M16.192 0.512c-8.832 0-16 7.168-16 16 0 7.072 4.576 13.056 10.944 15.168 0.8 0.16 1.088-0.352 1.088-0.768 0-0.384 0-1.632-0.032-2.976-4.448 0.96-5.376-1.888-5.376-1.888-0.736-1.856-1.792-2.336-1.792-2.336-1.44-0.992 0.096-0.96 0.096-0.96 1.6 0.128 2.464 1.664 2.464 1.664 1.44 2.432 3.744 1.728 4.672 1.344 0.128-1.024 0.544-1.728 1.024-2.144-3.552-0.448-7.296-1.824-7.296-7.936 0-1.76 0.64-3.168 1.664-4.288-0.16-0.416-0.704-2.016 0.16-4.224 0 0 1.344-0.416 4.416 1.632 1.28-0.352 2.656-0.544 4-0.544s2.72 0.192 4 0.544c3.040-2.080 4.384-1.632 4.384-1.632 0.864 2.208 0.32 3.84 0.16 4.224 1.024 1.12 1.632 2.56 1.632 4.288 0 6.144-3.744 7.488-7.296 7.904 0.576 0.512 1.088 1.472 1.088 2.976 0 2.144-0.032 3.872-0.032 4.384 0 0.416 0.288 0.928 1.088 0.768 6.368-2.112 10.944-8.128 10.944-15.168 0-8.896-7.168-16.032-16-16.032z"></path>
      <path d="M6.24 23.488c-0.032 0.064-0.16 0.096-0.288 0.064-0.128-0.064-0.192-0.16-0.128-0.256 0.032-0.096 0.16-0.096 0.288-0.064 0.128 0.064 0.192 0.16 0.128 0.256v0z"></path>
      <path d="M6.912 24.192c-0.064 0.064-0.224 0.032-0.32-0.064s-0.128-0.256-0.032-0.32c0.064-0.064 0.224-0.032 0.32 0.064s0.096 0.256 0.032 0.32v0z"></path>
      <path d="M7.52 25.12c-0.096 0.064-0.256 0-0.352-0.128s-0.096-0.32 0-0.384c0.096-0.064 0.256 0 0.352 0.128 0.128 0.128 0.128 0.32 0 0.384v0z"></path>
      <path d="M8.384 26.016c-0.096 0.096-0.288 0.064-0.416-0.064s-0.192-0.32-0.096-0.416c0.096-0.096 0.288-0.064 0.416 0.064 0.16 0.128 0.192 0.32 0.096 0.416v0z"></path>
      <path d="M9.6 26.528c-0.032 0.128-0.224 0.192-0.384 0.128-0.192-0.064-0.288-0.192-0.256-0.32s0.224-0.192 0.416-0.128c0.128 0.032 0.256 0.192 0.224 0.32v0z"></path>
      <path d="M10.912 26.624c0 0.128-0.16 0.256-0.352 0.256s-0.352-0.096-0.352-0.224c0-0.128 0.16-0.256 0.352-0.256 0.192-0.032 0.352 0.096 0.352 0.224v0z"></path>
      <path d="M12.128 26.4c0.032 0.128-0.096 0.256-0.288 0.288s-0.352-0.032-0.384-0.16c-0.032-0.128 0.096-0.256 0.288-0.288s0.352 0.032 0.384 0.16v0z"></path>
    </symbol>

    <symbol id="icon-location" viewBox="0 0 32 32">
      <title>location</title>
      <path d="M16 31.68c-0.352 0-0.672-0.064-1.024-0.16-0.8-0.256-1.44-0.832-1.824-1.6l-6.784-13.632c-1.664-3.36-1.568-7.328 0.32-10.592 1.856-3.2 4.992-5.152 8.608-5.376h1.376c3.648 0.224 6.752 2.176 8.608 5.376 1.888 3.264 2.016 7.232 0.352 10.592l-6.816 13.664c-0.288 0.608-0.8 1.12-1.408 1.408-0.448 0.224-0.928 0.32-1.408 0.32zM15.392 2.368c-2.88 0.192-5.408 1.76-6.912 4.352-1.536 2.688-1.632 5.92-0.288 8.672l6.816 13.632c0.128 0.256 0.352 0.448 0.64 0.544s0.576 0.064 0.832-0.064c0.224-0.096 0.384-0.288 0.48-0.48l6.816-13.664c1.376-2.752 1.248-5.984-0.288-8.672-1.472-2.56-4-4.128-6.88-4.32h-1.216zM16 17.888c-3.264 0-5.92-2.656-5.92-5.92 0-3.232 2.656-5.888 5.92-5.888s5.92 2.656 5.92 5.92c0 3.264-2.656 5.888-5.92 5.888zM16 8.128c-2.144 0-3.872 1.728-3.872 3.872s1.728 3.872 3.872 3.872 3.872-1.728 3.872-3.872c0-2.144-1.76-3.872-3.872-3.872z"></path>
      <path d="M16 32c-0.384 0-0.736-0.064-1.12-0.192-0.864-0.288-1.568-0.928-1.984-1.728l-6.784-13.664c-1.728-3.456-1.6-7.52 0.352-10.912 1.888-3.264 5.088-5.28 8.832-5.504h1.376c3.744 0.224 6.976 2.24 8.864 5.536 1.952 3.36 2.080 7.424 0.352 10.912l-6.784 13.632c-0.32 0.672-0.896 1.216-1.568 1.568-0.48 0.224-0.992 0.352-1.536 0.352zM15.36 0.64h-0.064c-3.488 0.224-6.56 2.112-8.32 5.216-1.824 3.168-1.952 7.040-0.32 10.304l6.816 13.632c0.32 0.672 0.928 1.184 1.632 1.44s1.472 0.192 2.176-0.16c0.544-0.288 1.024-0.736 1.28-1.28l6.816-13.632c1.632-3.264 1.504-7.136-0.32-10.304-1.824-3.104-4.864-5.024-8.384-5.216h-1.312zM16 29.952c-0.16 0-0.32-0.032-0.448-0.064-0.352-0.128-0.64-0.384-0.8-0.704l-6.816-13.664c-1.408-2.848-1.312-6.176 0.288-8.96 1.536-2.656 4.16-4.32 7.168-4.512h1.216c3.040 0.192 5.632 1.824 7.2 4.512 1.6 2.752 1.696 6.112 0.288 8.96l-6.848 13.632c-0.128 0.288-0.352 0.512-0.64 0.64-0.192 0.096-0.384 0.16-0.608 0.16zM15.424 2.688c-2.784 0.192-5.216 1.696-6.656 4.192-1.504 2.592-1.6 5.696-0.256 8.352l6.816 13.632c0.096 0.192 0.256 0.32 0.448 0.384s0.416 0.064 0.608-0.032c0.16-0.064 0.288-0.192 0.352-0.352l6.816-13.664c1.312-2.656 1.216-5.792-0.288-8.352-1.472-2.464-3.904-4-6.688-4.16h-1.152zM16 18.208c-3.424 0-6.24-2.784-6.24-6.24 0-3.424 2.816-6.208 6.24-6.208s6.24 2.784 6.24 6.24c0 3.424-2.816 6.208-6.24 6.208zM16 6.4c-3.072 0-5.6 2.496-5.6 5.6 0 3.072 2.528 5.6 5.6 5.6s5.6-2.496 5.6-5.6c0-3.104-2.528-5.6-5.6-5.6zM16 16.16c-2.304 0-4.16-1.888-4.16-4.16s1.888-4.16 4.16-4.16c2.304 0 4.16 1.888 4.16 4.16s-1.856 4.16-4.16 4.16zM16 8.448c-1.952 0-3.552 1.6-3.552 3.552s1.6 3.552 3.552 3.552c1.952 0 3.552-1.6 3.552-3.552s-1.6-3.552-3.552-3.552z"></path>
    </symbol>

    <symbol id="icon-facebook" viewBox="0 0 32 32">
      <title>facebook</title>
      <path d="M19 6h5v-6h-5c-3.86 0-7 3.14-7 7v3h-4v6h4v16h6v-16h5l1-6h-6v-3c0-0.542 0.458-1 1-1z"></path>
    </symbol>

    <symbol id="icon-instagram" viewBox="0 0 32 32">
      <title>instagram</title>
      <path d="M16 2.881c4.275 0 4.781 0.019 6.462 0.094 1.563 0.069 2.406 0.331 2.969 0.55 0.744 0.288 1.281 0.638 1.837 1.194 0.563 0.563 0.906 1.094 1.2 1.838 0.219 0.563 0.481 1.412 0.55 2.969 0.075 1.688 0.094 2.194 0.094 6.463s-0.019 4.781-0.094 6.463c-0.069 1.563-0.331 2.406-0.55 2.969-0.288 0.744-0.637 1.281-1.194 1.837-0.563 0.563-1.094 0.906-1.837 1.2-0.563 0.219-1.413 0.481-2.969 0.55-1.688 0.075-2.194 0.094-6.463 0.094s-4.781-0.019-6.463-0.094c-1.563-0.069-2.406-0.331-2.969-0.55-0.744-0.288-1.281-0.637-1.838-1.194-0.563-0.563-0.906-1.094-1.2-1.837-0.219-0.563-0.481-1.413-0.55-2.969-0.075-1.688-0.094-2.194-0.094-6.463s0.019-4.781 0.094-6.463c0.069-1.563 0.331-2.406 0.55-2.969 0.288-0.744 0.638-1.281 1.194-1.838 0.563-0.563 1.094-0.906 1.838-1.2 0.563-0.219 1.412-0.481 2.969-0.55 1.681-0.075 2.188-0.094 6.463-0.094zM16 0c-4.344 0-4.887 0.019-6.594 0.094-1.7 0.075-2.869 0.35-3.881 0.744-1.056 0.412-1.95 0.956-2.837 1.85-0.894 0.888-1.438 1.781-1.85 2.831-0.394 1.019-0.669 2.181-0.744 3.881-0.075 1.713-0.094 2.256-0.094 6.6s0.019 4.887 0.094 6.594c0.075 1.7 0.35 2.869 0.744 3.881 0.413 1.056 0.956 1.95 1.85 2.837 0.887 0.887 1.781 1.438 2.831 1.844 1.019 0.394 2.181 0.669 3.881 0.744 1.706 0.075 2.25 0.094 6.594 0.094s4.888-0.019 6.594-0.094c1.7-0.075 2.869-0.35 3.881-0.744 1.050-0.406 1.944-0.956 2.831-1.844s1.438-1.781 1.844-2.831c0.394-1.019 0.669-2.181 0.744-3.881 0.075-1.706 0.094-2.25 0.094-6.594s-0.019-4.887-0.094-6.594c-0.075-1.7-0.35-2.869-0.744-3.881-0.394-1.063-0.938-1.956-1.831-2.844-0.887-0.887-1.781-1.438-2.831-1.844-1.019-0.394-2.181-0.669-3.881-0.744-1.712-0.081-2.256-0.1-6.6-0.1v0z"></path>
      <path d="M16 7.781c-4.537 0-8.219 3.681-8.219 8.219s3.681 8.219 8.219 8.219 8.219-3.681 8.219-8.219c0-4.537-3.681-8.219-8.219-8.219zM16 21.331c-2.944 0-5.331-2.387-5.331-5.331s2.387-5.331 5.331-5.331c2.944 0 5.331 2.387 5.331 5.331s-2.387 5.331-5.331 5.331z"></path>
      <path d="M26.462 7.456c0 1.060-0.859 1.919-1.919 1.919s-1.919-0.859-1.919-1.919c0-1.060 0.859-1.919 1.919-1.919s1.919 0.859 1.919 1.919z"></path>
    </symbol>

    <symbol id="icon-twitter" viewBox="0 0 32 32">
      <title>twitter</title>
      <path d="M32 7.075c-1.175 0.525-2.444 0.875-3.769 1.031 1.356-0.813 2.394-2.1 2.887-3.631-1.269 0.75-2.675 1.3-4.169 1.594-1.2-1.275-2.906-2.069-4.794-2.069-3.625 0-6.563 2.938-6.563 6.563 0 0.512 0.056 1.012 0.169 1.494-5.456-0.275-10.294-2.888-13.531-6.862-0.563 0.969-0.887 2.1-0.887 3.3 0 2.275 1.156 4.287 2.919 5.463-1.075-0.031-2.087-0.331-2.975-0.819 0 0.025 0 0.056 0 0.081 0 3.181 2.263 5.838 5.269 6.437-0.55 0.15-1.131 0.231-1.731 0.231-0.425 0-0.831-0.044-1.237-0.119 0.838 2.606 3.263 4.506 6.131 4.563-2.25 1.762-5.075 2.813-8.156 2.813-0.531 0-1.050-0.031-1.569-0.094 2.913 1.869 6.362 2.95 10.069 2.95 12.075 0 18.681-10.006 18.681-18.681 0-0.287-0.006-0.569-0.019-0.85 1.281-0.919 2.394-2.075 3.275-3.394z"></path>
    </symbol>

    <symbol id="icon-behance" viewBox="0 0 32 32">
      <title>behance</title>
      <path d="M9.281 6.412c0.944 0 1.794 0.081 2.569 0.25 0.775 0.162 1.431 0.438 1.988 0.813 0.55 0.375 0.975 0.875 1.287 1.5 0.3 0.619 0.45 1.394 0.45 2.313 0 0.994-0.225 1.819-0.675 2.481-0.456 0.662-1.119 1.2-2.006 1.625 1.213 0.35 2.106 0.962 2.706 1.831 0.6 0.875 0.887 1.925 0.887 3.163 0 1-0.194 1.856-0.575 2.581-0.387 0.731-0.912 1.325-1.556 1.781-0.65 0.462-1.4 0.8-2.237 1.019-0.831 0.219-1.688 0.331-2.575 0.331h-9.544v-19.688h9.281zM8.719 14.363c0.769 0 1.406-0.181 1.906-0.55 0.5-0.363 0.738-0.963 0.738-1.787 0-0.456-0.081-0.838-0.244-1.131-0.169-0.294-0.387-0.525-0.669-0.688-0.275-0.169-0.588-0.281-0.956-0.344-0.356-0.069-0.731-0.1-1.113-0.1h-4.050v4.6h4.388zM8.956 22.744c0.425 0 0.831-0.038 1.213-0.125 0.387-0.087 0.731-0.219 1.019-0.419 0.287-0.194 0.531-0.45 0.706-0.788 0.175-0.331 0.256-0.756 0.256-1.275 0-1.012-0.287-1.738-0.856-2.175-0.569-0.431-1.325-0.644-2.262-0.644h-4.7v5.419h4.625z"></path>
      <path d="M22.663 22.675c0.587 0.575 1.431 0.863 2.531 0.863 0.788 0 1.475-0.2 2.044-0.6s0.913-0.825 1.044-1.262h3.45c-0.556 1.719-1.394 2.938-2.544 3.675-1.131 0.738-2.519 1.113-4.125 1.113-1.125 0-2.131-0.181-3.038-0.538-0.906-0.363-1.663-0.869-2.3-1.531-0.619-0.663-1.106-1.45-1.45-2.375-0.337-0.919-0.512-1.938-0.512-3.038 0-1.069 0.175-2.063 0.525-2.981 0.356-0.925 0.844-1.719 1.494-2.387s1.413-1.2 2.313-1.588c0.894-0.387 1.881-0.581 2.975-0.581 1.206 0 2.262 0.231 3.169 0.706 0.9 0.469 1.644 1.1 2.225 1.887s0.994 1.694 1.25 2.706c0.256 1.012 0.344 2.069 0.275 3.175h-10.294c0 1.119 0.375 2.188 0.969 2.756zM27.156 15.188c-0.462-0.512-1.256-0.794-2.212-0.794-0.625 0-1.144 0.106-1.556 0.319-0.406 0.213-0.738 0.475-0.994 0.787-0.25 0.313-0.425 0.65-0.525 1.006-0.1 0.344-0.163 0.663-0.181 0.938h6.375c-0.094-1-0.438-1.738-0.906-2.256z"></path>
      <path d="M20.887 8h7.981v1.944h-7.981v-1.944z"></path>
    </symbol>

    <symbol id="icon-link" viewBox="0 0 32 32">
      <title>link</title>
      <path d="M17.984 11.456c-0.704 0.704-0.704 1.856 0 2.56 2.112 2.112 2.112 5.568 0 7.68l-5.12 5.12c-2.048 2.048-5.632 2.048-7.68 0-1.024-1.024-1.6-2.4-1.6-3.84s0.576-2.816 1.6-3.84c0.704-0.704 0.704-1.856 0-2.56s-1.856-0.704-2.56 0c-1.696 1.696-2.624 3.968-2.624 6.368 0 2.432 0.928 4.672 2.656 6.4 1.696 1.696 3.968 2.656 6.4 2.656s4.672-0.928 6.4-2.656l5.12-5.12c3.52-3.52 3.52-9.248 0-12.8-0.736-0.672-1.888-0.672-2.592 0.032z"></path>
      <path d="M29.344 2.656c-1.696-1.728-3.968-2.656-6.4-2.656s-4.672 0.928-6.4 2.656l-5.12 5.12c-3.52 3.52-3.52 9.248 0 12.8 0.352 0.352 0.8 0.544 1.28 0.544s0.928-0.192 1.28-0.544c0.704-0.704 0.704-1.856 0-2.56-2.112-2.112-2.112-5.568 0-7.68l5.12-5.12c2.048-2.048 5.632-2.048 7.68 0 1.024 1.024 1.6 2.4 1.6 3.84s-0.576 2.816-1.6 3.84c-0.704 0.704-0.704 1.856 0 2.56s1.856 0.704 2.56 0c1.696-1.696 2.656-3.968 2.656-6.4s-0.928-4.704-2.656-6.4z"></path>
    </symbol>
  </defs>
</svg>



























    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->



    <script src="../layout/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="../layout/app-assets/vendors/js/charts/apexcharts.min.js"></script>
    
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme -->
    <script src="../layout/app-assets/js/core/app-menu.js"></script>
    <script src="../layout/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->
    <!-- BEGIN: Page Vendor JS-->
    <script src="../layout/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="../layout/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="../layout/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="../layout/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
    <script src="../layout/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="../layout/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js"></script>
    <script src="../layout/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="../layout/app-assets/vendors/js/tables/datatable/jszip.min.js"></script>
    <script src="../layout/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="../layout/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="../layout/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="../layout/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="../layout/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js"></script>
    <script src="../layout/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="../layout/app-assets/vendors/js/forms/cleave/cleave.min.js"></script>
    <script src="../layout/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js"></script>
    <!-- END: Page Vendor JS-->


    <!-- BEGIN: Page JS
    <script src="../layout/app-assets/js/scripts/pages/app-user-list.js"></script>-->
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
        
        <?php

if($_SESSION["theme"] == 2) { ?>
            $("body").addClass("dark-layout");
        <?php } ?>

        $(".change-theme").click(function(e) {
            $("body").append("<div id='jisnasdxkesne23135' style='position: fixed;z-index:99999;display:flex;align-items:center;justify-content:center;top:0;left:0;width:100vw;height:100vh;background:#000000a3;font-size:40px;color:#fff;text-align:center;'><?= __("message.loading") ?></div>");
            e.preventDefault();
            axios.post('<?= Config::BASE_ACTION_URL ?>/user/toggle/theme', {})
            .then(function(response) {
                if (response.data.error) {
                      throw response.data;                      
                } else {
                    localStorage.setItem("light-layout-current-skin", "light-layout");
                    window.location.reload();
                }
            })
            .catch(function(error) {
                $("#jisnasdxkesne23135").remove();
                Swal.fire({
                    title: '<?= __("error.failed_change_theme") ?>',
                    text: error.message,
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#1f8cd4',
                    cancelButtonColor: '#d33',
                    confirmButtonText: '<?= __("OK") ?>'
                })
            });
        })
    </script>
</body>
<!-- END: Body-->

</html>
