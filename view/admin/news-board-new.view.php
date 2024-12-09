<?php

use API\Controller\Config;

include "view/src/head.php"; ?>

<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">

    <meta name="author" content="Vroom">
    <meta name='robots' content='noindex'>
    <title>WeJourney - Nova Empresa</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="layout/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/vendors/css/editors/quill/katex.min.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/vendors/css/editors/quill/monokai-sublime.min.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/vendors/css/editors/quill/quill.snow.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/vendors/css/editors/quill/quill.bubble.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css2?family=Inconsolata&amp;family=Roboto+Slab&amp;family=Slabo+27px&amp;family=Sofia&amp;family=Ubuntu+Mono&amp;display=swap">
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

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Criar nova postagem para o mural</h2>
                        </div>
                    </div>
                </div>

            </div>
            <div class="content-body">
                <div class="row">
                    <div class="col-md-7 col-sm-12">
                        <div class="card p-1">
                            <form id="newMural">
                                <div class="mb-1 row">
                                    <div class="col-sm-12">
                                        <label for="titulo" class="form-label">Título</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="input-group">
                                            <span class="input-group-text"><i class="bi bi-pencil"></i></span>
                                            <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Digite o título do post" required />
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-1 row">
                                    <div class="col-sm-12">
                                        <label class="col-form-label" for="descricao">Descrição</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="input-group input-group-merge">
                                            <span class="input-group-text"><i class="bi bi-pencil-square"></i></span>
                                            <textarea id="descricao" class="form-control" name="descricao" rows="3" placeholder="Descreva sua postagem" required></textarea>
                                
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-1 row">
                                    <div class="col-sm-12">
                                        <label class="col-form-label" for="curso">Curso</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="input-group input-group-merge">
                                            <select class="form-select form-select-lg" name="curso" required>
                                                <option value="" selected disabled>Selecione um curso</option>
                                                <?php if (isset($courses) && !isset($courses["error"])) { ?>
                                                    <?php foreach ($courses as $course) { ?>
                                                        <option value="<?= htmlspecialchars($course["id"]) ?>">
                                                            <?= htmlspecialchars($course["nome"]) ?>
                                                        </option>
                                                    <?php } ?>
                                                <?php } else { ?>
                                                    <option disabled>Erro ao carregar cursos.</option>
                                                <?php } ?>                        
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-1 row">
                                    <div class="col-sm-12">
                                        <label class="col-form-label" for="visivel">Visível</label>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-check form-switch">
                                            <input class="form-check-input" type="checkbox" id="visivel" name="visivel" value="1" checked>
                                            <label class="form-check-label" for="visivel">Sim</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary" style="float:right;">Postar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <h1 style="font-size:200px; text-align:center; margin-top:100px;">📢</h1>
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
        <script>
            $(function() {
                var valorDaDiv = $(".editor").text();
                $("#body").val(valorDaDiv);
            });
        </script>
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

        <!-- BEGIN: Theme JS-->
        <script src="layout/app-assets/js/core/app-menu.js"></script>
        <script src="layout/app-assets/js/core/app.js"></script>
        <!-- END: Theme JS-->

        <!-- BEGIN: Page JS-->
        <script src="layout/app-assets/js/scripts/forms/form-quill-editor.js"></script>
        <?php
        require __DIR__ . "/../../" . Config::BASE_PATH_JS . str_replace(".view", ".js.php", basename(__FILE__, ".php"));
        ?>



</body>
<!-- END: Body-->

</html>