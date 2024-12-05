<style>
    .comment-card {
        max-width: 100%;
        word-wrap: break-word;
        overflow-wrap: break-word;
        margin-bottom: 10px;
    }

    .comment-bubble {
        overflow-x: hidden;
        padding: 10px;
        border-radius: 10px;
        position: relative;
        max-width: 70%;
    }

    .bubble-left {
        background-color: #9ba8d8;
        margin-left: 10px;
    }

    .bubble-right {
        background-color: #9bd8bc;
        /* background-color: #d1e7dd; */
        margin-right: 10px;
    }

    .avatar img {
        border-radius: 50%;
    }

    .comment-header {
        font-size: 15px;
        font-weight: bold;
        color: #6c757d;
        margin-bottom: 5px;
    }

    .comment-date {
        font-size: 11px;
        color: #6c757d;
    }

    .comment-text {
        font-size: 14px;
        color: #6c757d;

    }

    .comment-container {
        display: flex;
        align-items: flex-start;
    }

    .comment-container.self {
        justify-content: flex-end;
    }

    .comment-container.self .bubble {
        margin-right: 10px;
    }

    .comment-container.self .avatar {
        order: 2;
    }

    .comment-container.other .avatar {
        order: 1;
    }

    .comment-container.other .bubble {
        margin-left: 10px;
    }
</style>

<?php
// Inicie a sessão se ainda não estiver iniciada

use API\Controller\Config;

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Verifique se $allProcessComments está definido e não está vazio
if (isset($allProcessComments) && !empty($allProcessComments)) :
    foreach ($allProcessComments as $comment):
        // Verifica se o comentário é do usuário atual
        $isSelf = ($comment["usuario"] == $_SESSION["user_id"]);

        // Formata a data e hora
        $formattedDate = htmlspecialchars(date("d/m/Y", strtotime($comment["data"])));
        $formattedTime = htmlspecialchars(date("H:i", strtotime($comment["data"])));

        // Dados do usuário
        $user = $comment["usuario_comentarios_usuarioTousuario"];
        $userNome = htmlspecialchars($user["nome"]);
        $userFoto = htmlspecialchars($user["foto"]);


        $comentario = htmlspecialchars($comment["comentario"]);

?>
        <div class="card-body comment-card">
            <div class="comment-container <?= $isSelf ? 'self' : 'other' ?>">
                <?php if (!$isSelf): ?>
                    <div class="d-flex align-items-start">

                        <div class="avatar me-75" style="float:left !important;">
                            <img src="<?= Config::BASE_URL . $userFoto ?>" width="38" height="38" alt="Avatar de <?= $userNome ?>" />
                        </div>
                    </div>
                <?php endif; ?>

                <div class="bubble comment-bubble <?= $isSelf ? 'bubble-right' : 'bubble-left' ?>">
                    <div class="comment-header">
                        <?= $userNome ?>
                    </div>
                    <div class="comment-date">
                        <?= $formattedDate ?> <?= __("request.comentario.data_comentario") ?> <?= $formattedTime ?>
                    </div>
                    <div class="comment-text">
                        <?= $comentario ?>
                    </div>
                </div>

                <?php if ($isSelf): ?>
                    <div class="avatar me-75">
                        <img src="<?= Config::BASE_URL . $userFoto ?>" width="38" height="38" alt="Seu Avatar" />
                    </div>
                <?php endif; ?>
            </div>
        </div>
    <?php
    endforeach;
else:
    ?>
    <div class="col-12 mt-1">
        <p><?= htmlspecialchars(__("request.comentario.sem_comentarios")) ?></p>
    </div>
<?php endif; ?>


<!-- Leave a Blog Comment -->
<div class="col-12 mt-1">
    <h2 class="mt-25"><?= htmlspecialchars(__("request.comentario.comentar")) ?></h2>
    <br />
    <div class="card" style="padding:10px !important;">
        <form id="new-comment">
            <textarea name="comentario" id="editorCopy" required="required"
                placeholder="Deixe um comentário" class="form-control textarea"></textarea>
            <input type="text" name="processo" hidden value="<?= $request["id"] ?>">

            <div class="col-10">
                <br />
                <button type="submit" id="comentar" class="btn btn-info"><?= htmlspecialchars(__("request.comentario.botao")) ?></button>
                <button type="button" id="comentando" disabled hidden class="btn btn-secondary">...</button>
            </div>
        </form>
    </div>
</div>

