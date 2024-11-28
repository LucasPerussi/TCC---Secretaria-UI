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
            <link rel="stylesheet" href="src/css/member-request.css">
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
                        <h1 class="page-title">Exemplo</h1>                        
                            
                        <div class="message-card">
                            <p>Esse é o texto da mensagem. Quanto maior for, maior será o card para acomodá-lo.</p>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus imperdiet, nulla et dictum interdum, nisi lorem egestas odio.</p>
                        </div>

                        <div class="tab-container">
                            <div class="tabs">
                                <button class="tab-button active" data-tab="progress">Andamento</button>
                                <button class="tab-button" data-tab="timeline">Timeline</button>
                                <button class="tab-button" data-tab="details">Detalhes</button>
                            </div>

                            <div class="tab-content">

                                <div id="progress" class="tab active">
                                    <h2 class="comment-title">Comentários</h2>

                                    <div class="comments-container">
                                        <div class="comment right">
                                            <div class="comment-info">
                                                <img src="https://via.placeholder.com/40" alt="Foto de perfil" class="profile-pic">
                                                <div class="comment-text">
                                                    <p><strong>Outra pessoa</strong></p>
                                                    <p class="date">24/11/2024</p>
                                                    <p class="message">Este é um comentário de exemplo.</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="comment left">
                                            <div class="comment-info">
                                                <img src="https://via.placeholder.com/40" alt="Foto de perfil" class="profile-pic">
                                                <div class="comment-text">
                                                    <p><strong>Eu</strong>
                                                    <p class="date">24/11/2024</p>
                                                    <p class="message">Este é outro comentário de exemplo.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="comment-card">
                                            <textarea class="comment-input" placeholder="Escreva um comentário..." rows="3"></textarea>
                                            <button class="comment-button">Comentar</button>
                                    </div>
                                </div>

                                <div id="timeline" class="tab">
                                    <h2 class="timeline-title">Linha do Tempo</h2>

                                    <div class="timeline">
                                        <div class="timeline-item">
                                            <div class="timeline-marker">
                                                <div class="timeline-content">
                                                    <div class="timeline-header">
                                                        <span class="notification-title">Chamado Criado</span>
                                                        <span class="notification-date">24/11/2024 10:30</span>
                                                    </div>
                                                    <p class="notification-description">
                                                        O chamado foi criado pelo usuário Ciclano.
                                                    </p>
                                                    <div class="notification-status open">Aberto</div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="timeline-item">
                                            <div class="timeline-marker"></div>
                                            <div class="timeline-content">
                                                <div class="timeline-header">
                                                    <span class="notification-title">Atualização</span>
                                                    <span class="notification-date">24/11/2024 12:45</span>
                                                </div>
                                                <p class="notification-description">
                                                    O responsável alterou o status do chamado para "Em Andamento".
                                                </p>
                                                <div class="notification-status in-progress">Em Andamento</div>
                                            </div>
                                        </div>

                                        <div class="timeline-item">
                                            <div class="timeline-marker">
                                                <div class="timeline-content">
                                                    <div class="timeline-header">
                                                        <span class="notification-title">Chamado Fechado</span>
                                                        <span class="notification-date">25/11/2024 09:15</span>
                                                    </div>
                                                    <p class="notification-description">
                                                        O chamado foi concluído com sucesso.
                                                    </p>
                                                    <div class="notification-status closed">Fechado</div>
                                                </div>
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