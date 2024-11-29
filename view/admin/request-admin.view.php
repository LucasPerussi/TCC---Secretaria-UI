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
                                    <i class="bi bi-globe"></i> <?= __("request_request.details") ?>
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
                                                <span class="timeline-title">Ticket Registrado</span>
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
                            </div>
                        </div>
                    </div>

                    <div class="right-side">
                        <h2>Dados do Chamado</h2>
                        <p><strong>Chamado ID:</strong> #12345</p>
                        <p><strong>Status:</strong> Em andamento</p>
                        <p><strong>Responsável</strong> Fulano de Tal</p>
                        <p><strong>Data de Abertura:</strong> 23/11/2024</p>
                        <p><strong>Última Atualização:</strong> 24/11/2024</p>
                        </div>
                    </div>
                </div>

            <?php include "view/src/footer.php"; ?>

            <script src="src/js/member-request.js.php" type="text/javascript"></script>
        </body>
    </html>
    <?php endif; ?>