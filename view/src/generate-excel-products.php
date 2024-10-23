<?php 

use API\Controller\Config;
use const Siler\Config\CONFIG;


$conn = mysqli_connect(Config::SERVERNAME, Config::USERNAME , Config::DB_PASSWORD , Config::DB_NAME);

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Produtos</title>
	<head>
	<body>
		<?php
        $hoje = date('d/m/Y'); 
		// Definimos o nome do arquivo que será exportado
		$arquivo = 'Suporte Wetalk - Lista Produtos de ' . $hoje .'.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="0">';
		$html .= '<tr>';
		$html .= '<td style="background: #1f8cd4;color:white;font-size:150%;" colspan="4">Lista de Produtos</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>ID</b></td>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Nome</b></td>';
        $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Fornecedor</b></td>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Foto</b></td>';
		$html .= '</tr>';
		
		//Selecionar todos os itens da tabela 
        
        $sql = "SELECT pro_name, pro_picture, pro_supplier, pro_id  FROM " . Config::TABLE_PRODUCT . ";";		
        $result = mysqli_query($conn , $sql);
		
		while($row_msg_contatos = mysqli_fetch_assoc($result)){
			
			$html .= '<tr>';
			$html .= '<td style="background: #005f9e;color:white;font-size:120%;">'.$row_msg_contatos["pro_id"].'</td>';
			$html .= '<td >'.$row_msg_contatos["pro_name"].'</td>';
            $html .= '<td>'.$row_msg_contatos["pro_supplier"].'</td>';
			$html .= '<td>'.$row_msg_contatos["pro_picture"].'</td>';
		
			$html .= '</tr>';
			;
		
		}
		// Configurações header para forçar o download
		header ("Expires: Mon, 26 Jul 2025 05:00:00 GMT");
		header ("Last-Modified: " . gmdate("D,d M YH:i:s") . " GMT");
		header ("Cache-Control: no-cache, must-revalidate");
		header ("Pragma: no-cache");
		header ("Content-type: application/x-msexcel");
		header ("Content-Disposition: attachment; filename=\"{$arquivo}\"" );
		header ("Content-Description: PHP Generated Data" );
		// Envia o conteúdo do arquivo
		echo $html;
		exit; ?>
	</body>

</html>