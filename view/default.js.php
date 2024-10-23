<?php

use API\Controller\Config;
?>
<!-- BEGIN: Vendor JS-->
<script src="<?= Config::BASE_URL ?>layout/app-assets/vendors/js/vendors.min.js"></script>
<!-- BEGIN Vendor JS-->

<!-- BEGIN: Page Vendor JS-->
<script src="<?= Config::BASE_URL ?>layout/app-assets/vendors/js/ui/jquery.sticky.js"></script>
<script src="<?= Config::BASE_URL ?>layout/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
<!-- END: Page Vendor JS-->

<!-- BEGIN: Theme JS-->
<script src="<?= Config::BASE_URL ?>layout/app-assets/js/core/app-menu.min.js"></script>
<script src="<?= Config::BASE_URL ?>layout/app-assets/js/core/app.min.js"></script>
<!-- END: Theme JS-->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

<script>
    $("body").addClass("dark-layout");
</script>