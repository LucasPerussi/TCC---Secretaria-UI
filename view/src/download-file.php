<?php


use API\Controller\Config;
use const Siler\Config\CONFIG;

// Conectar ao banco de dados

$hostname = Config::SERVERNAME;
$username = Config::USERNAME;
$password = Config::DB_PASSWORD;
$database = Config::FILE_DB_NAME;

$mysqli = new mysqli($hostname, $username, $password, $database);
if ($mysqli->connect_error) {
    die('Falha ao conectar ao banco de dados: ' . $mysqli->connect_error);
}

// Obter o ID do arquivo
$id = $fileId;

// Preparar e executar a consulta SQL para obter o arquivo
$sql = "SELECT fil_file, fil_nomeArquivo FROM files WHERE fil_id = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->store_result();

// Verificar se o arquivo existe
if ($stmt->num_rows > 0) {
    $stmt->bind_result($arquivo, $nome_arquivo);
    $stmt->fetch();
   

    $caminho_arquivo = $arquivo;

    // Verificar se o caminho do arquivo é válido
    if (isset($caminho_arquivo) && !empty($caminho_arquivo)) {
        // Verificar se o arquivo existe no servidor
        if (file_exists($caminho_arquivo)) {
            // Obter o nome do arquivo a partir do caminho
            $nome_arquivo = basename($caminho_arquivo);
            
            // Definir os cabeçalhos para forçar o download
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="' . $nome_arquivo . '"');
            header('Content-Length: ' . filesize($caminho_arquivo));
    
            // Enviar o arquivo para o cliente
            readfile($caminho_arquivo);
            exit;
        } else {
            echo 'Arquivo não encontrado.';
            echo "nome: $nome_arquivo";
            echo "arquivo: $arquivo";
        
        }
    } else {
        echo 'Caminho do arquivo inválido.';
    }


















    // Definir os cabeçalhos para forçar o download
    // header('Content-Type: application/octet-stream');
    // header('Content-Disposition: attachment; filename="' . $nome_arquivo . '"');
    // header('Content-Length: ' . strlen($arquivo));

    // Enviar o arquivo para o cliente
    echo $arquivo;
} else {
    echo 'Arquivo não encontrado.';
    echo "nome: $nome_arquivo";
    echo "arquivo: $arquivo";

}

// Fechar a conexão e liberar recursos
$stmt->close();
$mysqli->close();
?>
