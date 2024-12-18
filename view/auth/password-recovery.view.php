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
    <title>Portal Professor</title>

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
    <script src="https://unpkg.com/feather-icons"></script>

    <!-- Inclua as bibliotecas necessárias no seu HTML -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Opcional: Toasts do SweetAlert2 -->
    <script>
        const Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000,
            timerProgressBar: true,
        });
    </script>


    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="layout/assets/css/style.css">
    <!-- END: Custom CSS-->

</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static   menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">

            <div class="content-body">
                <?php if (!isset($_GET["email"])): ?>
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6 col-sm-12">
                            <form>
                                <h1 style="font-weight:500; ">Esqueceu a senha? </h1>
                                <h6>Informe seu email para tentar realizar a redefinição da senha </h6>
                                <br />
                                <div class="card p-1">
                                    <h6>Informe seu email:</h6>
                                    <input type="email" name="email" class="form-control" placeholder="seu@email.com">
                                    <br />
                                    <button type="submit" class="btn btn-primary">Alterar Senha</button>
                                </div>
                            </form>
                        </div>
                        <div class="col-md-3"></div>
                    </div>
                <?php else: ?>
                    <form id="allowChange">
                        <h1 style="font-weight:500; ">Solicitar Alteração de Senha</h1>
                        <h6>Preencha corretamente estas informações para solicitar sua senha </h6>
                        <br />
                        <div class="card p-1">
                            <h6>Informe seu registro UFPR:</h6>
                            <input type="text" name="registro" class="form-control" placeholder="GRR123456">
                            <input type="email" hidden name="email" class="form-control" value="<?= $_GET["email"] ?>">
                            <br />
                            <h6>Data de nascimento:</h6>
                            <input type="date" name="nascimento" class="form-control">
                            <br />
                            <button type="submit" class="btn btn-primary">Verificar</button>
                        </div>
                    </form>
                    <script>
                        $("#allowChange").submit(function(f) {
                            f.preventDefault();
                            const data = new FormData(f.target);
                            const object = Object.fromEntries(data.entries());
                            axios.post('<?= Config::BASE_ACTION_URL ?>/recovery-password', object)
                                .then(function(response) {
                                    if (response.data != "sucesso!") {
                                        throw response.data;
                                    } else {
                                        Swal.fire({
                                            title: '<?= __("Feito!") ?>',
                                            text: "<?= __("Sua senha foi alterada com sucesso! : )") ?>",
                                            icon: 'success',
                                            showCancelButton: false,
                                            confirmButtonColor: '#1f8cd4',
                                            cancelButtonColor: '#d33',
                                            confirmButtonText: '<?= __("Legal!") ?>'
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                window.location.href = "<?= Config::BASE_URL . "login" ?>"
                                            }
                                        })
                                    }
                                })
                                .catch(function(response) {
                                    Swal.fire({
                                        title: 'Erro ao Alterar senha!',
                                        text: response,
                                        icon: 'error',
                                        showCancelButton: false,
                                        confirmButtonColor: '#1f8cd4',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: '<?= __("OK") ?>'
                                    })
                                });

                        });
                    </script>
                <?php endif; ?>




            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>


    <script src="https://cdn.tiny.cloud/1/kax3g6nv8huzxh65lnkeyjb9qhudlkdh33rgg5zydz16c8pe/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>

    <!-- BEGIN: Vendor JS-->
    <script src="layout/app-assets/vendors/js/vendors.min.js"></script>


    <!-- BEGIN: Theme JS-->
    <script src="layout/app-assets/js/core/app-menu.js"></script>
    <script src="layout/app-assets/js/core/app.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <?php
    require __DIR__ . "/../../" . Config::BASE_PATH_JS . str_replace(".view", ".js.php", basename(__FILE__, ".php"));
    ?>

    <script src="<?= Config::BASE_URL ?>layout/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>



</body>
<!-- END: Body-->

</html>