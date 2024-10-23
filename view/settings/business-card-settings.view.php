<?php

use API\Controller\Config;
?>
<h1>Business Card</h1>
<br />



<?php if ($_SESSION["forceColor"] == 0) : ?>
    <h3><?= __("business_card_settings.personalizacao") ?></h3>
    <br />

    <div class="card pb-0" style="padding-bottom:0px !important;">
        <div class="row">
            <div class="col-md-6 col-sm-12 pb-0">
                <img src="<?= Config::BASE_URL ?>src/img/bcpreview.png" alt="bc-preview" style="max-width: 80%; margin-left:10%;">
            </div>
            <div class="col-md-6 col-sm-12 pb-0">
                <div style="padding:5%;">

                    <br />
                    <div class="row">
                        <h3 style="color:#00BBD3 !important;">Personalize seu</h3>
                        <h2 style="color: #00BBD3 !important;">Business Card</h2>
                    </div>
                    <br />
                    <div class="row">
                        <a href="<?= Config::BASE_URL . 'business-card-management' ?>"><span class="btn btn-info" style="background-color: #00BBD3 !important;">Gerenciar</span>
                        </a>

                    </div>

                </div>
            </div>
        </div>
    </div>

    <div class="card" style="padding:20px;">
        <div class="d-flex mt-0">

            <div class="d-flex align-item-center justify-content-between flex-grow-1">
                <div class="me-1">
                    <p class="fw-bolder mb-0"> <i class="bi bi-palette"></i> <span style="margin-left:10px;"><?= __("business_card_settings.cartao_cor") ?></span>
                    </p>
                    <span><?= __("business_card_settings.cartao_cor_desc") ?></span>
                </div>
                <div class="mt-50 mt-sm-0">
                    <div class="form-check form-switch form-check-danger">
                        <input type="checkbox" class="form-check-input" name="colorDefault" id="checkboxCor" <?php if ($setting["crd_use_company_color"] == 1) {
                                                                                                                    echo "checked";
                                                                                                                } ?> />
                        <label class="form-check-label" for="checkboxCor">
                            <span class="switch-icon-left"><i data-feather="check"></i></span>
                            <span class="switch-icon-right"><i data-feather="x"></i></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
      
    </div>
<?php endif; ?>

<h3><?= __("business_card_settings.privacidade") ?></h3>
<br />

<div class="card" style="padding:20px;">

    <div class="d-flex align-item-center justify-content-between flex-grow-1">
        <div class="me-1">
            <p class="fw-bolder mb-0"><svg xmlns="https://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-globe-americas" viewBox="0 0 16 16">
                    <path d="M8 0a8 8 0 1 0 0 16A8 8 0 0 0 8 0ZM2.04 4.326c.325 1.329 2.532 2.54 3.717 3.19.48.263.793.434.743.484-.08.08-.162.158-.242.234-.416.396-.787.749-.758 1.266.035.634.618.824 1.214 1.017.577.188 1.168.38 1.286.983.082.417-.075.988-.22 1.52-.215.782-.406 1.48.22 1.48 1.5-.5 3.798-3.186 4-5 .138-1.243-2-2-3.5-2.5-.478-.16-.755.081-.99.284-.172.15-.322.279-.51.216-.445-.148-2.5-2-1.5-2.5.78-.39.952-.171 1.227.182.078.099.163.208.273.318.609.304.662-.132.723-.633.039-.322.081-.671.277-.867.434-.434 1.265-.791 2.028-1.12.712-.306 1.365-.587 1.579-.88A7 7 0 1 1 2.04 4.327Z" />
                </svg> <span style="margin-left:10px;"><?php echo __("business_card_settings.cartao_publico") ?></span>
            </p>
            <span><?= __("business_card_settings.cartao_publico_desc") ?></span>
        </div>
        <div class="mt-50 mt-sm-0">
            <div class="form-check form-switch form-check-info">

                <input type="checkbox" name="publicProfile" class="form-check-input" id="checkboxPublico" <?php if ($setting["crd_public_card"] == 1) {
                                                                                                                echo "checked";
                                                                                                            } ?> />


                <label class="form-check-label" for="checkboxPublico">
                    <span class="switch-icon-left"><i data-feather="check"></i></span>
                    <span class="switch-icon-right"><i data-feather="x"></i></span>
                </label>
            </div>
        </div>
    </div>

    <?php if ($_SESSION["allowGoogle"] == 1) : ?>
        <div class="d-flex mt-2">
            <div class="flex-shrink-0">
                <!-- <img src="../../../app-assets/images/icons/social/google.png" alt="google" class="me-1" height="38" width="38" /> -->
            </div>
            <div class="d-flex align-item-center justify-content-between flex-grow-1">
                <div class="me-1">
                    <p class="fw-bolder mb-0"> <i class="bi bi-google"></i> <span style="margin-left:10px;"><?= __("business_card_settings.cartao_google") ?></span>
                    </p>
                    <span><?= __("business_card_settings.cartao_google_desc") ?></span>
                </div>
                <div class="mt-50 mt-sm-0">
                    <div class="form-check form-switch form-check-info">
                        <input type="checkbox" class="form-check-input" name="publicGoogle" id="checkboxGoogle" <?php if ($setting["crd_show_google"] == 1) {
                                                                                                                    echo "checked";
                                                                                                                } ?> />
                        <label class="form-check-label" for="checkboxGoogle">
                            <span class="switch-icon-left"><i data-feather="check"></i></span>
                            <span class="switch-icon-right"><i data-feather="x"></i></span>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>



</div>
<div class="card pb-0" style="padding-bottom:0px !important;">
    <div class="row">
        <div class="col-5 ">
            <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=<?= Config::BASE_URL . "business-card/" . $user["usr_user"] ?>" alt="qr-code" style="height:140px; padding:20px;border-radius:10px; background-color:#ffffff; box-shadow: 10px 10px 20px 3px #201f1f40; margin-left:5%; margin-top:20px;margin-bottom:20px;">
        </div>
        <div class="col-7">
            <div style="padding:20px;">
                <div class="row">
                    <h3 style="color:#00BBD3 !important;">Acesse seu</h3>
                    <h2 style="color: #00BBD3 !important;">Business Card</h2>
                </div>
                <br />
                <div class="row">
                    <a target="_blank" href="<?= Config::BASE_URL . 'business-card/' . $_SESSION['username'] ?>"><span class="btn btn-info" style="background-color: #00BBD3 !important;">Acessar</span>
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>














<?php
require __DIR__ . "/../../" . Config::BASE_PATH_JS . str_replace(".view", ".js.php", basename(__FILE__, ".php"));
?>


<!-- /Activity Timeline -->