<?php

use API\Controller\Config;
use const Siler\Config\CONFIG;

require "src/api/api.imgbb.easyprojects.php";

/*$file_name = basename(__FILE__, ".php");
require __DIR__ . "/../template/imports.php";*/
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">


<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">

    <title>WeJourney - Novo Material</title>
    <meta name='robots' content='noindex'>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="layout/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/vendors/css/editors/quill/katex.min.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/vendors/css/editors/quill/monokai-sublime.min.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/vendors/css/editors/quill/quill.snow.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/vendors/css/editors/quill/quill.bubble.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css2?family=Inconsolata&amp;family=Roboto+Slab&amp;family=Slabo+27px&amp;family=Sofia&amp;family=Ubuntu+Mono&amp;display=swap">
    <!-- END: Vendor CSS-->

    <?php include "view/src/head.php"; ?>
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="layout/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/css/plugins/forms/form-quill-editor.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">

    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="layout/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static   menu-collapsed" data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    <!--BEGIN: Navbar -->
    <?php include "view/src/header.php";?>
    <!--END: Navbar -->

    <!--BEGIN: Sidebar -->
    <?php include "view/src/mainMenu.php";?>

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">API Keys</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a
                                            href="<?=Config::BASE_URL . 'dashboard'?>">Dashboard</a>
                                    </li>
                                    <!-- <li class="breadcrumb-item"><a href="<?=Config::BASE_URL . 'my-department'?>">My Department</a>
                                    </li> -->
                                    <li class="breadcrumb-item active">API Keys
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">
                <section id="ApiKeyPage">
                    <!-- create API key -->
                    <div class="card">
                        <div class="card-header pb-0">
                            <h4 class="card-title">Create an API Key</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-5 order-md-0 order-1">
                                <div class="card-body">
                                    <!-- form -->
                                    <form id="createApiForm" onsubmit="return false">
                                        <input hidden value="<?=$_SESSION["csrf_token"]?>" name="csrf_token" type="text">
                                        <div class="mb-2">
                                            <label for="ApiKeyType" class="form-label">Selecione o tipo e API Key que
                                                deseja criar</label>
                                            <select class="select2 form-select" id="ApiKeyType" name="type">
                                                <option disabled value="">Selecione o Tipo de API-Key</option>
                                                <option value="1">Read Only</option>
                                                <option value="2">Read &amp; Write</option>
                                                <option value="99">Full Control</option>
                                            </select>
                                        </div>
                                        <div class="mb-2">
                                            <label for="ApiKeyType" class="form-label">Validade</label>
                                            <select class="select2 form-select" id="ApiKeyType" name="valid">
                                                <option disabled value="">Selecione o tempo de validade da chave
                                                </option>
                                                <option value="1">30 dias</option>
                                                <option value="2">60 dias</option>
                                                <option value="3">90 dias</option>
                                                <option value="4">6 meses</option>
                                                <option value="5">1 ano</option>
                                                <option value="99">Indefinido</option>
                                            </select>
                                        </div>

                                        <div class="mb-2">
                                            <label for="nameApiKey" class="form-label">Nome para a API Key</label>
                                            <input class="form-control" required type="text" name="apiKeyName"
                                                placeholder="Descrição da Chave" id="nameApiKey" maxlength="60"
                                                data-msg="Please enter API key name" />
                                        </div>

                                        <div class="mb-2">
                                            <label for="nameApiKey" class="form-label">Empresa que utilizará</label>
                                            <select class="select2 form-select" id="ApiKeyType" name="company">
                                                <option disabled value="">Selecione o Tipo de API-Key</option>
                                                <?php if (mysqli_num_rows($companies) > 0) : ?>
                                                <?php while ($company = mysqli_fetch_assoc($companies)) : ?>
                                                <option value="<?=$company["com_id"]?>"><?=$company["com_name"]?>
                                                </option>
                                                <?php endwhile;?>
                                                <?php endif;?>
                                                <option value="9999">*** SISTEMA ****</option>
                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary w-100">Gerar</button>
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-7 order-md-1 order-0">
                                <div class="text-center">
                                    <img class="img-fluid text-center" src="<?=Config::BASE_URL. "src/img/globe.png"?>"
                                        alt="illustration" width="250" style="margin:20px;" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- api key list -->
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">API Keys</h4>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                               Estas são as API Keys necessárias para liberação de acesso de aplicações terceiras ao nosso sistema.
                            </p>

                            <div class="row gy-2">

                                <?php if (mysqli_num_rows($keys) > 0) : ?>
                                <?php while ($key = mysqli_fetch_assoc($keys)) : ?>

                                <div class="col-12">
                                    <div class="bg-light-secondary position-relative rounded p-2" style="border-radius:20px !important;">
                                        <div class="dropdown dropstart btn-pinned">
                                            <a class="btn btn-icon rounded-circle hide-arrow dropdown-toggle p-0"
                                                href="javascript:void(0)" id="dropdownMenuButton1"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i data-feather="more-vertical" class="font-medium-4"></i>
                                            </a>
                                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                <!-- <li>
                                                    <a class="dropdown-item d-flex align-items-center" href="#">
                                                        <i data-feather="edit-2" class="me-50"></i><span>Edit</span>
                                                    </a>
                                                </li> -->
                                                <li>
                                                    <a class="dropdown-item d-flex align-items-center delete" data-code="<?=$key["api_id"]?>" href="#">
                                                        <i data-feather="trash-2" class="me-50"></i><span>Delete</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="d-flex align-items-center flex-wrap">
                                            <h4 class="mb-1 me-1"><?=$key["api_name"]?></h4>
                                            <span
                                                class="badge badge-light-primary mb-1"><?php if($key["api_type"] == 1){echo "Read Only";}else if ($key["api_type"] == 2){echo "Read & Write";}else{ echo "Full Access";} ?></span>
                                        </div>
                                        <h6s class="d-flex align-items-center fw-bolder" style="font-size:12px;">
                                            <span class="me-50">API Key: <?=$key["api_key"]?></span>
                                            <span><i data-feather="copy" onclick="copiar('<?=$key["api_key"]?>')"
                                                    class="font-medium-4 cursor-pointer"></i></span>
                                        </h6s>
                                        <span> 
                                            <br />
                                            <span class="badge badge-light-info mb-1 me-2"> Gerado em: 
                                                <?php $timestamp = strtotime($key["api_created_at"]);
                                                    $dataFormatada = date('d/m/Y \à\s H:i \h\r\s', $timestamp);
                                                    echo $dataFormatada; 
                                                    ?>
                                            </span>
                                            <span class="badge badge-light-<?php 
                                            $dataAtual = new \DateTime();  
                                            $dataExpiracao = new DateTime($key["api_expiration_date"]);
                                            if ($dataExpiracao <= $dataAtual){echo "danger";}else{echo "success";} ?> mb-1">  Valido até: 
                                                <?php $timestamp = strtotime($key["api_expiration_date"]);
                                                    $dataFormatada = date('d/m/Y \à\s H:i \h\r\s', $timestamp);
                                                    echo $dataFormatada; 
                                                    ?>
                                            </span>
                                        </span>
                                    </div>
                                </div>




                                <?php endwhile;?>
                                <?php endif;?>





                            </div>
                        </div>
                    </div>
                </section>

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->

    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->
    <script>
    $(function() {
        var valorDaDiv = $(".editor").text();
        $("#body").val(valorDaDiv);
    });
    </script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>


    <script src="https://cdn.tiny.cloud/1/kax3g6nv8huzxh65lnkeyjb9qhudlkdh33rgg5zydz16c8pe/tinymce/5/tinymce.min.js"
        referrerpolicy="origin"></script>

    <!-- BEGIN: Vendor JS-->
    <script src="layout/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="layout/app-assets/vendors/js/editors/quill/katex.min.js"></script>
    <script src="layout/app-assets/vendors/js/editors/quill/highlight.min.js"></script>
    <script src="layout/app-assets/vendors/js/editors/quill/quill.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="layout/app-assets/js/core/app-menu.js"></script>
    <script src="layout/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="layout/app-assets/js/scripts/forms/form-quill-editor.js"></script>
    <?php
require __DIR__ . "/../../" . Config::BASE_PATH_JS . str_replace(".view", ".js.php", basename(__FILE__, ".php"));
?>
    <script>
    $(".ql-editor").keyup(function() {
        var value = $(this).html();
        $("#editorCopy").val(value);
    }).keyup();
    </script>

    <script src="layout/app-assets/js/scripts/my-department.js"></script>
    <script src="layout/app-assets/js/scripts/pages/page-api-key.js"></script>

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