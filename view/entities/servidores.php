<div class="row">
    <?php include "view/entities/select-card.php";
    select_card('servidores'); ?>
    <div class="col-12 col-md-8">
        <div class="title-container mt-1 ml-3">
            <h3><?= __("entities.servidores.titulo") ?></h3>
        </div>
        <div class="d-flex flex-row content-wrapper">
            <div class="cards-container w-100 h-auto">

                <?php include "view/entities/servidor-div.php";
                foreach ($data as $servidor) {
                    servidor_div($servidor["id"], $servidor["nome"], $servidor["sobrenome"], $servidor["registro"], $servidor["foto"], $servidor["funcao"], $servidor["status_usuario"]);
                }
                ?>
            </div>
        </div>
    </div>
</div>