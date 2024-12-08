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

    /* Estilos adicionais para as seções */
    .section {
        display: none;
    }

    .section.active-section {
        display: block;
    }
</style>

<!-- User Pills -->
<div class="swiper-container" style="overflow:hidden; margin-bottom:15px; max-height: 40px !important;">
    <div class="swiper-wrapper">
        <!-- Aba Andamento -->
        <div class="swiper-slide" style="max-width:150px !important;">
            <a class="nav-link active" style="padding:8px; margin-right:10px;" id="andamento-section-btn" href="#andamento-section">
                <i data-feather="activity" class="font-medium-1 me-50"></i>
                <span class="fw-bold">Andamento</span>
            </a>
        </div>
        <!-- Aba Timeline -->
        <div class="swiper-slide" style="max-width:150px !important;">
            <a class="nav-link" style="padding:8px; margin-right:10px;" id="timeline-section-btn" href="#timeline-section">
                <i data-feather="clock" class="font-medium-1 me-50"></i>
                <span class="fw-bold">Timeline</span>
            </a>
        </div>
        <!-- Aba Campos -->
        <div class="swiper-slide" style="max-width:150px !important;">
            <a class="nav-link" style="padding:8px; margin-right:10px;" id="campos-section-btn" href="#campos-section">
                <i data-feather="edit" class="font-medium-1 me-50"></i>
                <span class="fw-bold">Informações</span>
            </a>
        </div>
        <?php if (($_SESSION["user_role"] == "Servidor") || ($_SESSION["user_role"] == "Admin")):?>

        <!-- Aba Definições -->
        <div class="swiper-slide" style="max-width:150px !important;">
            <a class="nav-link" style="padding:8px; margin-right:10px;" id="definicoes-section-btn" href="#definicoes-section">
                <i data-feather="settings" class="font-medium-1 me-50"></i>
                <span class="fw-bold">Definições</span>
            </a>
        </div>
        <?php endif;?>
    </div>
</div>
<!--/ User Pills -->



<script>
    function processHash() {
        const hashValue = window.location.hash;
        const id = hashValue.substring(1);
        const sections = ['andamento-section', 'timeline-section', 'campos-section', 'definicoes-section'];
        const buttons = {
            'andamento-section': 'andamento-section-btn',
            'timeline-section': 'timeline-section-btn',
            'campos-section': 'campos-section-btn',
            'definicoes-section': 'definicoes-section-btn'
        };

        // Resetar todas as seções e botões
        sections.forEach(section => {
            const sectionDiv = document.getElementById(section);
            if (sectionDiv) {
                sectionDiv.classList.remove('active-section');
            }
        });
        Object.values(buttons).forEach(button => {
            const buttonElem = document.getElementById(button);
            if (buttonElem) {
                buttonElem.classList.remove('active');
            }
        });

        if (sections.includes(id)) {
            // Mostrar a seção baseada no hash da URL
            const activeSection = document.getElementById(id);
            if (activeSection) {
                activeSection.classList.add('active-section');
            }
            // Ativar o botão correspondente
            const activeButton = document.getElementById(buttons[id]);
            if (activeButton) {
                activeButton.classList.add('active');
            }
        } else {
            // Padrão para a seção Andamento
            const defaultSection = document.getElementById('andamento-section');
            if (defaultSection) {
                defaultSection.classList.add('active-section');
            }
            const defaultButton = document.getElementById('andamento-section-btn');
            if (defaultButton) {
                defaultButton.classList.add('active');
            }
        }
    }

    window.addEventListener('hashchange', processHash);
    document.addEventListener('DOMContentLoaded', processHash);
</script>
<script>
    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 'auto',
        spaceBetween: 10, // Ajuste o espaço entre as abas conforme necessário
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
                slidesPerView: 2,
                spaceBetween: 5,
            },
            640: {
                slidesPerView: 3,
                spaceBetween: 10,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 10,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 10,
            },
        }
    });
</script>
