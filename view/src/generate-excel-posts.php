<?php 

use API\Controller\Config;
use const Siler\Config\CONFIG;


$conn = mysqli_connect(Config::SERVERNAME, Config::USERNAME , Config::DB_PASSWORD , Config::DB_NAME);

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Postagens</title>
	<head>
	<body>
		<?php
        $hoje = date('d/m/Y'); 
		// Definimos o nome do arquivo que será exportado
		$arquivo = 'Suporte Wetalk - lista Postagens de ' . $hoje .'.xls';
		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="0">';
		$html .= '<tr>';
		$html .= '<td style="background: #1f8cd4;color:white;font-size:150%;" colspan="15">Lista de Postagens</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>ID</b></td>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Título</b></td>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Identificador</b></td>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Acessos</b></td>';
        $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Tags</b></td>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Autor</b></td>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Tipo</b></td>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Banner</b></td>';
        $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Produto 1</b></td>';
        $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Produto 2</b></td>';
        $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Data de postagem</b></td>';
        $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Empresa</b></td>';
        $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>ident. Empresa</b></td>';
        $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Senha</b></td>';
        $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Senha Enc.</b></td>';
		$html .= '</tr>';
		
		//Selecionar todos os itens da tabela 
        if ($_SESSION["company_id"] == 9999){
			
			$sql = "SELECT cnt_title, cnt_description, cnt_tags, cnt_contentLink, cnt_type, cnt_banner, cnt_produto1, cnt_produto2, cnt_id, cnt_date, cnt_fk_author, cnt_unique, cnt_textPreview, cnt_company, cnt_companyIdentifier, cnt_password, cnt_passwordCrypted, cnt_access   FROM " . Config::TABLE_CONTENT . " ORDER BY  cnt_access DESC;";
			$result = mysqli_query($conn , $sql);

		} else {
			$filterCompany = $_SESSION["company_id"];
			$sql = "SELECT cnt_title, cnt_description, cnt_tags, cnt_contentLink, cnt_type, cnt_banner, cnt_produto1, cnt_produto2, cnt_id, cnt_date, cnt_fk_author, cnt_unique, cnt_textPreview, cnt_company, cnt_companyIdentifier, cnt_password, cnt_passwordCrypted, cnt_access   FROM " . Config::TABLE_CONTENT . " WHERE cnt_company = '$filterCompany'";
			$result = mysqli_query($conn, $sql);
		}


       
		
		while($row_msg_contatos = mysqli_fetch_assoc($result)){
			
			$html .= '<tr>';
			$html .= '<td style="background: #005f9e;color:white;font-size:120%;">'.$row_msg_contatos["cnt_id"].'</td>';
			$html .= '<td >'.$row_msg_contatos["cnt_title"].'</td>';
            $html .= '<td>'.$row_msg_contatos["cnt_unique"].'</td>';
            $html .= '<td>'.$row_msg_contatos["cnt_access"].'</td>';
			$html .= '<td>'.$row_msg_contatos["cnt_tags"].'</td>';
            $html .= '<td>'.$row_msg_contatos["cnt_fk_author"].'</td>';
            $html .= '<td>'.$row_msg_contatos["cnt_type"].'</td>';
			$html .= '<td>'.$row_msg_contatos["cnt_banner"].'</td>';
			$html .= '<td>'.$row_msg_contatos["cnt_produto1"].'</td>';
			$html .= '<td>'.$row_msg_contatos["cnt_produto2"].'</td>';
			$html .= '<td>'.$row_msg_contatos["cnt_date"].'</td>';
			$html .= '<td>'.$row_msg_contatos["cnt_company"].'</td>';
			$html .= '<td>'.$row_msg_contatos["cnt_companyIdentifier"].'</td>';
			$html .= '<td>'.$row_msg_contatos["cnt_password"].'</td>';
			$html .= '<td>'.$row_msg_contatos["cnt_passwordCrypted"].'</td>';
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