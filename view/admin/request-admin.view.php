<?php

use API\Controller\Config;
use API\Controller\ipinfo;
use const Siler\Config\CONFIG;

date_default_timezone_set('America/Sao_Paulo');
?>

<?php if (!isset($_SESSION["user_id"])) : ?>
    <html>
        <head>
            <meta http-equiv="Refresh" content="0; url=<?= Config::BASE_URL . "login"; ?>" />
        </head>
    </html>
<?php else : ?>

    <!DOCTYPE html>
    <html lang="en" data-textdirection="ltr">
        <head>
            <?php include "view/src/head.php"; ?>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
            <link rel="stylesheet" href="src/css/request.css">
            <title>Acompanhamento do Chamado</title>
        </head>

        <body class="snippet-body vertical-layout vertical-menu-modern  navbar-floating footer-static dark-layout  <?php if ($_SESSION["user_id"]) {
                                                                                                                            echo "menu-collapsed";
                                                                                                                        } else {
                                                                                                                            echo "menu-hide";
                                                                                                                        } ?>" data-open="click" style="padding-right:0px;" data-menu="vertical-menu-modern">
            <?php include "view/src/header.php"; ?>

            <?php include "view/src/mainMenu.php"; ?>

            <div class="main-content">
                <div class="content-wrapper">
                        
                    <div class="left-side">
                        <h2 class="page-title">3276452 - Solicitação de Quebra de Requisito</h2>                        
                            
                        <div class="message-card">
                            <p>Preciso quebrar BD1 como requisito para TCC1 por motivo de força maior. Agora vou descrever o motivo com loren ipsum loren ipsum
                            loren ipsum loren ipsum loren ipsum loren ipsum loren ipsum loren ipsum loren ipsum loren ipsum loren ipsum loren ipsum loren ipsum 
                            loren ipsum loren ipsum loren ipsum loren ipsum loren ipsum loren ipsum loren ipsum loren ipsum loren ipsum loren ipsum loren ipsum 
                            </p>
                        </div>

                        <div class="tab-container">
                            <div class="tabs">
                                <button class="tab-button active" data-tab="progress">
                                    <i class="bi bi-chat-left-text"></i> <?= __("request_request.progress-button") ?>
                                </button>
                                
                                <button class="tab-button" data-tab="timeline">
                                    <i class="bi bi-clock"></i> <?= __("request_request.timeline-button") ?>
                                </button>
                                
                                <button class="tab-button" data-tab="details">
                                    <i class="bi bi-globe"></i> <?= __("request_request.details-button") ?>
                                </button>

                                <button class="tab-button" data-tab="settings">
                                    <i class="bi bi-gear"></i> <?= __("request_request.settings-button") ?>
                                </button>
                            </div>

                            <div class="tab-content">

                                <div id="progress" class="tab active">
                                    <h2 class="comment-title"><?= __("request_request.progress-title") ?></h2>
                                    <div class="comments-container">
                                        <div class="comment left">
                                            <div class="comment-info">
                                                <img src="https://via.placeholder.com/40" alt="Foto de perfil" class="profile-pic">
                                                <div class="comment-text">
                                                    <p><strong>Lucas Perussi</strong></p>
                                                    <p class="date">04/03/2024 as 08:52</p>
                                                    <p class="message">Este é um comentário realizado por mim.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="comment right">
                                            <div class="comment-info">
                                                <img src="https://via.placeholder.com/40" alt="Foto de perfil" class="profile-pic">
                                                <div class="comment-text">
                                                    <p><strong>Gabriela Schneider Lopes</strong>
                                                    <p class="date">04/03/2024 as 08:53</p>
                                                    <p class="message">Este é um comentário realizado por um agente.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="comment-card">
                                            <textarea class="comment-input" rows="3"></textarea>
                                            <button class="comment-button">Comentar</button>
                                    </div>
                                </div>

                                <div id="timeline" class="tab">
                                    <h2 class="comment-title"><?= __("request_request.timeline-title") ?></h2>

                                    <div class="timeline-container">

                                        <div class="timeline-item">
                                            <div class="timeline-marker"></div>
                                            <div class="timeline-header">
                                                <span class="comment-title">Ticket Registrado</span>
                                                <span class="timeline-datetime">2024-03-04 08:51:56</span>
                                            </div>
                                            <div class="timeline-description">
                                                Ticket aberto por por perussilucas@hotmail.com
                                            </div>
                                            <div class="timeline-status">
                                                <span class="status-text green">Chamado Aberto</span>
                                            </div>
                                        </div>

                                        <div class="timeline-item">
                                            <div class="timeline-marker"></div>
                                            <div class="timeline-header">
                                                <span class="timeline-title">Novo comentário</span>
                                                <span class="timeline-datetime">2024-03-04 08:52:29</span>
                                            </div>
                                            <div class="timeline-description">
                                                Um novo comentário foi registrado em seu chamado, efetuado por Lucas Perussi.
                                            </div>
                                            <div class="timeline-status">
                                                <span class="status-text blue">Em andamento</span>
                                            </div>
                                        </div>

                                        <div class="timeline-item">
                                            <div class="timeline-marker"></div>
                                            <div class="timeline-header">
                                                <span class="timeline-title">Novo comentário</span>
                                                <span class="timeline-datetime">2024-03-04 08:53:43</span>
                                            </div>
                                            <div class="timeline-description">
                                                Um novo comentário foi registrado em seu chamado, efetuado por Gabriela Schineider Lopes.
                                            </div>
                                            <div class="timeline-status">
                                                <span class="status-text blue">Em andamento</span>
                                            </div>
                                        </div>

                                        <div class="timeline-item">
                                            <div class="timeline-marker"></div>
                                            <div class="timeline-header">
                                                <span class="timeline-title">Encerramento da Solicitação</span>
                                                <span class="timeline-datetime">2024-03-04 11:55:37</span>
                                            </div>
                                            <div class="timeline-description">
                                                Ticket encerrado com sucesso!
                                            </div>
                                            <div class="timeline-status">
                                                <span class="status-text red">Chamado Fechado</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="details" class="tab">
                                    <p>Conteúdo da aba "Detalhes".</p>
                                </div>
                                
                                <div id="settings" class="tab">
                                    <div class="settings-card-container">
                                        <div class="settings-card">
                                            <h2 class="comment-title"><?= __("request_request.settings-teacher.title") ?></h2>
                                            <p class="timeline-description"><?= __("request_request.settings-teacher.description") ?></p>

                                            <div class="custom-select-container">
                                                <select class="request-select">
                                                    <option value="" disabled selected><?= __("request_request.settings-teacher.select") ?></option>
                                                    <option value="Opção 1">Opção 1</option>
                                                    <option value="Opção 2">Opção 2</option>
                                                    <option value="Opção 3">Opção 3</option>
                                                </select>
                                                <i class="bi bi-caret-down-fill select-icon"></i>

                                                <button class="settings-button"><?= __("request_request.settings-teacher.button") ?></button>
                                            </div>
                                        </div>

                                        <div class="settings-card">
                                            <h2 class="comment-title"><?= __("request_request.settings-status.title") ?></h2>
                                            <p class="timeline-description"><?= __("request_request.settings-status.description") ?></p>

                                            <div class="custom-select-container">
                                                <select class="request-select">
                                                    <option value="" disabled selected><?= __("request_request.settings-status.select") ?></option>
                                                    <option value="Opção 1">Opção 1</option>
                                                    <option value="Opção 2">Opção 2</option>
                                                    <option value="Opção 3">Opção 3</option>
                                                </select>
                                                <i class="bi bi-caret-down-fill select-icon"></i>

                                                <button class="settings-button"><?= __("request_request.settings-status.button") ?></button>
                                            </div>
                                        </div>

                                        <div class="settings-card-conclusion">
                                            <h2 class="comment-title"><?= __("request_request.settings-conclude.title") ?></h2>
                                            <p class="timeline-description"><?= __("request_request.settings-conclude.description") ?></p>

                                            <div class="settings-radio-group">
                                                <label class="settings-radio-option">
                                                    <input type="radio" class="settings-radio-option-2" name="conclusion-status" value="deferido">
                                                    <span class="settings-radio-label"><?= __("request_request.settings-conclude.option-deferido") ?></span>
                                                </label>
                                                <label class="settings-radio-option">
                                                    <input type="radio" class="settings-radio-option-2" name="conclusion-status" value="indeferido">
                                                    <span class="settings-radio-label"><?= __("request_request.settings-conclude.option-indeferido") ?></span>
                                                </label>
                                                <label class="settings-radio-option">
                                                    <input type="radio" class="settings-radio-option-2" name="conclusion-status" value="concluido">
                                                    <span class="settings-radio-label"><?= __("request_request.settings-conclude.option-concluido") ?></span>
                                                </label>
                                                <label class="settings-radio-option">
                                                    <input type="radio" class="settings-radio-option-2" name="conclusion-status" value="cancelado">
                                                    <span class="settings-radio-label"><?= __("request_request.settings-conclude.option-cancelado") ?></span>
                                                </label>
                                            </div>

                                            <div class="settings-conclusion-comment">
                                                <textarea placeholder="Descrição da conclusão" rows="4" class="settings-input"></textarea>
                                            </div>

                                            <div class="file-upload-container">
                                                <p class="file-upload-title"><?= __("request_request.settings-conclude.send-file") ?></p>
                                                <div class="file-upload-area">
                                                    <div class="file-upload-clickable">
                                                        <i class="bi bi-pencil"></i>
                                                        <span class="file-upload-label"><?= __("request_request.settings-conclude.choose-file") ?></span>
                                                    </div>
                                                    <div class="file-upload-selected">
                                                        <?= __("request_request.settings-conclude.no-file") ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <button class="settings-conclude-button"><?= __("request_request.settings-conclude.button") ?></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="right-side">
                        <p><strong>Chamado ID:</strong> #12345</p>
                        <p><strong>Status:</strong> Em andamento</p>
                        <p><strong>Responsável</strong> Fulano de Tal</p>
                        <p><strong>Data de Abertura:</strong> 23/11/2024</p>
                        <p><strong>Última Atualização:</strong> 24/11/2024</p>

                        <div class="student-info-card">
                            <div class="student-info">
                                <div class="profile-pic"></div>
                                <div class="student-details">
                                    <p class="student-name">Nome do Aluno</p>
                                    <p class="student-id">Aluno - GRR999999</p>
                                    <p class="student-email">aluno@aluno.com</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include "view/src/footer.php"; ?>

            <script src="src/js/member-request.js.php" type="text/javascript"></script>
        </body>
    </html>
    <?php endif; ?>