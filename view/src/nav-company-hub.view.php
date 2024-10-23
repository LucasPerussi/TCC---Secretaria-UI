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
        <div class="swiper-slide" style="max-width:150px !important;">
            <a class="nav-link active" style="padding:8px; margin-right:10px;" id="company-section-btn" href="#company">
                <i data-feather="home" class="font-medium-1 me-50"></i>
                <span class="fw-bold"><?= __("company_nav.empresa") ?></span>
            </a>
        </div>
        <div class="swiper-slide" style="max-width:150px !important;">
            <a class="nav-link" style="padding:8px; margin-right:10px;" id="tickets-section-btn" href="#tickets">
                <i data-feather="file-text" class="font-medium-1 me-50"></i>
                <span class="fw-bold"><?= __("company_nav.chamados") ?></span>
            </a>
        </div>

        <div class="swiper-slide" style="max-width:150px !important;">
            <a class="nav-link" style="padding:8px; margin-right:10px;" id="settings-section-btn" href="#settings">
                <i data-feather="settings" class="font-medium-1 me-50"></i>
                <span class="fw-bold"><?= __("company_nav.configuracoes") ?></span>
            </a>
        </div>

        <div class="swiper-slide" style="max-width:170px !important;">
            <a class="nav-link" style="padding:8px; margin-right:10px;" id="personalization-section-btn" href="#personalization">
                <i data-feather="sliders" class="font-medium-1 me-50"></i>
                <span class="fw-bold"><?= __("company_nav.personalizacao") ?></span>
            </a>
        </div>

        <div class="swiper-slide" style="max-width:150px !important;">
            <a class="nav-link" style="padding:8px; margin-right:10px;" id="logs-section-btn" href="#logs">
                <i data-feather="file" class="font-medium-1 me-50"></i>
                <span class="fw-bold"><?= __("company_nav.logs") ?></span>
            </a>
        </div>
    </div>
</div>
<!--/ User Pills -->
<script>
                    function processHash() {
                        const hashValue = window.location.hash;
                        const id = hashValue.substring(1); // Remove o '#' do hash

                        const sections = ['company', 'tickets', 'settings', 'personalization', 'logs'];
                        const buttons = {
                            'company': 'company-section-btn',
                            'tickets': 'tickets-section-btn',
                            'settings': 'settings-section-btn',
                            'personalization': 'personalization-section-btn',
                            'logs': 'logs-section-btn'
                        };

                        // Oculta todas as seções e remove a classe 'active' dos botões
                        sections.forEach(section => document.getElementById(section).hidden = true);
                        Object.values(buttons).forEach(button => document.getElementById(button).classList.remove('active'));

                        if (sections.includes(id)) {
                            // Exibe a seção correta e ativa o botão
                            document.getElementById(id).hidden = false;
                            document.getElementById(buttons[id]).classList.add('active');
                        } else {
                            // Se não houver hash, mostrar a seção 'company' como padrão
                            document.getElementById('company').hidden = false;
                            document.getElementById('company-section-btn').classList.add('active');
                        }
                    }

                    // Executa o script assim que o DOM estiver pronto e escuta mudanças no hash
                    window.addEventListener('hashchange', processHash);
                    document.addEventListener('DOMContentLoaded', processHash);
                </script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
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
                    slidesPerView: 1.8,
                    spaceBetween: 5,
                },
                640: {
                    slidesPerView: 1.9,
                    spaceBetween: 5,
                },
                768: {
                    slidesPerView: 1.3,
                    spaceBetween: 5,
                },
                1024: {
                    slidesPerView: 2.3,
                    spaceBetween: 5,
                },
            }
        });
    });
</script>
