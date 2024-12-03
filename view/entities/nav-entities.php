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

    .active {
        background-color: #00bcd533 !important;
        border-color: #00bcd5b7 !important;
    }
</style>

<!-- User Pills -->
<div class="swiper-container" style="overflow:hidden; margin-bottom:15px; max-height: 40px !important;">
    <div class="swiper-wrapper">
        <div class="swiper-slide" style="max-width:110px !important;">
            <a class="nav-link <?php if ((!isset($_GET["page"])) || ($_GET["page"] == "alunos")) {
                                    echo "active";
                                } ?>" style=" padding:8px; margin-right:10px;" id="settings-section-btn" href="?page=alunos">
                                <i class="bi bi-people font-medium-1 me-50"></i>
                <span class="fw-bold">Alunos</span>
            </a>
        </div>
        <div class="swiper-slide" style="max-width:150px !important; ">
            <a class="nav-link  <?php if ((isset($_GET["page"])) && ($_GET["page"] == "professores")) {
                                    echo "active";
                                } ?>" style="padding:8px; margin-right:10px;" id="business-card-section-btn" href="?page=professores">
                <i class="bi bi-mortarboard font-medium-1 me-50"></i>
                <span class="fw-bold">Professores </span>
            </a>
        </div>
        <div class="swiper-slide" style="max-width:150px !important;">
            <a class="nav-link  <?php if ((isset($_GET["page"])) && ($_GET["page"] == "servidores")) {
                                    echo "active";
                                } ?>" style="padding:8px; margin-right:10px;" id="business-card-section-btn" href="?page=servidores">
                <i class="bi bi-person-gear font-medium-1 me-50"></i>
                <span class="fw-bold">Servidores </span>
            </a>
        </div>
        <div class="swiper-slide" style="max-width:130px !important;">
            <a class="nav-link  <?php if ((isset($_GET["page"])) && ($_GET["page"] == "admins")) {
                                    echo "active";
                                } ?>" style="padding:8px; margin-right:10px;" id="business-card-section-btn" href="?page=admins">
                <i class="bi bi-star font-medium-1 me-50"></i>
                <span class="fw-bold">Admins </span>
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
                slidesPerView: 2.4,
                spaceBetween: 5,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 5,
            },
        }
    });
</script>