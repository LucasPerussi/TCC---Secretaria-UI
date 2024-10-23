<?php

use API\Controller\Config;
use API\enum\Queue;
use API\enum\Timeline_enum;

use function API\Fetch\getInternalOSDashboard;
use function API\Fetch\getInternalOSSettingView;

?>

<!-- users list start -->
<section class="accordion-with-border">
    <h1><?= __("my_requests.titulo") ?></h1>
    <div class="row">
        <?php
        // Variáveis contadoras
        $cont = 0;
        $contOpen = 0;
        $contClosed = 0;

        if (!isset($tickets['error'])) {
            if (count($tickets) > 0) {
                foreach ($tickets as $content) {
                    $cont++;
                    if (($content["status"] == 1) || ($content["status"] == 2)) {
                        $contOpen++;
                    } else {
                        $contClosed++;
                    }
                }
            }
        }
        ?>
        <div class="col-lg-4 col-sm-6">
            <div style="margin-top:15px;" class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="fw-bolder mb-75"><?= $cont ?></h3>
                        <span><?= __("my_requests.registrados") ?></span>
                    </div>
                    <div class="avatar bg-light-primary p-50">
                        <span class="avatar-content">
                            <i data-feather="activity" class="font-medium-4"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div style="margin-top:15px;" class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="fw-bolder mb-75"><?= $contOpen ?></h3>
                        <span><?= __("my_requests.aberto") ?></span>
                    </div>
                    <div class="avatar bg-light-primary p-50">
                        <span class="avatar-content">
                            <i data-feather="activity" class="font-medium-4"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-sm-6">
            <div style="margin-top:15px;" class="card">
                <div class="card-body d-flex align-items-center justify-content-between">
                    <div>
                        <h3 class="fw-bolder mb-75"><?= $contClosed ?></h3>
                        <span><?= __("my_requests.encerrados") ?></span>
                    </div>
                    <div class="avatar bg-light-primary p-50">
                        <span class="avatar-content">
                            <i data-feather="activity" class="font-medium-4"></i>
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card" style="padding:20px;">

        <?php $contID = 0; ?>
        <?php if (!isset($tickets['error'])) : ?>
            <?php foreach ($tickets as $ticket) : ?>
                <a id="acessoo" href="<?= Config::BASE_URL . "request/" . $ticket["identifier"] ?>">
                    <div class="card p-1 " id="bodyRequestDash" style="margin-top:5px !important;margin-bottom:5px !important;padding-bottom:5px !important;">
                        <h5 style="font-weight:500 !important;"><?= $ticket["title"] ?> <i class="bi bi-box-arrow-up-right" style="font-size:13px;"></i>

                            <?php if ($ticket["status"] == 1) : ?>
                                <span class='badge rounded-pill badge-light-success ' style="float:right !important;font-size:12px !important;"><?= __("my_requests.info.aberto") ?></span>
                            <?php elseif ($ticket["status"] == 2) : ?>
                                <span class='badge rounded-pill badge-light-primary ' style="float:right !important;font-size:12px !important;"><?= __("my_requests.info.escalonado") ?></span>
                            <?php else : ?>
                                <span class='badge rounded-pill badge-light-secondary ' style="float:right !important;font-size:12px !important;"><?= __("my_requests.info.fechado") ?></span>
                            <?php endif; ?>
                        </h5>
                        <?php if ($ticket["status"] == 1) : ?>
                            <h6 style="margin-top:5px; font-size:12px !important;"><a data-code="<?= $ticket["id"] ?>" class="delete badge rounded-pill badge-light-danger" style='cursor: pointer;'><i class="bi bi-exclamation-triangle-fill" style="font-size:11px !important;"></i> <?= __("my_requests.card_chamados.encerrar") ?></a> </h6>
                        <?php endif; ?>

                    </div>
                </a>
            <?php endforeach; ?>
        <?php else : ?>
            <div style="color:black; font-size:12px;">
                <span>Nenhum chamado realizado pelo usuário.</span>
            </div>
        <?php endif; ?>

    </div>




    <div class="card mb-2" style="padding:20px !important;padding-top:20px;">
        <div>
            <h3>Bugs</h3>
            <p class=" mt-1 mb-0">Bugs reportados por mim e seu estado</p>
            <div style="margin-top: 20px;overflow-y:auto;overflow-x:hidden; height:60vh;padding-right:15px;">
                <div class="row">
                    <?php
                    $internalOS = getInternalOSSettingView();
                    if (!empty($internalOS)) :
                        foreach ($internalOS as $os) : ?>
                            <div>
                                <div class="card mb-1" style="width:100%;padding:20px;" id="bodyRequestDash">
                                    <div class="row">
                                        <h5 style="margin-bottom:10px;justify-content:left;text-align:left;font-weight:500 !important; font-size:14px">
                                            <?= $os["title"] ?>
                                        </h5>
                                        <h6 style="margin-bottom:10px;justify-content:left;text-align:left; font-size:12px;">
                                            <?= $os["number"] ?> -
                                            <?php
                                            $timestamp = strtotime($os["date"]);
                                            $formatted_date = date("d/m/y \à\s H:i", $timestamp);
                                            echo $formatted_date;
                                            ?>
                                        </h6>
                                    </div>
                                    <div class="row">
                                        <div style="justify-content:left;text-align:left;">
                                            <?php if ($os["type"] == 1) : ?>
                                                <span class="badge rounded-pill badge-light-danger" style="font-size:10px">BUG</span>
                                            <?php elseif ($os["type"] == 2) : ?>
                                                <span class="badge rounded-pill badge-light-primary" style="font-size:10px">Solicitação</span>
                                            <?php endif; ?>
                                            <span class="badge rounded-pill badge-light-<?= Queue::getColor($os["queue"]) ?>" style="font-size:10px"><?= Queue::getNome($os["queue"]) ?></span>
                                            <?php if ($os["urgency"] == 1) : ?>
                                                <span class="badge rounded-pill badge-light-info" style="font-size:10px">Baixo</span>
                                            <?php elseif ($os["urgency"] == 2) : ?>
                                                <span class="badge rounded-pill badge-light-warning" style="font-size:10px">Médio</span>
                                            <?php elseif ($os["urgency"] == 3) : ?>
                                                <span class="badge rounded-pill badge-light-danger" style="font-size:10px">Alto</span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p>Nenhuma bug registrado pelo usuário!!</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <!-- list and filter end -->

    <script>
        $('.delete').on('click', function() {
            const code = $(this).attr("data-code");
            Swal.fire({
                title: '<?= __("Encerrar Chamado") ?>',
                text: "Tem certeza que deseja encerrar chamado? Este procedimento não poderá ser desfeito!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#B22222',
                cancelButtonColor: '#1f8cd4',
                confirmButtonText: 'Confirmar'
            }).then((result) => {
                if (result.value) {
                    axios.post(`<?= Config::BASE_ACTION_URL ?>/ticket/close/${code}`)
                        .then(function(response) {
                            if (response.data != "sucesso!") {
                                throw response.data;
                            } else {
                                window.location.href = "<?= Config::BASE_URL . "my-requests" ?>"
                            }
                        })
                        .catch(function(error) {
                            Swal.fire({
                                title: '<?= __("Error!") ?>',
                                text: "error",
                                icon: 'error',
                                showCancelButton: false,
                                confirmButtonColor: '#1f8cd4',
                                cancelButtonColor: '#d33',
                                confirmButtonText: '<?= __("OK") ?>'
                            })
                        });
                }
            })
        })
    </script>