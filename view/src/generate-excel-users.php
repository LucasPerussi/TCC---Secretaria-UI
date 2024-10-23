<?php 

use API\Controller\Config;
use const Siler\Config\CONFIG;


$conn = mysqli_connect(Config::SERVERNAME, Config::USERNAME , Config::DB_PASSWORD , Config::DB_NAME);

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Usuários</title>
	<head>
	<body>
		<?php
        $hoje = date('d/m/Y'); 
		// Definimos o nome do arquivo que será exportado
		$arquivo = 'Suporte Wetalk - Lista Usuarios de ' . $hoje .'.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="0">';
		$html .= '<tr>';
		$html .= '<td style="background: #1f8cd4;color:white;font-size:150%;" colspan="9">Lista de Usuários</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>ID</b></td>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Nome</b></td>';
        $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Sobrenome</b></td>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Email</b></td>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Função</b></td>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Aniversário 2</b></td>';
        $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Foto</b></td>';
        $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Empresa</b></td>';
		
        $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Criado em</b></td>';
		$html .= '</tr>';
		
		//Selecionar todos os itens da tabela 
        if ($_SESSION["company_id"] == 9999){
			$sql = "SELECT usr_id, usr_name, usr_password, usr_email, usr_last_name, usr_role, usr_born_date, usr_created_at, usr_changed_at, usr_picture, usr_company  FROM " . Config::TABLE_USERS . ";";
				$result = mysqli_query($conn , $sql);
		}else {
			$filterCompany = $_SESSION["company_id"];
			$sql = "SELECT usr_id, usr_name, usr_password, usr_email, usr_last_name, usr_role, usr_born_date, usr_created_at, usr_changed_at, usr_picture, usr_company  FROM " . Config::TABLE_USERS . " WHERE usr_company = '$filterCompany';";
			$result = mysqli_query($conn , $sql);
		}

       
		
		while($row_msg_contatos = mysqli_fetch_assoc($result)){
			
			$html .= '<tr>';
			$html .= '<td style="background: #005f9e;color:white;font-size:120%;">'.$row_msg_contatos["usr_id"].'</td>';
			$html .= '<td >'.$row_msg_contatos["usr_name"].'</td>';
            $html .= '<td>'.$row_msg_contatos["usr_last_name"].'</td>';
			$html .= '<td>'.$row_msg_contatos["usr_email"].'</td>';
            $html .= '<td>'.$row_msg_contatos["usr_role"].'</td>';
            $html .= '<td>'.$row_msg_contatos["usr_born_date"].'</td>';
			$html .= '<td>'.$row_msg_contatos["usr_picture"].'</td>';
			$html .= '<td>'.$row_msg_contatos["usr_company"].'</td>';
			$html .= '<td>'.$row_msg_contatos["usr_created_at"].'</td>';
		
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