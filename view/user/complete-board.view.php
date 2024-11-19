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
            <title>Exemplo de Título</title>
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
                        <i class="bi bi-person"></i>
                        <div class="board">
                            <h3><?= __("news_board.title") ?></h3>
                            <p>por Matheus Correa Fiori - segunda, 18 de nov de 2024, 10:09</p>
                            <p class="board-text">loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            loren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsumloren ipsum
                            </p>
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