<?php

use API\Controller\Config; ?>

<div class="card">
    <div class="card-body">
        <div class="user-avatar-section">
            <div class="d-flex align-items-center flex-column">
                <img class="img-fluid mt-3 mb-2" style="border-radius:50%;" src="<?= $user["usr_picture"] ?>" height="200" width="200" alt="User avatar" />
                <div class="user-info text-center">
                    <h4><?= $user["usr_name"] ?> <?= $user["usr_last_name"] ?></h4>
                    <span class="badge bg-light-secondary">
                        <?php if (($user["usr_company"] == 9999) && ($user["usr_role"] == 1)) {
                            echo "Membro Genérico";
                        };
                        if (($user["usr_company"] == 9999) && ($user["usr_role"] == 2)) {
                            echo "Master";
                        }
                        if (($user["usr_company"] != 9999) && ($user["usr_role"] == 1)) {
                            echo "Membro (a)";
                        }
                        if (($user["usr_company"] != 9999) && ($user["usr_role"] == 2)) {
                            echo "Administrador (a)";
                        } ?></span>
                </div>
            </div>
        </div>
        <div class="d-flex justify-content-around my-2 pt-75">

        </div>
        <h4 class="fw-bolder border-bottom pb-50 mb-1"><?= __("profile_preview.detalhes") ?></h4>
        <div class="info-container">
            <ul class="list-unstyled">
                <li class="mb-75">
                    <span class="fw-bolder me-25"><?= __("profile_preview.username") ?>:</span>
                    <span><?= $user["usr_user"] ?></span>
                </li>
                <li class="mb-75">
                    <span class="fw-bolder me-25"><?= __("profile_preview.email") ?>:</span>
                    <span><?= $user["usr_email"] ?></span>
                </li>
                <li class="mb-75">
                    <span class="fw-bolder me-25"><?= __("profile_preview.status") ?>:</span>
                    <span class="badge bg-light-success"><?= __("profile_preview.ativo") ?></span>
                </li>
                <li class="mb-75">
                    <span class="fw-bolder me-25"><?= __("profile_preview.funcao") ?>:</span>
                    <span><?php if (($user["usr_company"] == 9999) && ($user["usr_role"] == 1)) {
                                echo __("profile_preview.membro_generico");
                            };
                            if (($user["usr_company"] == 9999) && ($user["usr_role"] == 2)) {
                                echo __("profile_preview.master");
                            }
                            if (($user["usr_company"] != 9999) && ($user["usr_role"] == 1)) {
                                echo __("profile_preview.membro");
                            }
                            if (($user["usr_company"] != 9999) && ($user["usr_role"] == 2)) {
                                echo __("profile_preview.admin");
                            } ?></span>
                </li>
                <li class="mb-75">
                    <span class="fw-bolder me-25"><?= __("profile_preview.aniversario") ?>:</span>
                    <?php if (isset($user["usr_born_date"])) : ?>
                        <?php
                        $month = substr($user["usr_born_date"], 5, 2);
                        switch ($month) {
                            case "01":
                                $monthT = __("badges.card_dados.niver.janeiro");
                                break;
                            case "02":
                                $monthT = __("badges.card_dados.niver.fevereiro");
                                break;
                            case "03":
                                $monthT = __("badges.card_dados.niver.marco");
                                break;
                            case "04":
                                $monthT = __("badges.card_dados.niver.abril");
                                break;
                            case "05":
                                $monthT = __("badges.card_dados.niver.maio");
                                break;
                            case "06":
                                $monthT = __("badges.card_dados.niver.junho");
                                break;
                            case "07":
                                $monthT = __("badges.card_dados.niver.julho");
                                break;
                            case "08":
                                $monthT = __("badges.card_dados.niver.agosto");
                                break;
                            case "09":
                                $monthT = __("badges.card_dados.niver.setembro");
                                break;
                            case "10":
                                $monthT = __("badges.card_dados.niver.outubro");
                                break;
                            case "11":
                                $monthT = __("badges.card_dados.niver.novembro");
                                break;
                            case "12":
                                $monthT = __("badges.card_dados.niver.dezembro");
                                break;
                        }
                        $day = substr($user["usr_born_date"], 8, 2);
                        ?>
                        <span class="card-text"><?= $day .  __("badges.card_dados.niver.de") . $monthT ?> 🎂</span>

                    <?php endif; ?>
                </li>
                <li class="mb-75">
                    <span class="fw-bolder me-25"><?= __("profile_preview.contato") ?>:</span>
                    <span><?= $user["usr_phone"] ?></span>
                </li>
                <li class="mb-75">
                    <span class="fw-bolder me-25"><?= __("profile_preview.pais") ?>:</span>
                    <span><?= $countries[$user["usr_country"]]["nome"] ?></span>
                </li>
            </ul>
            <?php if ((isset($url)) && ($url != Config::DOMINIO ."user-edit")):?>
            <!-- <div class="d-flex justify-content-left pt-2">
                <a href="<?= Config::BASE_URL . "user-edit" ?>" class="btn btn-outline-info me-1">
                    <?= __("profile_preview.editar") ?>
                </a>
            </div> -->
            <?php endif;?>
        </div>
    </div>
</div>
<!-- /User Card -->