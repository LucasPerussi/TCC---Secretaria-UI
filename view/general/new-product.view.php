<?php

use API\Controller\Config;
use API\enum\Category;

use const Siler\Config\CONFIG;
use API\enum\Condicao;
use API\enum\LifeCicle;
use API\enum\Type;

require "src/api/api.imgbb.easyprojects.php";

?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">


<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">

    <title>Wetalk - Novo Produto</title>
    <meta name='robots' content='noindex'>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Inconsolata&amp;family=Roboto+Slab&amp;family=Slabo+27px&amp;family=Sofia&amp;family=Ubuntu+Mono&amp;display=swap">
    <link rel="stylesheet" type="text/css" href="layout/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/css/core/menu/menu-types/horizontal-menu.css">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/prefixfree/1.0.7/prefixfree.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        /* Adicione estilos personalizados conforme necessário */
        .swiper-container {
            width: 100%;
            margin: 20px auto;
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #fff;
            /* Adicione estilos adicionais conforme necessário */
        }
    </style>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">
    <link rel="stylesheet" type="text/css" href="layout/assets/css/style.css">

    <!-- END: Vendor CSS-->

    <?php include "view/src/head.php"; ?>
    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="layout/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/css/plugins/forms/form-quill-editor.css">

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="sweetalert2.min.js"></script>
    <link rel="stylesheet" href="sweetalert2.min.css">

    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->



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



    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Novo Produto</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= Config::BASE_URL . 'dashboard' ?>">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item active">Novo Produto
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">


                <div class="row">
                    <div class="col-md-6 col-sm-12">

                        <div class="card p-2 pt-1 pb-1">

                            <form id="open-topic">
                                <div class="mb-1 row">
                                    <div class="col-sm-12">
                                        <label class="col-form-label" for="email-icon">Nome</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bi bi-pencil"></i></span>
                                            <input type="name" id="name-icon" class="form-control" name="name" placeholder="Nome do Produto" />
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-1 row">
                                    <div class="col-sm-12">
                                        <label class="col-form-label" for="email-icon">Tipo</label>
                                    </div>
                                    <div class="col-sm-12">

                                        <select class="select2 form-select" required name="type" id="product-type">
                                            <option disabled value="0">Selecione a categoria:</option>
                                            <?php foreach (Type::$nomes as $id => $nome) : ?>
                                                <option value="<?= $id ?>"><?= htmlspecialchars($nome) ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>


                                </div>
                                <div class="mb-1 row">
                                    <div class="col-sm-12">
                                        <label class="col-form-label" for="email-icon">Ciclo de vida do equipamento</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <select class="select2 form-select" required name="life" id="product-cicle">
                                            <option disabled value="0">Selecione a ciclo de vida:</option>
                                            <?php foreach (LifeCicle::$nomes as $id => $nome) : ?>
                                                <option value="<?= $id ?>"><?= htmlspecialchars($nome) ?></option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="mb-1 row">
                                    <div class="col-sm-12">
                                        <label class="col-form-label" for="email-icon">Período de garantia</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <select class="select2 form-select" required name="warranty" id="product-warranty">
                                            <option disabled value="0">Selecione a garantia:</option>
                                            <?php foreach (LifeCicle::$nomes as $id => $nome) : ?>
                                                <option value="<?= $id ?>"><?= htmlspecialchars($nome) ?></option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="mb-1 row">
                                    <div class="col-sm-12">
                                        <label class="col-form-label" for="email-icon">Categoria do equipamento</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <select class="select2 form-select" required name="category" id="product-category">
                                            <option disabled value="0">Selecione a garantia:</option>
                                            <?php foreach (Category::$nomes as $id => $nome) : ?>
                                                <option value="<?= $id ?>"><?= htmlspecialchars($nome) ?></option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="mb-1 row">
                                    <div class="col-sm-12">
                                        <label class="col-form-label" for="email-icon">Part Number</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bi bi-camera"></i></span>
                                            <input type="name" id="name-icon" class="form-control" name="part" placeholder="Part Number do Produto (opcional)" />
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <?php if ($_SESSION["company_id"] == 9999) : ?>
                            <div class="card p-2 pt-1">


                                <div class="mb-1 row">
                                    <div class="col-sm-12">
                                        <label class="col-form-label" for="email-icon">Fabricante</label>
                                    </div>
                                    <div class="col-sm-12">

                                        <select class="select2 form-select " name="supplier" id="selectSup">
                                            <option selected value="0">Produto Genérico</option>
                                            <?php if (mysqli_num_rows($suppliers) > 0) : ?>
                                                <?php while ($supplier = mysqli_fetch_assoc($suppliers)) : ?>
                                                    <option value="<?= $supplier["sup_id"] ?>">
                                                        <?= $supplier["sup_name"] ?> </option>
                                                <?php endwhile ?>
                                            <?php endif ?>
                                        </select>

                                    </div>
                                </div>
                                <div class="mb-1 row">
                                    <div class="col-sm-12">
                                        <label class="col-form-label" for="email-icon">Empresa</label>
                                    </div>
                                    <div class="col-sm-12">

                                        <select class="select2 form-select f" name="company" id="selectLarge">
                                            <option value="9999" selected>Geral</option>
                                            <?php if (mysqli_num_rows($companies) > 0) : ?>
                                                <?php while ($company = mysqli_fetch_assoc($companies)) : ?>
                                                    <option value="<?= $company["com_id"] ?>">
                                                        <?= $company["com_name"] ?> </option>
                                                <?php endwhile ?>
                                            <?php endif ?>
                                        </select>

                                    </div>
                                </div>
                            </div>
                            <div class="card p-1 ">

                                <div class="mb-1 row">
                                    <h6>Realidade Aumentada</h6>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-check form-check-inline">
                                            <input type="checkbox" onchange="document.getElementById('ar').hidden = false;" class="form-check-input" id="scales" name="ar" />
                                            <label class="form-check-label" for="scales">Possuí
                                                AR</label>
                                        </div>
                                    </div>
                                </div>
                                <div hidden id="ar">
                                    <div class="card p-1 pt-0 mt-1 mb-0" id="bodyRequestDash">

                                        <div class="col-sm-12">
                                            <label class="col-form-label" for="email-icon">Link para o AR
                                                deste
                                                produto</label>
                                        </div>
                                        <div class="col-sm-12">
                                            <div class="input-group input-group-merge">
                                                <span class="input-group-text"><i class="bi bi-code"></i></span>
                                                <textarea type="name" id="name-icon" class="form-control" name="arUrl" placeholder="<div>codigo</div>" /></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php else : ?>
                            <input type="text" value="<?= $_SESSION["company_id"] ?>" hidden name="company">
                            <input type="text" value="n/a" hidden name="arUrl">
                            <input type="text" value="9999" hidden name="supplier">
                        <?php endif; ?>
                        <div class="card p-2 pt-1">

                            <div class="mb-1 row" id="link-section-img">
                                <div class="col-sm-12">
                                    <label class="col-form-label" for="email-icon">Link da foto do
                                        produto</label>
                                </div>
                                <div class="col-sm-12">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text"><i class="bi bi-link"></i></span>
                                        <input type="name" id="url-imagem" class="form-control" name="picture-link" placeholder="https://link.com.br" />
                                    </div>
                                </div>
                            </div>

                            <div class="mb-1 ">
                                <div class="card p-1" id="bodyRequestDash">

                                    <img style="margin-top:20px; margin-bottom:20px; max-width:50%; border-radius:50px;" hidden src="" id="preview" srcset="">
                                    <div class="row">

                                        <div class="col-12">
                                            <label class="col-form-label" for="email-icon">Ou buscar foto no
                                                seu computador</label>
                                        </div>
                                        <div class="col-12">

                                            <br>
                                            <input type="file" id="file" class="form-control" />
                                            <label style="font-size:10px;float: right !important;" for="file"> It has to be a .png
                                                file and smaller than 10MB.</label>
                                            <input id="url" hidden type="text" name="url" class="form-control" />

                                        </div>

                                    </div>
                                </div>
                                <br />
                            </div>
                        </div>
                        <input hidden value="<?= $_SESSION["csrf_token"] ?>" name="csrf_token" type="text">

                        <div class="row">
                            <div style="margin-top:0px;margin-bottom:20px; text-align:right;">

                                <div class="col-12">
                                    <a id="cancel" class="btn btn-outline-secondary" href="<?= Config::BASE_URL . 'new-product' ?>">Cancelar</a>
                                    <button type="submit" class="btn btn-primary ">Criar</button>
                                </div>
                            </div>
                        </div>
                        </form>

                        <!-- Snow Editor end -->

                    </div>
                    <div class="col-md-6 col-sm-12">
                        <img src="<?= Config::BASE_URL . 'src/img/boxes.svg' ?>" alt="boxes" style="width:80%;margin:10%;">
                    </div>
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

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>


    <script src="https://cdn.tiny.cloud/1/kax3g6nv8huzxh65lnkeyjb9qhudlkdh33rgg5zydz16c8pe/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- BEGIN: Vendor JS-->
    <script src="layout/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="layout/app-assets/vendors/js/editors/quill/katex.min.js"></script>
    <script src="layout/app-assets/vendors/js/editors/quill/highlight.min.js"></script>
    <script src="layout/app-assets/vendors/js/editors/quill/quill.min.js"></script>
    <!-- END: Page Vendor JS-->
    <script src="layout/app-assets/js/scripts/forms/form-select2.js"></script>
    <script src="layout/app-assets/vendors/js/ui/jquery.sticky.js"></script>
    <script src="layout/app-assets/vendors/js/forms/select/select2.full.min.js"></script>

    <!-- BEGIN: Theme JS-->
    <script src="layout/app-assets/js/core/app-menu.js"></script>
    <script src="layout/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="layout/app-assets/js/scripts/forms/form-quill-editor.js"></script>
    <script>
        $(".ql-editor").keyup(function() {
            var value = $(this).html();
            $("#editorCopy").val(value);
        }).keyup();
    </script>
    <script>
        const templateRowTable =
            "<tr id='{{id}}'><td>{{id}}</td><td><a href='{{link}}' target='_blank'>{{link}}</a></td><td><a id='{{id}}' data-delete-hash='{{deleteHash}}' onclick='deleteRow(this)' class='cursor-pointer teal'><i class='bi bi-trash-fill'></i></a></td></tr>";
        const clientID = 'eeed9dbdec9477f';

        $("#file").change(function(ev) {
            ev.preventDefault();;

            const fileInput = document.getElementById('file');
            if (fileInput.files.length == 0) {
                showModal('File empty');
            } else {
                const reader = new FileReader();
                reader.readAsDataURL(fileInput.files[0]);
                reader.onload = function() {
                    uploadImage(reader.result);
                };
                reader.onerror = function(error) {
                    showModal(error);
                };
            }
        })

        const uploadImage = (image) => {
            var replacedImage = "";
            if (image.includes('data:image/jpg;base64')) {
                replacedImage = image.replace("data:image/jpg;base64,", "");
            }
            if (image.includes('data:image/jpeg;base64')) {
                replacedImage = image.replace("data:image/jpeg;base64,", "");
            }
            if (image.includes('data:image/png;base64')) {
                replacedImage = image.replace("data:image/png;base64,", "");
            }
            if (image.includes('data:image/gif;base64')) {
                replacedImage = image.replace("data:image/gif;base64,", "");
            }
            if (image.includes('data:image/heic;base64')) {
                replacedImage = image.replace("data:image/heic;base64,", "");
            }
            $.ajax({
                url: 'https://api.imgur.com/3/image',
                type: 'POST',
                headers: {
                    Authorization: 'Client-ID ' + clientID,
                    Accept: 'application/json'
                },
                data: {
                    image: replacedImage,
                    type: 'base64'
                },
                success: function(result) {
                    if (result.success && result.status == 200) {
                        // fillTable(result.data.id, result.data.link, result.data.deletehash)
                        $("#url").val(result.data.link);
                        document.getElementById("link-section-img").hidden = true;
                        $("#response").val(result.data.link);
                        $("#url-imagem").val(result.data.link);
                        $("#preview").attr('src', result.data.link);
                        $("#preview").attr('hidden', false);
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Something went wrong!',
                            footer: '<a href="">Why do I have this issue?</a>'
                        })
                    }
                    $("#file").val("");
                }
            });
        }


        const showModal = (text) => {
            $("#modalText").text(text);
            $('#errorModal').modal('show');
        }
    </script>

    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <?php
    require __DIR__ . "/../../" . Config::BASE_PATH_JS . str_replace(".view", ".js.php", basename(__FILE__, ".php"));
    ?>

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