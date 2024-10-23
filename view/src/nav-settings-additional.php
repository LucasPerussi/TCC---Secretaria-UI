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
            <a class="nav-link <?php if (($url == Config::DOMINIO . "account-history")) {
                                    echo "active";
                                } ?>" style="padding:8px; margin-right:10px;" id="settings-section-btn" href="<?= Config::BASE_URL . "settings" ?>#settings-section">
                <i data-feather="user" class="font-medium-1 me-50"></i>
                <span class="fw-bold"><?= __("configuracoes_nav.conta") ?></span>
            </a>
        </div>
        <?php if ($_SESSION["user_role"] != 5) : ?>
            <div class="swiper-slide" style="max-width:160px !important;">
                <a class="nav-link" style="padding:8px; margin-right:10px;" id="business-card-section-btn" href="<?= Config::BASE_URL . "settings" ?>#business-card-section">
                    <i data-feather="credit-card" class="font-medium-1 me-50"></i>
                    <span class="fw-bold"><?= __("configuracoes_nav.bc") ?></span>
                </a>
            </div>
        <?php endif; ?>
        <div class="swiper-slide" style="max-width:140px !important;">
            <a class="nav-link <?php if (($url == Config::DOMINIO . "list-logins") ||  ($url == Config::DOMINIO . "whitelist")) {
                                    echo "active";
                                } ?>" style="padding:8px; margin-right:10px;" id="security-section-btn" href="<?= Config::BASE_URL . "settings" ?>#security-section">
                <i data-feather="lock" class="font-medium-1 me-50"></i>
                <span class="fw-bold"><?= __("configuracoes_nav.seguranca") ?></span>
            </a>
        </div>
        <!-- <div class="swiper-slide " style="min-width:170px !important; max-width:200px !important;">
            <a class="nav-link" style="padding:8px; margin-right:10px;" id="logins-section-btn" href="<?= Config::BASE_URL . "settings" ?>#logins-section">
                <i data-feather="map-pin" class="font-medium-1 me-50"></i>
                <span class="fw-bold"><?= __("configuracoes_nav.acessos") ?></span>
            </a>
        </div> -->
        <?php if ($_SESSION["user_role"] != 5) : ?>
            <div class="swiper-slide" style="min-width:170px !important; max-width:200px !important;">
                <a class="nav-link" style="padding:8px; margin-right:10px;" id="requests-section-btn" href="<?= Config::BASE_URL . "settings" ?>#requests-section">
                    <i data-feather="bell" class="font-medium-1 me-50"></i>
                    <span class="fw-bold"><?= __("configuracoes_nav.chamados") ?></span>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
<!--/ User Pills -->


<script>
    function processHash() {
        const hashValue = window.location.hash;
        const id = hashValue.substring(1);
        const sections = [
            'settings-section', 'user-edit-section', 'timelines-section', 
            'business-card-section', 'security-section', 'change-password-section', 
            'logins-section', 'whitelist-section', 'requests-section'
        ];
        const buttons = {
            'settings-section': 'settings-section-btn',
            'user-edit-section': 'settings-section-btn',
            'timelines-section': 'settings-section-btn',
            'business-card-section': 'business-card-section-btn',
            'security-section': 'security-section-btn',
            'change-password-section': 'security-section-btn',
            'logins-section': 'logins-section-btn',
            'whitelist-section': 'logins-section-btn',
            'requests-section': 'requests-section-btn'
        };

        // Reset all sections and buttons
        sections.forEach(section => document.getElementById(section).hidden = true);
        Object.values(buttons).forEach(button => document.getElementById(button).classList.remove('active'));

        if (sections.includes(id)) {
            // Show the section based on the hash in the URL
            document.getElementById(id).hidden = false;
            // Activate the corresponding button
            document.getElementById(buttons[id]).classList.add('active');
        } else {
            // Default to settings section
            document.getElementById('settings-section').hidden = false;
            document.getElementById('settings-section-btn').classList.add('active');
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