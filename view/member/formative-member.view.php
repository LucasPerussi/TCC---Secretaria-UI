<?php

use API\Controller\Config;


date_default_timezone_set('America/Sao_Paulo');
?>


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

    <?php include "view/src/mainMenu.php"; ?>

    <div class="main-content">
        <div class="content-wrapper">
            <div class="content-body">
                <div class="container split-container">
                    <div class="left-content">
                        <div class="title-container">
                            <h3><?= __("formative_member.title-left") ?></h3>
                            <a href="new-formative-member" class="btn btn-primary" style="margin-left: 10px;">Nova</a>
                        </div>

                        <div class="cards-container" id="student-hours-cards">
                            <?php if (!isset($hours["error"])) { ?>
                                <?php foreach ($hours as $hour) { ?>
                                    <div class="card">
                                    <h4><?= $types[$hour["tipo"]]["nome"] ?></h4>
                                    <p><?= $hour["descricao"] ?></p>
                                        <div class="card-icons">
                                            <div class="icon <?php if (["status_aprovacao"] == 1) {
                                                                    echo "yellow";
                                                                } elseif (["status_aprovacao"] == 2) {
                                                                    echo "green";
                                                                } else {
                                                                    echo "red";
                                                                } ?>"><?php if (["status_aprovacao"] == 1) {
                                                                        echo "Pendente";
                                                                    } elseif (["status_aprovacao"] == 2) {
                                                                        echo "Aprovado";
                                                                    } else {
                                                                        echo "Recusado";
                                                                    } ?></div>
                                            <div class="icon green"><?= $hours["horas_solicitadas"] ?> Horas Solicitadas</div>
                                            <a href="formative-member-details">
                                                <div class="icon gray"><?= __("formative_member.button") ?></div>
                                            </a>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } else { ?>
                                <div class="card">
                                    <h4><?= $hours["message"] ?></h4>
                                </div>
                            <?php } ?>





                        </div>
                    </div>

                    <div class="right-content">
                        <h3>60 horas</h3>
                        <p><?= __("formative_member.total-hours") ?></p>

                        <div class="large-cards-container">
                            <div class="large-card">
                                <h4><?= __("formative_member.progress") ?></h4>
                                <canvas id="pie-chart-1"></canvas>
                            </div>

                            <div class="large-card">
                                <h4><?= __("formative_member.tasks") ?></h4>
                                <canvas id="pie-chart-2"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "view/src/footer.php"; ?>

    <?php
    require __DIR__ . "/../../" . Config::BASE_PATH_JS . str_replace(".view", ".js.php", basename(__FILE__, ".php"));
    ?>
</body>

</html>