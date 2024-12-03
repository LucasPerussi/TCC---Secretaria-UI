<?php

use API\Controller\Config;
use const Siler\Config\CONFIG; ?>

<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@200;400;500;600;800;900&display=swap" rel="stylesheet">


<!-- <script src="<?= Config::BASE_URL ?>/src/js/theme-controller.js"></script> -->

<!-- <script>
    changeTheme();
</script> -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
<meta name="description" content="Wetalk Support é uma plataforma desenvolvida, para propagar informações precisas de atualizadas sobre videoconferência de forma gratuíta. ">
<meta name="author" content="Wetalk.it">
<title>SEPT Secretaria</title>
<link rel="stylesheet" href="<?= Config::BASE_URL ?>src/css/master<?= (isset($_COOKIE['theme']) && $_COOKIE['theme'] == 'Dark') ? 'Dark' : 'Light'; ?>.css?v=<?= time(); ?>">

</style>
<link rel="apple-touch-icon" href="src/img/icone.ico">
<link rel="shortcut icon" type="image/x-icon" href="src/img/icone.ico">
<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">

<!-- BEGIN: Vendor CSS-->
<link rel="stylesheet" type="text/css" href="<?=Config::BASE_URL?>layout/app-assets/vendors/css/vendors.min.css">

<!-- BEGIN: Theme CSS-->
<link rel="stylesheet" type="text/css" href="<?=Config::BASE_URL?>layout/app-assets/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="<?=Config::BASE_URL?>layout/app-assets/css/bootstrap-extended.css">
<link rel="stylesheet" type="text/css" href="<?=Config::BASE_URL?>layout/app-assets/css/colors.css">
<link rel="stylesheet" type="text/css" href="<?=Config::BASE_URL?>layout/app-assets/css/components.css">

<!-- BEGIN: Page CSS-->
<link rel="stylesheet" type="text/css" href="<?=Config::BASE_URL?>layout/app-assets/css/core/menu/menu-types/vertical-menu.css">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<!-- END: Page CSS-->

<!-- BEGIN: Custom CSS-->
<link rel="stylesheet" type="text/css" href="<?=Config::BASE_URL?>layout/assets/css/style.css">