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
<?php endif; ?>
<?php if (isset($_SESSION["user_id"]) && ($_SESSION["user_role"] == "Servidor" || $_SESSION["user_role"] == "Professor" || $_SESSION["user_role"] == "Admin")) : ?>
    <!DOCTYPE html>
    <html lang="en" data-textdirection="ltr">
        <head>
            <?php include "view/src/head.php"; ?>
            <link rel="stylesheet" href="src/css/formative-member.css">
            <title>Gerenciamento de Horas Formativas</title>
        </head>

        <body class="snippet-body vertical-layout vertical-menu-modern  navbar-floating footer-static dark-layout  <?php if ($_SESSION["user_id"]) {
                                                                                                                            echo "menu-collapsed";
                                                                                                                        } else {
                                                                                                                            echo "menu-hide";
                                                                                                                        } ?>" data-open="click" style="padding-right:0px;" data-menu="vertical-menu-modern">
            <?php include "view/src/header.php"; ?>

            <?php include "view/entities/menu-entity.php"; ?>

            <?php                            
            
            $page = isset($_GET['page']) && !empty($_GET['page']) ? $_GET['page'] : null;
              
            switch ($page) {
                case 'alunos':
                    include "view/entities/alunos.php";
                    break;
                case 'servidores':
                    include "view/entities/servidores.php";
                    break;
                case 'chamados':
                    include "view/entities/chamados.php";
                    break;
                case 'processos':
                    include "view/entities/processos.php";
                    break;
                default:
                include "view/entities/alunos.php";
                    break;
            }
            ?>


            <?php include "view/src/footer.php"; ?>

            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        </body>
    </html>
<?php else : ?>
        <html>
            <head>
            <meta http-equiv="Refresh" content="0; url=<?= Config::BASE_URL . "dashboard"; ?> " />
            </head>
            </html>
<?php endif; ?>