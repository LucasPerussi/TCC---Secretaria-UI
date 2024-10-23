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
        <?php $cont = 0;
        $contOpen = 0;
        $contClosed = 0; ?>
        <?php if (mysqli_num_rows($ticketsCont) > 0) {
            while ($content = mysqli_fetch_assoc($ticketsCont)) {
                $cont++;
                if (($content["tkt_status"] == 1) || ($content["tkt_status"] == 2)) {
                    $contOpen++;
                } else {
                    $contClosed++;
                }
            }
        } ?>
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

    <!-- list start -->
    <div class="card" style="padding:20px;">

        <div class="accordion accordion-margin pt-0">
            <?php $contID = 0; ?>
            <?php if (mysqli_num_rows($tickets) > 0) : ?>
                <?php while ($ticket = mysqli_fetch_assoc($tickets)) : ?>
                    <?php $contID++;
                    $geraID = "id" . $contID; ?>
                    <div class="card accordion-item " style="margin-top:10px;">
                        <h2 class="accordion-header" id="paymentOne">
                            <button class="accordion-button collapsed" data-bs-toggle="collapse" role="button" data-bs-target="#<?= $geraID ?>" aria-expanded="false" aria-controls="faq-payment-one">
                                <div style="width:50%">
                                    <strong><?= $ticket["tkt_title"] ?></strong>
                                </div>
                                <div style="width:15%">
                                    <?php if ($ticket["tkt_status"] == 1) {
                                        echo "<span class='badge rounded-pill badge-light-info' style='margin-right:5px; right:110px;position:absolute; margin-top:-10px;'>" . __("my_requests.info.aberto") . "</span>";
                                    } elseif ($ticket["tkt_status"] == 2) {
                                        echo "<span class='badge rounded-pill badge-light-success' style='margin-right:5px;margin-top:-10px;padding:6px; right:110px; position:absolute; '>" . __("my_requests.info.escalonado") . "</span>";
                                    } else {
                                        echo "<span class='badge rounded-pill badge-light-secondary' style='margin-right:5px;margin-top:-10px;padding:6px; right:110px; position:absolute; '>" . __("my_requests.info.fechado") . "</span>";
                                    } ?>
                                </div>
                                <div style="width:15%">
                                    <span class='badge rounded-pill badge-light-secondary' style='margin-right:10px; right:20px;position:absolute;background-color:transparent !important;border-width:1px; border-style:solid; border-color: 2px solid #249ccc !important; margin-top:-10px; color:#249ccc !important;'><?= __("my_requests.detalhes") ?></span>
                                </div>
                            </button>
                        </h2>


                        <div id="<?= $geraID ?>" class="collapse accordion-collapse " aria-labelledby="paymentOne" data-bs-parent="#faq-payment-qna">
                            <div class="accordion-body ">
                                <style>
                                    #acessoo {
                                        max-width: 280px;
                                        padding: 7px;
                                        border-radius: 10px;
                                        background-color: transparent;
                                        border-width: 1px;
                                        border-style: solid;
                                        border-color: #249ccc;
                                        color: #249ccc !important;
                                        margin-left: 1%;
                                        margin-bottom: 10px;
                                        transition: all 0.5s ease-out;
                                    }

                                    #acessoo:hover {
                                        padding: 7px;
                                        border-radius: 10px;
                                        background-color: #249ccc;
                                        border-width: 1px;
                                        border-style: solid;
                                        border-color: #249ccc;
                                        color: white !important;
                                        margin-right: 20%;
                                        margin-bottom: 10px;
                                        transition: all 0.5s ease-out;
                                    }

                                    #acessoo2 {
                                        max-width: 280px;
                                        padding: 7px;
                                        border-radius: 10px;
                                        background-color: transparent;
                                        border-width: 1px;
                                        border-style: solid;
                                        border-color: tomato;
                                        color: tomato !important;
                                        margin-left: 1%;
                                        margin-bottom: 10px;
                                        transition: all 0.5s ease-out;
                                    }

                                    #acessoo2:hover {
                                        padding: 7px;
                                        border-radius: 10px;
                                        background-color: tomato;
                                        border-width: 1px;
                                        border-style: solid;
                                        border-color: tomato;
                                        color: white !important;
                                        margin-right: 10%;
                                        margin-bottom: 10px;
                                        transition: all 0.5s ease-out;
                                    }
                                </style>
                                <div class="row">
                                    <a id="acessoo" href="<?= Config::BASE_URL . "request/" . $ticket["tkt_identifier"] ?>"><?= __("my_requests.card_chamados.visualizar") ?></a>
                                </div>
                                <?php if ($ticket["tkt_status"] == 1) : ?>
                                    <div class="row">
                                        <a data-code="<?= $ticket["tkt_id"] ?>" class="delete" id="acessoo2"><?= __("my_requests.card_chamados.encerrar") ?></a>
                                    </div>
                                <?php endif; ?>
                                <h5 style="font-size:15px; margin-top:30px;margin-bottom:15px;"><?= __("my_requests.status") ?></h5>
                                <ul class="timeline">

                                    <?php foreach ($timelines as $timeline) { ?>
                                        <?php if ($timeline['ticketReference'] == $ticket["tkt_identifier"]) : ?>
                                            <li class="timeline-item">
                                                <span style="background-color: <?= Timeline_enum::getColorReal($timeline["type"]) ?> !important;" class="timeline-point timeline-point-indicator"></span>
                                                <div class="timeline-event">
                                                    <div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
                                                        <h6><?= $timeline["title"] ?></h6>
                                                        <span class="timeline-event-time">
                                                            <?php
                                                            setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');
                                                            echo strftime("%d de %B de %Y", strtotime($timeline["date"]));
                                                            ?></span>
                                                    </div>
                                                    <div><?= $timeline["description"] ?></div>
                                                    <div class="d-flex flex-row align-items-center">
                                                        <span style="margin-top:10px;padding:5px; border-radius:10px; border-style:solid; border-width:1px; border-color:<?= Timeline_enum::getColorReal($item["tln_type"]) ?>">
                                                            <?= Timeline_enum::getBadgeText($timeline["type"]) ?>
                                                        </span>
                                                    </div>
                                                </div>
                                            </li>
                                        <?php endif; ?>
                                    <?php }; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>

            <?php else : ?>
                <div style="color:black; font-size:12px;">
                    <span>Nenhum chamado realizado pelo usuário.</span>
                </div>
            <?php endif; ?>

        </div>

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