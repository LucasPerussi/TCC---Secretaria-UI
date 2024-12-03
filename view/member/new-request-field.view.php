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
            <link rel="stylesheet" href="src/css/new-request-field.css">
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
                        <div class="request-container">
                            <h2 class="main-title align-left">Nova Solicitação</h2>

                            <div class="row">
                                <div class="col-md-7 col-sm-12">
                                    <div class="card p-1">
                                        <form id="registerRequest">
                                            <div class="row">
                                                <div class="mb-1 row">
                                                    <div class="col-sm-12">
                                                        <label class="col-form-label" required for="titulo-input">Título</label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text"><i class="bi bi-pencil"></i></span>
                                                            <input type="text" id="titulo-input" class="form-control" name="titulo" placeholder="Título da solicitação" />
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="mb-1 row">
                                                    <div class="col-sm-12">
                                                        <label class="col-form-label" required for="descricao-input">Descrição</label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="input-group input-group-merge">
                                                            <span class="input-group-text"><i class="bi bi-card-text"></i></span>
                                                            <textarea id="descricao-input" class="form-control" name="descricao" placeholder="Descreva sua solicitação"></textarea>
                                                        </div>
                                                    </div>
                                                </div>

                                                <input type="hidden" name="aluno" value="<?= htmlspecialchars($_SESSION['user_id']); ?>" />

                                                <div class="mb-1 row">
                                                    <div class="col-sm-12">
                                                        <label class="col-form-label" for="professor-select">Professor Avaliador</label>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="input-group input-group-merge select">
                                                            <select class="form-select form-select-lg" name="professor_avaliador" id="professor-select">
                                                                <option value="" disabled selected>Selecione um professor</option>
                                                                <option value="1">1</option>
                                                                <option value="2">2</option>
                                                                <option value="3">3</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12">
                                                        <button type="submit" class="btn btn-primary" style="float:right;">Cadastrar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php include "view/src/footer.php"; ?>

            <!-- BEGIN: Page JS-->
            <script src="layout/app-assets/js/scripts/forms/form-quill-editor.js"></script>
            <?php
                require __DIR__ . "/../../" . Config::BASE_PATH_JS . str_replace(".view", ".js.php", basename(__FILE__, ".php"));
            ?>
        </body>
    </html>
    <?php endif; ?>