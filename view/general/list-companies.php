<?php

use API\Controller\Config;

include "view/src/head.php";?>
<?php if (($_SESSION["user_role"] == 1) || ($_SESSION["company_id"] != 9999) || (!isset($_SESSION["company_id"]))):?>


<!DOCTYPE html>
<html lang="en">

<head>
<meta name='robots' content='noindex'>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="5; URL='<?= Config::BASE_URL . 'dashboard'?>'" />
    <title>No permission</title>
    
</head>

<body>
    <div style="margin:20%; margin-top:10%; width:60%;">

        <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
        <lottie-player src="https://assets9.lottiefiles.com/packages/lf20_5d6q5kkh.json" background="transparent"
            speed="1" style="width: 300px; height: 300px;" loop autoplay></lottie-player>

        <br><br>
        <h1>Você não tem permissão de acesso à esta página</h1>
        <h1>Vamos te direcionar em alguns segundos...</h1>
    </div>
</body>

</html>


<?php else:?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
<meta name='robots' content='noindex'>
    <?php

include "view/src/head.php";?>

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="layout/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/vendors/css/pickers/pickadate/pickadate.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/vendors/css/pickers/flatpickr/flatpickr.min.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="layout/assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/css/plugins/forms/pickers/form-flat-pickr.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/css/plugins/forms/pickers/form-pickadate.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="layout/app-assets/css/plugins/forms/form-quill-editor.css">
    <link rel="stylesheet" href="sweetalert2.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
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
    <!--END: Sidebar -->



    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <!-- users list start -->
                <section class="app-user-list">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <?php $cont = 0; $contOpen = 0;?>
                            <?php if (mysqli_num_rows($companiesCont) > 0){
                        while($companyCont = mysqli_fetch_assoc($companiesCont)){
                            $cont++;
                        }
                    }?>

                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="fw-bolder mb-75"><?=$cont?></h3>
                                        <span>Empresas</span>
                                    </div>
                                    <div class="avatar bg-light-primary p-50">
                                        <span class="avatar-content">
                                            <i data-feather="activity" class="font-medium-4"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="card-body d-flex align-items-center justify-content-between">
                                    <div>
                                        <h3 class="fw-bolder mb-75"><?=$contOpen?></h3>
                                        <span>Tickets em Aberto</span>
                                    </div>
                                    <div class="avatar bg-light-primary p-50">
                                        <span class="avatar-content">
                                            <i data-feather="alert-triangle" class="font-medium-4"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> -->

                    </div>
                    <!-- list and filter start -->
                    <div class="card">
                        <div class="card-body border-bottom">
                            <h2>Empresas</h2>
                            <div class="row">
                                <div class="col-md-8 user_role"></div>
                                <div class="col-md-2 user_plan"> </div>
                                <div class="col-md-2 user_status">
                                    <button style="background-color:green;" class="btn btn-primary" type="button"
                                        onclick="window.location.href = '<?= Config::BASE_URL . 'download-companies-excel'?>'"
                                        id="int-excel">Exportar Excel</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-datatable table-responsive pt-0">
                            <table class="user-list-table table">
                                <thead class="table-light">
                                    <tr>
                                        <!--<th>ID</th>-->
                                        <th>ID</th>
                                        <th>Nome</th>
                                        <th>Logo</th>
                                        <th>Identificador</th>
                                        <th>Dominio 1</th>
                                        <th>Dominio 2</th>
                                        <th>Senha</th>
                                        <th>Plataforma</th>
                                        <th>Criado em</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php if (mysqli_num_rows($companies) > 0): ?>
                                    <?php while($company = mysqli_fetch_assoc($companies)):?>
                                    <tr>
                                        <th><a target="_blank"
                                                href="<?=Config::BASE_URL . 'company/' . $company["com_identifier"]?>"><?=$company["com_id"] ?>
                                        </th></a>
                                        <th><a target="_blank"
                                                href="<?=Config::BASE_URL . 'company/' . $company["com_identifier"]?>"><?=$company["com_name"] ?>
                                        </th></a>
                                        <th style="background-color:#3f3f40;">
                                            <img style="max-height:40px; max-width:80px;"
                                                src="<?=$company["com_logo"]?>" alt="logo">
                                        </th>
                                        <th style="font-size:12px;"><?=$company["com_identifier"]?></th>
                                        <th style="font-size:12px;"><?=$company["com_dominio1"]?></th>
                                        <th style="font-size:12px;">
                                            <?php if ($company["com_dominio2"] != ""){ echo $company["com_dominio2"];} else { echo "N/A";} ?>
                                        </th>
                                        <th style="font-size:12px;"><?=$company["com_password"]?></th>
                                        <th style="font-size:12px;"><span
                                                style='padding:6px; border-radius:10px; color: white;<?php if ($company["com_platform"] == 1) {echo "background-color:#3498db'";} elseif ($company["com_platform"] == 2) {echo "background-color:#836FFF'";} else {echo "background-color:gray'";}  ?> '><?php if ($company["com_platform"] == 1) {echo "Zoom";} elseif ($company["com_platform"] == 2) {echo "Teams";} else {echo "Outra";}?>
                                            </span></th>
                                        <th style="font-size:12px;"><?=$company["com_createdAt"]?></th>



                                        <th>
                                            <a class="delete" data-code="<?=$company["com_id"]?>"><span
                                                    style="color:mediumorchid; margin-right: 10px;"><i
                                                        data-feather='trash'></i></span></a>
                                        </th>
                                        </th>
                                    </tr>
                                    <?php endwhile;?>
                                    <?php endif;?>

                                </tbody>
                                </tbody>
                            </table>
                        </div>

                        <!-- list and filter end -->
                </section>
                <!-- users list ends -->

            </div>
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <footer class="footer footer-static footer-light">
    </footer>
    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->

    <button class="btn btn-primary btn-icon scroll-top" type="button"><i data-feather="arrow-up"></i></button>
    <!-- END: Footer-->


    <!-- BEGIN: Vendor JS-->
    <script src="layout/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="layout/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    <script src="layout/app-assets/vendors/js/tables/datatable/jquery.dataTables.min.js"></script>
    <script src="layout/app-assets/vendors/js/tables/datatable/dataTables.bootstrap5.min.js"></script>
    <script src="layout/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js"></script>
    <script src="layout/app-assets/vendors/js/tables/datatable/responsive.bootstrap5.js"></script>
    <script src="layout/app-assets/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
    <script src="layout/app-assets/vendors/js/tables/datatable/jszip.min.js"></script>
    <script src="layout/app-assets/vendors/js/tables/datatable/pdfmake.min.js"></script>
    <script src="layout/app-assets/vendors/js/tables/datatable/vfs_fonts.js"></script>
    <script src="layout/app-assets/vendors/js/tables/datatable/buttons.html5.min.js"></script>
    <script src="layout/app-assets/vendors/js/tables/datatable/buttons.print.min.js"></script>
    <script src="layout/app-assets/vendors/js/tables/datatable/dataTables.rowGroup.min.js"></script>
    <script src="layout/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="layout/app-assets/vendors/js/forms/cleave/cleave.min.js"></script>
    <script src="layout/app-assets/vendors/js/forms/cleave/addons/cleave-phone.us.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="layout/app-assets/js/core/app-menu.js"></script>
    <script src="layout/app-assets/js/core/app-menu.js"></script>
    <script src="layout/app-assets/js/core/app.js"></script>
    <script src="layout/app-assets/data/user-list.json"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS
    <script src="layout/app-assets/js/scripts/pages/app-user-list.js"></script>-->
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

<script>
$('.delete').on('click', function() {
    const code = $(this).attr("data-code");
    Swal.fire({
        title: '<?=__("Excluir Empresa")?>',
        text: "Tem certeza que deseja excluir Empresa? Este procedimento não poderá ser desfeito!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#B22222',
        cancelButtonColor: '#1f8cd4',
        confirmButtonText: 'Confirmar'
    }).then((result) => {
        if (result.value) {
            axios.post(`<?=Config::BASE_ACTION_URL?>/delete/company/${code}`)
                .then(function(response) {
                    if (response.data != "sucesso!") {
                        throw response.data;
                    } else {
                        window.location.href = "<?=Config::BASE_URL . "list-companies"?>"
                    }
                })
                .catch(function(error) {
                    Swal.fire({
                        title: '<?=__("Error!")?>',
                        text: "error",
                        icon: 'error',
                        showCancelButton: false,
                        confirmButtonColor: '#1f8cd4',
                        cancelButtonColor: '#d33',
                        confirmButtonText: '<?=__("OK")?>'
                    })
                });
        }
    })
})
</script>

</html>
<?php endif;?>