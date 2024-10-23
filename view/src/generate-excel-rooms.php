<?php 

use API\Controller\Config;
use const Siler\Config\CONFIG;


$conn = mysqli_connect(Config::SERVERNAME, Config::USERNAME , Config::DB_PASSWORD , Config::DB_NAME);

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Salas</title>
	<head>
	<body>
		<?php
        $hoje = date('d/m/Y'); 
		// Definimos o nome do arquivo que será exportado
		$arquivo = 'Suporte Wetalk - lista salas de ' . $hoje .'.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="0">';
		$html .= '<tr>';
		$html .= '<td style="background: #1f8cd4;color:white;font-size:150%;" colspan="20">Lista de Salas</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>ID</b></td>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Name</b></td>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Capacidade</b></td>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Identificador</b></td>';
        $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Foto</b></td>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Senha</b></td>';
        $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Company Id</b></td>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Company Name 1</b></td>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Company Ident.</b></td>';
		// $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Descrição</b></td>';
        $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Prod 1</b></td>';
        $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Prod 2</b></td>';
        $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Prod 3</b></td>';
        $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Prod 4</b></td>';
        $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Prod 5</b></td>';
        $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Prod 6</b></td>';
        $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Prod 7</b></td>';
        $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Prod 8</b></td>';
        $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Prod 9</b></td>';
        $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Prod 10</b></td>';
        $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Acessos</b></td>';
		$html .= '</tr>';
		
		//Selecionar todos os itens da tabela 
        
		if ($_SESSION["company_id"] == 9999){
			
			$sql = "SELECT rom_id, rom_name, rom_capacity, rom_picture, rom_password, rom_companyName, rom_passwordCrypted, rom_company, rom_companyIdentifier, rom_description, rom_identifier, rom_eq1, rom_eq2, rom_eq3, rom_eq4, rom_eq5, rom_eq6, rom_eq7, rom_eq8, rom_eq9, rom_eq10, rom_access FROM " . Config::TABLE_ROOM . ";";
			$result = mysqli_query($conn , $sql);
			
		}else {
			$filterCompany = $_SESSION["company_id"];
		
			$sql = "SELECT rom_id, rom_name, rom_capacity, rom_picture, rom_password, rom_companyName, rom_passwordCrypted, rom_company, rom_companyIdentifier, rom_description, rom_identifier, rom_eq1, rom_eq2, rom_eq3, rom_eq4, rom_eq5, rom_eq6, rom_eq7, rom_eq8, rom_eq9, rom_eq10, rom_access FROM " . Config::TABLE_ROOM . " WHERE rom_company = '$filterCompany';";
			$result = mysqli_query($conn , $sql);
			
		}


		while($row_msg_contatos = mysqli_fetch_assoc($result)){
			
			$html .= '<tr>';
			$html .= '<td style="background: #005f9e;color:white;font-size:120%;">'.$row_msg_contatos["rom_id"].'</td>';
			$html .= '<td >'.$row_msg_contatos["rom_name"].'</td>';
			$html .= '<td >'.$row_msg_contatos["rom_capacity"].'</td>';
            $html .= '<td>'.$row_msg_contatos["rom_identifier"].'</td>';
			$html .= '<td>'.$row_msg_contatos["rom_picture"].'</td>';
            $html .= '<td>'.$row_msg_contatos["rom_password"].'</td>';
            $html .= '<td>'.$row_msg_contatos["rom_company"].'</td>';
			$html .= '<td>'.$row_msg_contatos["rom_companyName"].'</td>';
			$html .= '<td>'.$row_msg_contatos["rom_companyIdentifier"].'</td>';
			// $html .= '<td>'.$row_msg_contatos["rom_description"].'</td>';
			$html .= '<td>'.$row_msg_contatos["rom_eq1"].'</td>';
			$html .= '<td>'.$row_msg_contatos["rom_eq2"].'</td>';
			$html .= '<td>'.$row_msg_contatos["rom_eq3"].'</td>';
			$html .= '<td>'.$row_msg_contatos["rom_eq4"].'</td>';
			$html .= '<td>'.$row_msg_contatos["rom_eq5"].'</td>';
			$html .= '<td>'.$row_msg_contatos["rom_eq6"].'</td>';
			$html .= '<td>'.$row_msg_contatos["rom_eq7"].'</td>';
			$html .= '<td>'.$row_msg_contatos["rom_eq8"].'</td>';
			$html .= '<td>'.$row_msg_contatos["rom_eq9"].'</td>';
			$html .= '<td>'.$row_msg_contatos["rom_eq10"].'</td>';
			$html .= '<td>'.$row_msg_contatos["rom_access"].'</td>';
		
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