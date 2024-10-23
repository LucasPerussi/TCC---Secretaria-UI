<?php
session_start();

use API\Controller\Config;
use const Siler\Config\CONFIG;


// Conexão com o banco de dados
$conn = new mysqli("localhost", "root", "", "wwweta_files");

// Verifica se o envio do arquivo foi feito com sucesso
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

  // Move o arquivo temporário para um diretório permanente
  $caminho_arquivo = 'C:\xampp\htdocs\Support\src\files/' . $nome_arquivo;
  move_uploaded_file($_FILES['arquivo']['tmp_name'], $caminho_arquivo);

 
  $sql = "INSERT INTO files
  (fil_nomeArquivo, fil_size,	fil_owner, fil_type, fil_file, fil_description,fil_extension,fil_reference) VALUES
  ('$nome_arquivo', '$tamanho_arquivo','$user', '$type', '$caminho_arquivo', '$descricao', '$tipo_arquivo', '$reference');";

  if (mysqli_query($conn, $sql)) {
    header('Location: http://localhost/Support/file-upload');
    // header('Location: https://wetalkit.com.br/suporte/file-upload');

    //   $this->newLog($_SESSION["user_id"], "Um novo arquivo foi registrado no sistema. SQL: $sql", "uploadingFile", "OK");
      return "sucesso!";
  } else {
      $error_msg =  mysqli_error($conn);
    //   $this->newLog($_SESSION["user_id"], $sql, "uploadingFile", $error_msg);
      $error = true;
      return $error_msg;
  }
}

// Fecha a conexão com o banco de dados
$conexao->close();
?>