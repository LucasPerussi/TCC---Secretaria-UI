<?php

use API\Controller\Config;
?>
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
            <a class="nav-link" style="text-align:left;margin-right:10px;" id="user-section-btn-painel" href="#user-section-painel">
                <i class="bi bi-person-fill"></i>
                <span class="fw-bold">Usuário</span>
            </a>
        </div>
        <div class="swiper-slide" style="max-width:90px !important;">
            <a class="nav-link" style="text-align:left; margin-right:10px;" id="room-section-btn-painel" href="#room-section-painel">
                <i class="bi bi-door-open"></i>
                <span class="fw-bold">Salas</span>
            </a>
        </div>
        <div class="swiper-slide" style="max-width:130px !important;">
            <a class="nav-link" style="text-align:left; margin-right:10px;" id="posts-section-btn-painel" href="#posts-section-painel">
                <i class="bi bi-file-text"></i>
                <span class="fw-bold">Postagens</span>
            </a>
        </div>
        <div class="swiper-slide" style="max-width:110px !important;">
            <a class="nav-link" style="text-align:left; margin-right:10px;" id="company-section-btn-painel" href="#company-section-painel">
                <i class="bi bi-building"></i>
                <span class="fw-bold">Empresa</span>
            </a>
        </div>
        <div class="swiper-slide" style="max-width:150px !important;">
            <a class="nav-link" style="text-align:left; margin-right:20px;" id="equipament-section-btn-painel" href="#equipment-section-painel">
                <i class="bi bi-box-seam"></i>
                <span class="fw-bold">Equipamentos</span>
            </a>
        </div>
        <div class="swiper-slide" style="max-width:245px !important; background-color:#ff804030 !important; border-radius:10px !important;">
            <a class="nav-link" style="text-align:left; margin-right:20px;" id="equipament-section-btn-painel" href="<?= Config::BASE_URL . 'company-settings' ?>">
            <i class="bi bi-box-arrow-in-left"></i>
                <span class="fw-bold">Gerenciamento da Empresa</span>
            </a>
        </div>
    </div>
</div>
<!--/ User Pills -->
<script>
    function processHash() {
        const hashValue = window.location.hash || '#user-section-painel';
        const idWithParams = hashValue.substring(1);
        const [sectionId, queryParams] = idWithParams.split('?');

        const sections = [
            'user-section-painel', 'room-section-painel', 'posts-section-painel', 'company-section-painel', 'equipment-section-painel'
        ];
        const buttons = {
            'user-section-painel': 'user-section-btn-painel',
            'room-section-painel': 'room-section-btn-painel',
            'posts-section-painel': 'posts-section-btn-painel',
            'company-section-painel': 'company-section-btn-painel',
            'equipment-section-painel': 'equipament-section-btn-painel'
        };

        // Reset all sections and buttons
        sections.forEach(section => document.getElementById(section).hidden = true);
        Object.values(buttons).forEach(button => document.getElementById(button).classList.remove('active'));

        if (sections.includes(sectionId)) {
            // Show the section based on the hash in the URL
            document.getElementById(sectionId).hidden = false;
            // Activate the corresponding button
            document.getElementById(buttons[sectionId]).classList.add('active');

            // Process query parameters if present (e.g., for edit-block)
            if (sectionId === 'edit-block' && queryParams) {
                const params = new URLSearchParams(queryParams);
                const id = params.get('b'); // Obtém o valor do parâmetro 'b'

                // Exemplo de como você pode usar o ID
                loadBlockData(id);
                // console.log('ID capturado:', id);
                // Aqui você pode usar o ID como desejar, por exemplo, buscar dados no backend ou modificar a interface.
            }
            if (sectionId === 'edit-links' && queryParams) {
                const params = new URLSearchParams(queryParams);
                const id = params.get('b'); // Obtém o valor do parâmetro 'b'

                // Exemplo de como você pode usar o ID
                loadBlockLinks(id);
                // console.log('ID capturado:', id);
                // Aqui você pode usar o ID como desejar, por exemplo, buscar dados no backend ou modificar a interface.
            }
        } else {
            // Default to personalization section
            document.getElementById('personalization-section').hidden = false;
            document.getElementById('personalization-section-btn').classList.add('active');
        }
    }

    window.addEventListener('hashchange', processHash);
    document.addEventListener('DOMContentLoaded', processHash);
</script>

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