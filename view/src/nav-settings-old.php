<?php

use API\Controller\Config;  ?>
<?php $url = $_SERVER['REQUEST_URI']; ?>

<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<style>
    .swiper-slide {
        background-color: transparent !important;
        max-width: 180px !important;
        
    }
    .active{
        background-color: #00bcd533 !important;
        border-color: #00bcd5b7 !important;
    }
</style>

<!-- User Pills -->
<div class="swiper-container" style="overflow:hidden;margin-bottom:15px;max-height: 40px !important;">
    <div class="swiper-wrapper">
        <div class="swiper-slide" style="max-width:110px !important;">
            <a class="nav-link <?php if (($url == Config::DOMINIO . "settings") || ($url == Config::DOMINIO . "user-edit")|| ($url == Config::DOMINIO . "account-history")) {
                                    echo 'active';
                                } ?>" style="padding:8px; margin-right:10px;" href="<?= Config::BASE_URL . "settings" ?>">
                <i data-feather="user" class="font-medium-1 me-50"></i>
                <span class="fw-bold"><?= __("configuracoes_nav.conta") ?></span>
            </a>
        </div>
        <?php if ($_SESSION["user_role"] != 5) : ?>
            <div class="swiper-slide" style="max-width:160px !important;">
                <a class="nav-link <?php if ($url == Config::DOMINIO . "business-card-settings") {
                                        echo "active";
                                    } ?>" id="menuPillsSelected" style="padding:8px; margin-right:10px;" href="<?= Config::BASE_URL . "business-card-settings" ?>">
                    <i data-feather="credit-card" class="font-medium-1 me-50"></i>
                    <span class="fw-bold"><?= __("configuracoes_nav.bc") ?></span>
                </a>
            </div>
        <?php endif; ?>
        <div class="swiper-slide" style="max-width:140px !important;">
            <a class="nav-link <?php if ($url == Config::DOMINIO . "security") {
                                    echo "active";
                                } ?>" style="padding:8px; margin-right:10px;" href="<?= Config::BASE_URL . "security" ?>">
                <i data-feather="lock" class="font-medium-1 me-50"></i>
                <span class="fw-bold"><?= __("configuracoes_nav.seguranca") ?></span>
            </a>
        </div>
        <div class="swiper-slide" style="min-width:170px !important;max-width:200px !important;">
            <a class="nav-link <?php if (($url == Config::DOMINIO . "list-logins") ||  ($url == Config::DOMINIO . "whitelist")) {
                                    echo "active";
                                } ?>" style="padding:8px; margin-right:10px;" href="<?= Config::BASE_URL . "list-logins" ?>">
                <i data-feather="map-pin" class="font-medium-1 me-50"></i>
                <span class="fw-bold"><?= __("configuracoes_nav.acessos") ?></span>
            </a>
        </div>
        <?php if ($_SESSION["user_role"] != 5) : ?>
            <div class="swiper-slide" style="min-width:170px !important;max-width:200px !important;" >
                <a class="nav-link <?php if ($url == Config::DOMINIO . "my-requests") {
                                        echo "active";
                                    } ?>" style="padding:8px; margin-right:10px;" href="<?= Config::BASE_URL . "my-requests" ?>">
                    <i data-feather="bell" class="font-medium-1 me-50"></i>
                    <span class="fw-bold"><?= __("configuracoes_nav.chamados") ?></span>
                </a>
            </div>
        <?php endif; ?>
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