<div class="row">
    <?php include "view/entities/select-card.php";
    select_card('chamados'); ?>
    <div class="col-12 col-md-8">
        <div class="title-container mt-1 ml-3">
            <h3><?= __("entities.chamados.titulo") ?></h3>
        </div>
        <div class="d-flex flex-row content-wrapper">
            <div class="cards-container w-100 h-auto">

                <?php include "view/entities/chamado-div.php";
                foreach ($data as $chamado) {
                    chamado_div($chamado["id"], $chamado["nome"], $chamado["sobrenome"], $chamado["registro"], $chamado["foto"], $chamado["funcao"], $chamado["status_usuario"]);
                }
                ?>
            </div>
        </div>
    </div>
</div>