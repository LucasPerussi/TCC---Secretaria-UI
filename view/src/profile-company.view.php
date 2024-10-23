<?php

use API\Controller\Config;

?>
<link rel="stylesheet" type="text/css" href="<?=Config::BASE_URL?>src/css/animatedTextLicense.css">
<div class="card">
    <div
        style="background-color:<?= $company["com_color"] ?>;border-radius:20px 20px 0px 0px;width:100%;padding:25px; ">
        <img src="<?= $company["com_logo"] ?>" style="max-width:50%;margin:25%;" alt="logo">
    </div>
    <br />

    <h2 style="margin:20px;text-align:center !important;"><?= $company["com_name"] ?></h2>
    <h6 class="txt anim-text-flow" style="font-weight:700 !important; text-align:center !important;">Licensed</h6>

    <script>
        $('.txt').html(function(i, html) {
            var chars = $.trim(html).split("");

            return '<span style="font-weight:600 !important;">' + chars.join('</span><span style="font-weight:600 !important;">') + '</span>';
        });
    </script>
    <div class="card" id="bodyRequestDash" style="margin:20px;padding:20px;">
        <span><?= __("company_information.email") ?></span>
        <h5>
            <?= $company["com_email"] ?>
        </h5>
        <br>
        <span><?= __("company_information.dom_principal") ?></span>
        <h5>
            <span class="badge rounded-pill badge-light-dark" style="font-size:10px">
                <?= $company["com_dominio1"] ?? 'Indefinido' ?>
            </span>
        </h5>
        <br>
        <span><?= __("company_information.dom_secundario") ?></span>
        <h5>
            <span class="badge rounded-pill badge-light-dark" style="font-size:10px"><?= $company["com_dominio2"] ?? 'Indefinido' ?></span>
        </h5>
        <br>
        <!--<span><?= __("company_information.plat_principal") ?></span>
         <h5><?php if ($company["com_platform"] == 1) {
                    echo "Zoom";
                } else if ($company["com_platform"] == 2) {
                    echo "Teams";
                } else {
                    echo "Google";
                } ?>
        </h5> -->
        <br>
        <span style="font-size:8px;"><?= __("company_information.recado") ?></span>
    </div>

</div>

<!-- /User Card -->