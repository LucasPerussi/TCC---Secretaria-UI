
    <li class="todo-item"  type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasScroll-<?=$ticket["tkt_id"]?>" aria-controls="offcanvasScroll">
        <div class="todo-title-wrapper">
            <div class="todo-title-area">
                <i data-feather="more-vertical" class="drag-icon"></i>
                <div class="title-wrapper">
                    <!-- <div class="form-check">
                        <input type="checkbox" class="form-check-input"
                            id="customCheck1" />
                        <label class="form-check-label" for="customCheck1"></label>
                    </div> -->
                    <span class="todo-title"><?=$ticket["tkt_number"]?> - <?=$ticket["tkt_title"]?></span>
                </div>
            </div>
            <div class="todo-item-action">
                <div class="badge-wrapper me-1">
                    <!-- Status do chamado  -->
                    <?php if($ticket["tkt_status"] == 2):?>
                    <span
                        class="badge rounded-pill badge-light-secondary">Concluído</span>
                    <?php else:?>
                    <span class="badge rounded-pill badge-light-success">Aberto</span>
                    <?php endif;?>
                    <!-- Fim do status do chamado -->
                    <!-- Status do urgencia  -->
                    <?php if($ticket["tkt_urgency"] == 0):?>
                    <span class="badge rounded-pill badge-light-dark">N/C</span>
                    <?php elseif($ticket["tkt_urgency"] == 1):?>
                    <span class="badge rounded-pill badge-light-info">Duvidas</span>
                    <?php elseif($ticket["tkt_urgency"] == 2):?>
                    <span class="badge rounded-pill badge-light-primary">Solicitações</span>
                    <?php elseif($ticket["tkt_urgency"] == 3):?>
                    <span class="badge rounded-pill badge-light-secondary">Minoritário</span>
                    <?php elseif($ticket["tkt_urgency"] == 4):?>
                    <span class="badge rounded-pill badge-light-warning">Majoritário</span>
                    <?php elseif($ticket["tkt_urgency"] == 5):?>
                    <span class="badge rounded-pill badge-light-warning">Crítico</span>
                    <?php elseif($ticket["tkt_urgency"] == 6):?>
                    <span class="badge rounded-pill badge-light-danger">Emergencial</span>
                    <?php else:?>
                    <span class="badge rounded-pill badge-light-dark">Comercial  </span>
                    <?php endif;?>
                    <!-- Fim do status do urgencia -->
                    <!-- Status do plataforma  -->
                    <?php if($ticket["tkt_platform"] == 0):?>
                    <span class="badge rounded-pill badge-light-dark">N/C</span>
                    <?php elseif($ticket["tkt_platform"] == 1):?>
                    <span class="badge rounded-pill badge-light-info">Zoom</span>
                    <?php elseif($ticket["tkt_platform"] == 2):?>
                    <span class="badge rounded-pill badge-light-primary">Teams</span>
                    <?php elseif($ticket["tkt_platform"] == 4):?>
                    <span class="badge rounded-pill badge-light-success">Webex</span>
                    <?php elseif($ticket["tkt_platform"] == 3):?>
                    <span class="badge rounded-pill badge-light-dark">Google</span>
                    <?php else:?>
                    <span class="badge rounded-pill badge-light-danger">Zoom
                        Phone</span>
                    <?php endif;?><?php if ($ticket["tkt_status"] == 1): ?><span class="badge rounded-pill badge-light-danger" ><div id='countdown-<?= $ticket["tkt_id"] ?>'></div>  </span><?php endif;?>
            
                    <!-- Fim do status do plataforma -->
                </div>
                <small
                    class="text-nowrap text-muted me-1"><?=$ticket["tkt_created_at"]?></small>
                <!-- <div class="avatar">
                    <img src="<?=$_SESSION["user_picture"]?>"
                        alt="user-avatar" height="32" width="32" />
                </div> -->
            </div>
        </div>
    </li>
    <!-- <div class="offcanvas offcanvas-end" style="box-shadow: 50px 50px 50px #000;" data-bs-scroll="true" data-bs-backdrop="false" tabindex="-1" id="offcanvasScroll-<?=$ticket["tkt_id"]?>" aria-labelledby="offcanvasScrollLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasScrollLabel" class="offcanvas-title"><?=$ticket["tkt_title"]?></h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body my-auto mx-0 flex-grow-0">
        <p style="font-weight: bolder;" class="text-left">
                Descrição:
            </p>
            <p class="text-left">
                <?=$ticket["tkt_description"]?>
            </p>
            <br><br><br>
            <p style="font-weight: bolder;" class="text-left">
                Autor:
            </p>
            <p class="text-left">
                <?=$ticket["tkt_email"]?> (<?=$ticket["tkt_author"]?>)
            </p>
            <p style="font-weight: bolder;" class="text-left">
                Chamado Número:
            </p>
            <p class="text-left">
                <?=$ticket["tkt_number"]?>
            </p>
        <p style="font-weight: bolder;" class="text-left">
                Abertura do chamado:
            </p>
            <p class="text-left">
                <?=$ticket["tkt_created_at"]?>
            </p>
            <p style="font-weight: bolder;" class="text-left">
                Limite para Resposta:
            </p>
            <p class="text-left">
                <?=$ticket["tkt_response_limit"]?>
            </p>
            <p style="font-weight: bolder;" class="text-left">
                Limite para Recuperação:
            </p>
            <p class="text-left">
                <?=$ticket["tkt_recovery_limit"]?>
            </p>
            <p style="font-weight: bolder;" class="text-left">
                Limite para Resolução:
            </p>
            <p class="text-left">
                <?=$ticket["tkt_due_date"]?>
            </p>
            <br><br>
            <button type="button" onclick="location.href='<?=Config::BASE_URL . 'request/' . $ticket['tkt_identifier']?>';" class="btn btn-info mb-1 d-grid w-100">Ver Chamado</button>
            <?php if($ticket["tkt_status"] == 1):?><button type="button" data-code="<?=$ticket["tkt_id"]?>" class="btn btn-danger mb-1 d-grid w-100 delete">Fechar Chamado</button><?php endif;?>
            <button type="button" class="btn btn-outline-secondary d-grid w-100" data-bs-dismiss="offcanvas">
                Cancelar
            </button>
        </div>
    </div> -->