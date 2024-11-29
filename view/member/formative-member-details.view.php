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
            <link rel="stylesheet" href="src/css/formative-member-details.css">
            <title>Detalhes do Registro - Hora Formativa</title>
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
                        <div class="container">
                            <h3>Detalhes da Hora Formativa</h3>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th><?= __("formative_member.details.task") ?></th>
                                        <th><?= __("formative_member.details.description") ?></th>
                                        <th><?= __("formative_member.details.hours") ?></th>
                                        <th><?= __("formative_member.details.situation") ?></th>
                                        <th><?= __("formative_member.details.post-date") ?></th>
                                        <th><?= __("formative_member.details.deliberation") ?></th>
                                        <th><?= __("formative_member.details.actions") ?></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Curso de Programação</td>
                                        <td>Curso online de programação em Python</td>
                                        <td>20 horas</td>
                                        <td>Válido</td>
                                        <td>15/11/2024</td>
                                        <td>20/11/2024</td>
                                        <td>
                                            <button class="btn btn-secondary" disabled><?= __("formative_member.details.button") ?></button>
                                            <a href="formative-member" class="btn btn-danger"><?= __("formative_member.details.remove") ?></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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