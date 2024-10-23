<?php 

use API\Controller\Config;
use const Siler\Config\CONFIG;


$conn = mysqli_connect(Config::SERVERNAME, Config::USERNAME , Config::DB_PASSWORD , Config::DB_NAME);

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Requests</title>
	<head>
	<body>
		<?php
        $hoje = date('d/m/Y'); 
		// Definimos o nome do arquivo que será exportado
		$arquivo = 'Suporte Wetalk - Lista requests de ' . $hoje .'.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="0">';
		$html .= '<tr>';
		$html .= '<td style="background: #1f8cd4;color:white;font-size:150%;" colspan="8">Lista de requests</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>ID</b></td>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Autor</b></td>';
        $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Título</b></td>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Email</b></td>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Descrição</b></td>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Aberto em  2</b></td>';
        $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Status</b></td>';
		$html .= '</tr>';
		
		//Selecionar todos os itens da tabela 
        
        $sql = "SELECT tkt_id, tkt_author, tkt_title, tkt_email, tkt_description, tkt_created_at, tkt_status  FROM " . Config::TABLE_TICKETS . " ORDER BY  tkt_status ASC;";
		$result = mysqli_query($conn , $sql);
		
		while($row_msg_contatos = mysqli_fetch_assoc($result)){
			
			$html .= '<tr>';
			$html .= '<td style="background: #005f9e;color:white;font-size:120%;">'.$row_msg_contatos["tkt_id"].'</td>';
			$html .= '<td >'.$row_msg_contatos["tkt_author"].'</td>';
            $html .= '<td>'.$row_msg_contatos["tkt_title"].'</td>';
			$html .= '<td>'.$row_msg_contatos["tkt_email"].'</td>';
            $html .= '<td>'.$row_msg_contatos["tkt_description"].'</td>';
            $html .= '<td>'.$row_msg_contatos["tkt_created_at"].'</td>';
			$html .= '<td>'.$row_msg_contatos["tkt_status"].'</td>';
			
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