<div class="row">
    <?php include "view/entities/select-card.php";
    select_card('alunos'); ?>
    <div class="col-12 col-md-8">
        <div class="title-container mt-1 ml-3">
            <h3><?= __("entities.alunos.titulo") ?></h3>
        </div>
        <div class="d-flex flex-row content-wrapper">
            <div class="cards-container w-100 h-auto">

                <?php include "view/entities/aluno-div.php";
                foreach ($data as $aluno) {
                    aluno_div($aluno["id"], $aluno["nome"], $aluno["sobrenome"], $aluno["registro"], $aluno["foto"], $aluno["funcao"], $aluno["status_usuario"]);
                }
                ?>
            </div>
        </div>
    </div>
</div>