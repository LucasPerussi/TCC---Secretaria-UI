<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">

    <title>WeJourney</title>
    <link rel="apple-touch-icon" href="../view/src/img/favcon-vr.ico">
    <link rel="shortcut icon" type="image/x-icon" href="../view/src/img/favcon-vr.ico">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../../../layout/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="../../../layout/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../../../layout/app-assets/vendors/css/tables/datatable/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="../../../layout/app-assets/vendors/css/tables/datatable/responsive.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="../../../layout/app-assets/vendors/css/tables/datatable/buttons.bootstrap5.min.css">
    <link rel="stylesheet" type="text/css" href="../../../layout/app-assets/vendors/css/tables/datatable/rowGroup.bootstrap5.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../../../layout/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../../../layout/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="../../../layout/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="../../../layout/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="../../../layout/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../layout/app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="../../../layout/app-assets/css/themes/semi-dark-layout.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../../../layout/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="../../../layout/app-assets/css/plugins/forms/form-validation.css">
    
    <link rel="stylesheet" type="text/css" href="../../../layout/app-assets/css/pages/page-profile.css">
    <!-- END: Page CSS-->
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="layout/assets/css/style.css">
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
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown">
                            <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i data-feather="grid"></i></button>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a class="dropdown-item" href="app-todo.html"><i class="me-1" data-feather="check-square"></i><span class="align-middle">Todo</span></a>
                                <a class="dropdown-item" href="app-chat.html"><i class="me-1" data-feather="message-square"></i><span class="align-middle">Chat</span></a>
                                <a class="dropdown-item" href="app-email.html"><i class="me-1" data-feather="mail"></i><span class="align-middle">Email</span></a>
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
                                <img class="card-img-top" src="../layout/app-assets/images/profile/user-uploads/timeline.jpg" alt="User Profile Image" />
                                <!--/ profile cover photo -->

                                <div class="position-relative">
                                    <!-- profile picture -->
                                    <div class="profile-img-container d-flex align-items-center">
                                        <div class="profile-img">
                                            <img src="../layout/app-assets/images/portrait/small/avatar-s-2.jpg" class="rounded img-fluid" alt="Card image" />
                                        </div>
                                        <!-- profile title -->
                                        <div class="profile-title ms-3">
                                            <h2 class="text-white">Kitty Allanson</h2>
                                            <p class="text-white">UI/UX Designer</p>
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
                                                            <span class="d-none d-md-block">Feed</span>
                                                            <i data-feather="rss" class="d-block d-md-none"></i>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link fw-bold" href="#">
                                                            <span class="d-none d-md-block">About</span>
                                                            <i data-feather="info" class="d-block d-md-none"></i>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link fw-bold" href="#">
                                                            <span class="d-none d-md-block">Photos</span>
                                                            <i data-feather="image" class="d-block d-md-none"></i>
                                                        </a>
                                                    </li>
                                                    <li class="nav-item">
                                                        <a class="nav-link fw-bold" href="#">
                                                            <span class="d-none d-md-block">Friends</span>
                                                            <i data-feather="users" class="d-block d-md-none"></i>
                                                        </a>
                                                    </li>
                                                </ul>
                                                <!-- edit button -->
                                                <button on.click.href="../admin/edit-user.php" class="btn btn-primary">
                                                    <i data-feather="edit" class="d-block d-md-none"></i>
                                                    <span class="fw-bold d-none d-md-block">Edit</span>
                                                </button>
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
                            <div class="col-lg-3 col-12 order-2 order-lg-1">
                                <!-- about -->
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="mb-75">About</h5>
                                        <p class="card-text">
                                            Tart I love sugar plum I love oat cake. Sweet ⭐️ roll caramels I love jujubes. Topping cake wafer.
                                        </p>
                                        <div class="mt-2">
                                            <h5 class="mb-75">Joined:</h5>
                                            <p class="card-text">November 15, 2015</p>
                                        </div>
                                        <div class="mt-2">
                                            <h5 class="mb-75">Lives:</h5>
                                            <p class="card-text">New York, USA</p>
                                        </div>
                                        <div class="mt-2">
                                            <h5 class="mb-75">Email:</h5>
                                            <p class="card-text">bucketful@fiendhead.org</p>
                                        </div>
                                        <div class="mt-2">
                                            <h5 class="mb-50">Website:</h5>
                                            <p class="card-text mb-0">www.pixinvent.com</p>
                                        </div>
                                    </div>
                                </div>
                                <!--/ about -->

                               

                               
                            </div>
                            <!--/ left profile info section -->

                            <!-- center profile info section -->
                            <div class="col-lg-6 col-12 order-1 order-lg-2">
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
                                            <label class="form-label" for="label-textarea">Add Comment</label>
                                            <textarea class="form-control" id="label-textarea" rows="3" placeholder="Add Comment"></textarea>
                                        </fieldset>
                                        <!--/ comment box -->
                                        <button type="button" class="btn btn-sm btn-primary">Post Comment</button>
                                    </div>
                                </div>
                                <!--/ post 1 -->

                                <!-- post 2 -->
                                <div class="card">
                                    <div class="card-body">
                                        <!-- avatar image and title -->
                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                            <div class="avatar me-1">
                                                <img src="../layout/app-assets/images/portrait/small/avatar-s-22.jpg" alt="avatar img" height="50" width="50" />
                                            </div>
                                            <div class="profile-user-info">
                                                <h6 class="mb-0">Rosa Walters</h6>
                                                <small class="text-muted">11 Dec 2019 at 1:16 AM</small>
                                            </div>
                                        </div>
                                        <!--/ avatar image and title -->
                                        <p class="card-text">
                                            Wonderful Machine· A well-written bio allows viewers to get to know a photographer beyond the work. This
                                            can make the difference when presenting to clients who are looking for the perfect fit.
                                        </p>
                                        <!-- post img -->
                                        <img class="img-fluid rounded mb-75" src="../layout/app-assets/images/profile/post-media/25.jpg" alt="avatar img" />
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
                                                    <a href="#" class="text-muted text-nowrap ms-50">+271 more</a>
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
                                            <div class="avatar mt-25 me-50">
                                                <img src="../layout/app-assets/images/portrait/small/avatar-s-3.jpg" alt="Avatar" height="34" width="34" />
                                            </div>
                                            <div class="profile-user-info w-100">
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <h6 class="mb-0">Kitty Allanson</h6>
                                                    <a href="#">
                                                        <i data-feather="heart" class="text-body font-medium-3"></i>
                                                        <span class="align-middle text-muted">34</span>
                                                    </a>
                                                </div>
                                                <small>Easy & smart fuzzy search🕵🏻 functionality which enables users to search quickly. </small>
                                            </div>
                                        </div>
                                        <!--/ comments -->

                                        <!-- comment text area -->
                                        <fieldset class="mb-75">
                                            <label class="form-label" for="label-textarea2">Add Comment</label>
                                            <textarea class="form-control" id="label-textarea2" rows="3" placeholder="Add Comment"></textarea>
                                        </fieldset>
                                        <!--/ comment text area -->
                                        <button type="button" class="btn btn-sm btn-primary">Post Comment</button>
                                    </div>
                                </div>
                                <!--/ post 2 -->

                                <!-- post 3 -->
                                <div class="card">
                                    <div class="card-body">
                                        <!-- avatar image title -->
                                        <div class="d-flex justify-content-start align-items-center mb-1">
                                            <div class="avatar me-1">
                                                <img src="../layout/app-assets/images/portrait/small/avatar-s-15.jpg" alt="avatar img" height="50" width="50" />
                                            </div>
                                            <div class="profile-user-info">
                                                <h6 class="mb-0">Charles Watson</h6>
                                                <small class="text-muted">12 Dec 2019 at 1:16 AM</small>
                                            </div>
                                        </div>
                                        <!--/ avatar image title -->

                                        <p class="card-text">
                                            Wonderful Machine· A well-written bio allows viewers to get to know a photographer beyond the work. This
                                            can make the difference when presenting to clients who are looking for the perfect fit.
                                        </p>

                                        <!-- video -->
                                        <iframe src="https://www.youtube.com/embed/6stlCkUDG_s" class="w-100 rounded border-0 height-250 mb-50"></iframe>
                                        <!--/ video -->

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
                                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" title="Vinnie Mostowy" class="avatar pull-up">
                                                            <img src="../layout/app-assets/images/portrait/small/avatar-s-5.jpg" alt="Avatar" height="26" width="26" />
                                                        </div>
                                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" title="Elicia Rieske" class="avatar pull-up">
                                                            <img src="../layout/app-assets/images/portrait/small/avatar-s-7.jpg" alt="Avatar" height="26" width="26" />
                                                        </div>
                                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" title="Julee Rossignol" class="avatar pull-up">
                                                            <img src="../layout/app-assets/images/portrait/small/avatar-s-10.jpg" alt="Avatar" height="26" width="26" />
                                                        </div>
                                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" title="Darcey Nooner" class="avatar pull-up">
                                                            <img src="../layout/app-assets/images/portrait/small/avatar-s-8.jpg" alt="Avatar" height="26" width="26" />
                                                        </div>
                                                        <div data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="bottom" title="Elicia Rieske" class="avatar pull-up">
                                                            <img src="../layout/app-assets/images/portrait/small/avatar-s-7.jpg" alt="Avatar" height="26" width="26" />
                                                        </div>
                                                    </div>
                                                    <a href="#" class="text-muted text-nowrap ms-50">+264 more</a>
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

                                        <!-- comment -->
                                        <div class="d-flex align-items-start mb-1">
                                            <div class="avatar mt-25 me-50">
                                                <img src="../layout/app-assets/images/portrait/small/avatar-s-3.jpg" alt="Avatar" height="34" width="34" />
                                            </div>
                                            <div class="profile-user-info w-100">
                                                <div class="d-flex align-content-center justify-content-between">
                                                    <h6 class="mb-0">Kitty Allanson</h6>
                                                    <a href="#">
                                                        <i data-feather="heart" class="text-body font-medium-3"></i>
                                                        <span class="align-middle text-muted">34</span>
                                                    </a>
                                                </div>
                                                <small>Easy & smart fuzzy search🕵🏻 functionality which enables users to search quickly.</small>
                                            </div>
                                        </div>
                                        <!-- comment -->

                                        <!-- comment text area -->
                                        <fieldset class="mb-75">
                                            <label class="form-label" for="label-textarea3">Add Comment</label>
                                            <textarea class="form-control" id="label-textarea3" rows="3" placeholder="Add Comment"></textarea>
                                        </fieldset>
                                        <!-- comment text area -->
                                        <button type="button" class="btn btn-sm btn-primary">Post Comment</button>
                                    </div>
                                </div>
                                <!--/ post 3 -->
                            </div>
                            <!--/ center profile info section -->

                            <!-- right profile info section -->
                            <div class="col-lg-3 col-12 order-3">
                                <!-- latest profile pictures -->
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="mb-0">Latest Photos</h5>
                                        <div class="row">
                                            <div class="col-md-4 col-6 profile-latest-img">
                                                <a href="#">
                                                    <img src="../layout/app-assets/images/profile/user-uploads/user-13.jpg" class="img-fluid rounded" alt="avatar img" />
                                                </a>
                                            </div>
                                            <div class="col-md-4 col-6 profile-latest-img">
                                                <a href="#">
                                                    <img src="../layout/app-assets/images/profile/user-uploads/user-02.jpg" class="img-fluid rounded" alt="avatar img" />
                                                </a>
                                            </div>
                                            <div class="col-md-4 col-6 profile-latest-img">
                                                <a href="#">
                                                    <img src="../layout/app-assets/images/profile/user-uploads/user-03.jpg" class="img-fluid rounded" alt="avatar img" />
                                                </a>
                                            </div>
                                            <div class="col-md-4 col-6 profile-latest-img">
                                                <a href="#">
                                                    <img src="../layout/app-assets/images/profile/user-uploads/user-04.jpg" class="img-fluid rounded" alt="avatar img" />
                                                </a>
                                            </div>
                                            <div class="col-md-4 col-6 profile-latest-img">
                                                <a href="#">
                                                    <img src="../layout/app-assets/images/profile/user-uploads/user-05.jpg" class="img-fluid rounded" alt="avatar img" />
                                                </a>
                                            </div>
                                            <div class="col-md-4 col-6 profile-latest-img">
                                                <a href="#">
                                                    <img src="../layout/app-assets/images/profile/user-uploads/user-06.jpg" class="img-fluid rounded" alt="avatar img" />
                                                </a>
                                            </div>
                                            <div class="col-md-4 col-6 profile-latest-img">
                                                <a href="#">
                                                    <img src="../layout/app-assets/images/profile/user-uploads/user-07.jpg" class="img-fluid rounded" alt="avatar img" />
                                                </a>
                                            </div>
                                            <div class="col-md-4 col-6 profile-latest-img">
                                                <a href="#">
                                                    <img src="../layout/app-assets/images/profile/user-uploads/user-08.jpg" class="img-fluid rounded" alt="avatar img" />
                                                </a>
                                            </div>
                                            <div class="col-md-4 col-6 profile-latest-img">
                                                <a href="#">
                                                    <img src="../layout/app-assets/images/profile/user-uploads/user-09.jpg" class="img-fluid rounded" alt="avatar img" />
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





























    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->

    <?php include "view/src/footer.php"; ?>

    <!-- BEGIN: Page Vendor JS-->
    <script src="../../../layout/app-assets/vendors/js/forms/select/select2.full.min.js" ></script>
    <script src="../../../layout/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="../../../layout/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
    <script src="../../../layout/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="../../../layout/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js"></script>
    <script src="../../../layout/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="../../../layout/app-assets/vendors/js/tables/datatable/jszip.min.js"></script>
    <script src="../../../layout/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="../../../layout/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="../../../layout/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="../../../layout/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="../../../layout/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js"></script>
    <script src="../../../layout/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="../../../layout/app-assets/vendors/js/forms/cleave/cleave.min.js"></script>
    <script src="../../../layout/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="../../../layout/app-assets/js/core/app-menu.js"></script>
    <script src="../../../layout/app-assets/js/core/app.js"></script>
    <script src="../../../layout/app-assets/js/scripts/pages/page-profile.js"></script>
    <!-- END: Theme JS-->

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
    </script>
</body>
<!-- END: Body-->

</html>