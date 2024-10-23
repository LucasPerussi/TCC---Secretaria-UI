<?php

use API\Controller\Config; ?>


<h1>Segurança</h1>
<br />
<h3><?= __("security.titulo") ?></h3>
<br />
<!-- two-step verification -->
<div class="card" style="padding: 15px;">

    <p class="fw-bolder"><?= __("security.subtitulo") ?></p>
    <p><?= __("security.descricao") ?></p>
    <button type="button" class="btn btn-info" data-bs-toggle="modal" <?php if ($_SESSION["user_from"] != 0) {
                                                                            echo " disabled ";
                                                                        } ?> onclick="location.href='#change-password-section'"><?= __("security.botao") ?></button>
    <?php if ($_SESSION["user_from"] != 0) {
        echo " <br/><br/><span style='color: red;'>" . __("security.servico_externo") . "</span> ";
    } ?>

</div>
<div class="card " style="padding: 15px; margin-bottom:15px;">

    <div class="d-flex ">

        <div class="d-flex align-item-center justify-content-between flex-grow-1">
            <div class="me-1">
                <p class="fw-bolder mb-0"> <i class="bi bi-lock"></i> <span style="margin-left:10px;"><?= __("security.dois_fatores") ?></span>
                </p><br />
                <span><?= __("security.autenticacao_desc") ?></span>
                <?php if ($_SESSION["user_from"] != 0) : ?>
                    <br /><br /><span style="color:red; "><?= __("security.not_necessary") ?></span>
                <?php endif; ?>
                <?php if ($_SESSION["forceDoubleStep"] != 0) : ?>
                    <br /><br /><span style="color:red; "><?= __("security.obrigatorio") ?></span>
                <?php endif; ?>
            </div>
            <div class="mt-50 mt-sm-0">
                <?php if ($_SESSION["forceDoubleStep"] == 0) : ?>
                    <?php if ($_SESSION["user_from"] == 0) : ?>
                        <div class="form-check form-switch form-check-info">
                            <input type="checkbox" class="form-check-input" name="double" id="checkboxDouble" <?php if ($user["usr_doubleVerify"] == 2) {
                                                                                                                    echo "checked";
                                                                                                                } ?> />
                            <label class="form-check-label" for="checkboxDouble">
                                <span class="switch-icon-left"><i data-feather="check"></i></span>
                                <span class="switch-icon-right"><i data-feather="x"></i></span>
                            </label>
                        </div>
                    <?php else : ?>
                        <span style="font-size:10px;"><?= __("security.via_email") ?></span>
                    <?php endif; ?>
                <?php else : ?>
                    <span style="font-size:10px;"><?= __("security.ativado") ?></span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<div class="card" style="padding: 15px; margin-bottom:15px;">
    <div class="d-flex align-item-center justify-content-between flex-grow-1">
        <div class="me-1">
            <a href="<?= Config::BASE_URL . "whitelist" ?>">
                <p class="fw-bolder mb-0" style="color:#00cfe8 !important;font-weight:800 !important;"> <i class="bi bi-pin"></i> <span style="margin-left:10px;color:#00cfe8 !important;font-weight:800 !important;"><?= __("security.locais_seguros") ?></span>
                </p>
                <span ><?= __("security.locais_seguros_desc") ?></span>
            </a>
        </div>
    </div>
</div>
<div class="card" style="padding: 15px;">
    <div class="d-flex align-item-center justify-content-between flex-grow-1">
        <div class="me-1">
            <a href="<?= Config::BASE_URL . "list-logins" ?>">
                <p class="fw-bolder mb-0" style="color:#00cfe8 !important;font-weight:800 !important;"> <i class="bi bi-pin-map"></i> <span style="margin-left:10px;color:#00cfe8 !important;font-weight:800 !important;"><?= __("list_logins.sessoes_ativas") ?></span>
                </p>
                <span ><?= __("security.locais_seguros_desc") ?></span>
            </a>
        </div>
    </div>
</div>
<!-- </div>
</div> -->


<!-- END: Content-->







<script>
    feather.replace()
</script>
<!-- END: Theme JS-->

<script>
    $('#checkboxDouble').on('change', function() {
        const dado = $("input[name='double']:checked").val();
        axios.post(`<?= Config::BASE_ACTION_URL ?>/double/check/${dado}`)
            .then(function(response) {
                if (response.data != "sucesso!") {
                    Toast.fire({
                        icon: 'error',
                        title: '<?= __("security.erro") ?>'
                    })
                } else {
                    Toast.fire({
                        icon: 'success',
                        title: '<?= __("security.sucesso") ?>'
                    })
                }
            })

    })
</script>


</script>
</body>
<!-- END: Body-->



</html>