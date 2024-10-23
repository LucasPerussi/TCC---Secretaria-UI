<?php
use API\Controller\Config;
?>
<?php $url = $_SERVER['REQUEST_URI']; ?>

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<style>
    .swiper-slide {
        background-color: transparent !important;
        max-width: 180px !important;
    }
    .activeBtn {
        background-color: #00bcd533 !important;
        border-color: #00bcd5b7 !important;
        padding: 5px !important;
        padding-left: 10px !important;
        border-radius: 20px;
    } 

</style>

<!-- User Pills -->
<div class="swiper-container" style="overflow:hidden; margin-bottom:15px; max-height: 40px !important;">
    <div class="swiper-wrapper">
        <div class="swiper-slide" style="max-width:120px !important;">
            <a class="nav-link <?php if (($url == Config::DOMINIO . "company-settings")) {
                                    echo 'activeBtn';} ?> " style="padding:4px; margin-right:10px;"  href="<?=Config::BASE_URL . "company-settings"?>">
                <i data-feather="user" class="font-medium-1 me-50"></i>
                <span class="fw-bold"><?= __("company_nav.empresa") ?></span>
            </a>
        </div>
        
            <div class="swiper-slide" style="max-width:180px !important;">
                <a class="nav-link <?php if (($url == Config::DOMINIO . "company-logs")) {
                                    echo 'activeBtn';} ?>" style="padding:2px; margin-right:10px;"  href="<?=Config::BASE_URL . "company-logs"?>">
                    <i data-feather="credit-card" class="font-medium-1 me-50"></i>
                    <span class="fw-bold"><?= __("company_nav.logs") ?></span>
                </a>
            </div>
        <div class="swiper-slide" style="max-width:250px !important; min-width:210px !important;">
            <a class="nav-link <?php if (($url == Config::DOMINIO . "company-tickets")) {
                                    echo 'activeBtn';} ?>" style="padding:1px; margin-right:10px;"  href="<?=Config::BASE_URL . "company-tickets"?>">
                <i data-feather="lock" class="font-medium-1 me-50"></i>
                <span class="fw-bold"><?= __("company_nav.chamados") ?></span>
            </a>
        </div>
        <div class="swiper-slide" style="min-width:190px !important; max-width:200px !important;">
            <a class="nav-link <?php if (($url == Config::DOMINIO . "painel")) {
                                    echo 'activeBtn';} ?>" style="padding:4px; margin-right:10px;" href="<?=Config::BASE_URL . "painel"?>">
                <i data-feather="bar-chart" class="font-medium-1 me-50"></i>
                <span class="fw-bold"><?= __("company_nav.relatorios") ?></span>
            </a>
        </div>
    </div>
</div>
<!--/ User Pills -->

<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 'auto',
        spaceBetween: 0,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        breakpoints: {
            100: {
                slidesPerView: 2.5,
                spaceBetween: 5,
            },
            640: {
                slidesPerView: 2.4,
                spaceBetween: 5,
            },
            768: {
                slidesPerView: 2.6,
                spaceBetween: 5,
            },
            1024: {
                slidesPerView: 5,
                spaceBetween: 5,
            },
        }
    });
</script> 