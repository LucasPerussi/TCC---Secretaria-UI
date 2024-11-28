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
            <link rel="stylesheet" href="src/css/new-request.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
            <title>Nova Solicitação</title>
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
                    <div class="content-body">
                        <div class="request-container">
                            <h2 class="main-title align-left">Nova Solicitação</h1>

                            <div class="request-card">
                                <h2 class="section-title">Tipo de Chamado</h2>
                                <p class="section-description">Selecione o tipo de chamado para cadastrar as informações necessárias
                                para seu andamento.</p>
                
                                <div class="custom-select-container">
                                    <select class="request-select">
                                        <option value="" disabled selected>Tipo de chamado</option>
                                        <option value="Opção 1">Opção 1</option>
                                        <option value="Opção 2">Opção 2</option>
                                        <option value="Opção 3">Opção 3</option>
                                    </select>
                                    <i class="bi bi-caret-down-fill select-icon"></i>
                                </div>

                                <button class="next-button" onclick="window.location.href='new-request-field'">Próximo</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include "view/src/footer.php"; ?>

            <script src="exemplo-de-script-1"></script>
            <script src="exemplo-de-script-2"></script>
        </body>
    </html>
    <?php endif; ?>