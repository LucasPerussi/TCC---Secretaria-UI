<?php

use API\Controller\Config;
use API\Controller\ipinfo;
use const Siler\Config\CONFIG; ?>

<?php if (!isset($_SESSION["user_id"])) : ?>
    <html>

    <head>
        <meta http-equiv="Refresh" content="0; url=<?= Config::BASE_URL . "login"; ?> " />
    </head>

    </html>
<?php else : ?>
    <?php

$page = isset($_GET['page']) ? $_GET['page'] : '';

// Futuro seletor de páginas
function getPageContent($page) {
    switch ($page) {
        case 'alunos':
            return '<h2>Alunos</h2>';
        case 'servidores':
            return '<h2>Servidores</h2>';
        case 'chamados':
            return '<h2>Chamados</h2>';
        case 'processos':
            return '<h2>Processos</h2>';
        default:
            return '<p>Página não encontrada.</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exemplo de View com Seletor</title>
    <style>
        .menu { margin: 10px 0; }
        .menu button { margin-right: 5px; padding: 10px; }
        .content { margin-top: 20px; padding: 20px; }
    </style>
</head>
<body>
    <h1>Gestão de Visualizações em PHP</h1>
    <div class="menu">
        <button onclick="loadPage('alunos')">Alunos</button>
        <button onclick="loadPage('servidores')">Servidores</button>
        <button onclick="loadPage('chamados')">Chamados</button>
        <button onclick="loadPage('processos')">Processos</button>
    </div>
    <div class="content" id="content">
        <?php
        // carrega a pagina pela primeira vez
        echo getPageContent($page);
        ?>
    </div>

      
    <script>
    function loadPage(page) {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', '?page=' + page, true);
    xhr.onload = function() {
        if (xhr.status === 200) {
            document.getElementById('content').innerHTML = xhr.responseText;
        } else {
            document.getElementById('content').innerHTML = '<p>Erro ao carregar</p>';
        }
    };
    xhr.send();}
    </script>
</body>
</html>


<?php endif; ?>