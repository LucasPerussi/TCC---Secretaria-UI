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
            <link rel="stylesheet" href="src/css/complete-board.css">
            <title>Mural UFPR</title>
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
                        <?php if (!isset($mural['error'])) { ?>
                            <div class="board p-3">
                                <h3><?= htmlspecialchars($mural["titulo"]) ?></h3>
                                <p>
                                    por <?= htmlspecialchars($autor["nome"]) ?> -
                                    <?php
                                    $timestamp = strtotime($mural["data"]);
                                    echo $timestamp !== false ? date("d/m/Y H:i", $timestamp) : "Data inválida";
                                    ?>
                                </p>
                                <p class="board-text"><?= nl2br(htmlspecialchars($mural["descricao"])) ?></p>
                                <span class="badge rounded-pill bg-light-primary">
                                    Curso Alvo: <?= htmlspecialchars($curso["nome"]) ?>
                                </span>
                                <span class="badge rounded-pill bg-light-<?= $mural["visivel"] == 1 ? "success" : "danger" ?>">
                                    <? $mural["visivel"] == 1 ? "Visível" : "Oculto" ?>
                                </span>
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-danger">
                                <p><?= htmlspecialchars($mural["error"]) ?></p>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <?php include "view/src/footer.php"; ?>

            <script src="exemplo-de-script-1"></script>
            <script src="exemplo-de-script-2"></script>
        </body>
    </html>
    <?php endif; ?>