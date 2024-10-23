<?php
session_start();

use API\Controller\Config;
use const Siler\Config\CONFIG;

$status = '';

if ($_FILES['arquivo']['error'] === UPLOAD_ERR_OK) {
    $nome_arquivo = $_FILES['arquivo']['name'];
    $tamanho_arquivo = $_FILES['arquivo']['size'];
    $tipo_arquivo = pathinfo($nome_arquivo, PATHINFO_EXTENSION);
    $user = $_SESSION["user_id"];
    $type = 1;
    $descricao = $_POST["descricao"];
    $reference = 9999;

    $number = rand(1000, 10000000);
    $nome_arquivo = $number . "-" . $nome_arquivo;

    // Caminho absoluto do diretório de destino
    $caminho_absoluto = '/var/www/html/src/files/';
    $caminho_arquivo = $caminho_absoluto . $nome_arquivo;

    // Certifique-se de que o diretório existe
    if (!is_dir($caminho_absoluto)) {
        if (!mkdir($caminho_absoluto, 0777, true)) {
            $status = "Erro ao criar o diretório: $caminho_absoluto";
        }
    }

    // Verifique as permissões do diretório
    if (!is_writable($caminho_absoluto)) {
        $status = "Diretório não possui permissão de escrita: $caminho_absoluto";
    } else {
        if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $caminho_arquivo)) {
            $status = "Arquivo movido para: $caminho_arquivo";
        } else {
            $status = "Erro ao mover o arquivo para: $caminho_arquivo. Verifique as permissões.";
            $status .= "<br>Informações de depuração:<br>";
            $status .= "Caminho absoluto: $caminho_absoluto<br>";
            $status .= "Caminho do arquivo: $caminho_arquivo<br>";
            $status .= "Erro: " . error_get_last()['message'];
        }
    }
} else {
    $status = "Erro no upload do arquivo: " . $_FILES['arquivo']['error'];
}
?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

<form id="uploading">
    <input hidden type="text" value="<?= htmlspecialchars($tipo_arquivo) ?>" name="tipo_arquivo">
    <input hidden type="text" value="<?= htmlspecialchars($tamanho_arquivo) ?>" name="tamanho_arquivo">
    <input hidden type="text" value="<?= htmlspecialchars($nome_arquivo) ?>" name="nome_arquivo">
    <input hidden type="text" value="<?= htmlspecialchars($caminho_arquivo) ?>" name="caminho_arquivo">
    <textarea hidden name="descricao"><?= htmlspecialchars($_POST['descricao']) ?></textarea>
    <input hidden name="type" value="<?= htmlspecialchars($_POST['type']) ?>">
    <input hidden name="reference" value="<?= htmlspecialchars($_POST['reference']) ?>">
    <input hidden type="submit" id="enviar">
</form>

<!-- <h1>Status do Upload</h1>
<p><strong>Nome do Arquivo:</strong> <?= htmlspecialchars($nome_arquivo) ?></p>
<p><strong>Caminho do Arquivo:</strong> <?= htmlspecialchars($caminho_arquivo) ?></p>
<p><strong>Tamanho do Arquivo:</strong> <?= htmlspecialchars($tamanho_arquivo) ?> bytes</p>
<p><strong>Tipo do Arquivo:</strong> <?= htmlspecialchars($tipo_arquivo) ?></p>
<p><strong>Status:</strong> <?= $status ?></p> -->

<script>
    $("#uploading").submit(function(e) {
        e.preventDefault();
        const data = new FormData(e.target);
        const object = Object.fromEntries(data.entries());
        axios.post('https://wejourney.com.br/action/file/upload', object)
            .then(function(response) {
                if (response.data.error) {
                    throw response.data;
                } else {
                    Swal.fire({
                        title: 'Feito!',
                        text: "Seu arquivo foi enviado com sucesso!",
                        icon: 'success',
                        showCancelButton: false,
                        allowOutsideClick: false,
                        confirmButtonColor: '#1f8cd4',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Legal!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = "https://wejourney.com.br/<?= htmlspecialchars($_POST['previous']) ?>"
                        }
                    })
                }
            })
            .catch(function(error) {
                Swal.fire({
                    title: 'Erro!',
                    text: error.message,
                    icon: 'error',
                    showCancelButton: false,
                    confirmButtonColor: '#1f8cd4',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'OK'
                })
            });
    });

    setTimeout(function() {
        var botao = document.getElementById('enviar');
        botao.click();
    }, 500);
</script>
