<div class="row">
    <?php include "view/entities/select-card.php";
    select_card('processos'); ?>
    <div class="col-12 col-md-8">
        <div class="title-container mt-1 ml-3">
            <h3><?= __("entities.processos.titulo") ?></h3>
        </div>
        <div class="d-flex flex-row content-wrapper">
            <div class="cards-container w-100 h-auto">

                <?php include "view/entities/processo-div.php";
                foreach ($data as $processo) {
                    processo_div($processo["id"], $processo["nome"], $processo["sobrenome"], $processo["registro"], $processo["foto"], $processo["funcao"], $processo["status_usuario"]);
                }
                ?>
            </div>
        </div>
    </div>
</div>