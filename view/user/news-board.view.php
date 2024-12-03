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
            <link rel="stylesheet" href="src/css/news-board.css">
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
                        
                    <h1 class="title">Mural</h1>
                    <div class="cards-container">
                        <?php if (!isset($murais["error"])) { ?>
                            <?php foreach ($murais as $mural) { ?>
                                <?php if ($mural["visivel"] == 1) { ?>
                                    <div class="card white p-2">
                                        <h4><?= htmlspecialchars($mural["titulo"]) ?></h4>
                                        <p><?= htmlspecialchars($mural["descricao"]) ?></p>
                                        <div class="card-icons">
                                            <h6 style="font-size:11px;">

                                                <span class="badge rounded-pill bg-light-success">Visível</span>
                        
                                                <span class="badge rounded-pill bg-light-info">
                                                    Autor: <?= $authors[$mural["autor"]] ?? "Desconhecido" ?>
                                                </span>

                                                <span class="badge rounded-pill bg-light-primary">
                                                    Postado em:
                                                    <?php
                                                    $timestamp = strtotime($mural["data"]);
                                                    echo $timestamp !== false ? date("d/m/Y H:i", $timestamp) : "Data inválida";
                                                    ?>
                                                </span>

                                                <a href="news-board-details?mural=<?= urlencode($mural["id"]) ?>" class="badge rounded-pill bg-light-secondary">
                                                    <i class="bi bi-eye"></i> Ver Detalhes
                                                </a>
                                            </h6>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        <?php } else { ?>
                            <div class="card">
                                <h4><?= $murais["message"] ?></h4>
                            </div>
                        <?php } ?>
                    </div>

            <?php include "view/src/footer.php"; ?>

            <script src="exemplo-de-script-1"></script>
            <script src="exemplo-de-script-2"></script>
        </body>
    </html>
    <?php endif; ?>