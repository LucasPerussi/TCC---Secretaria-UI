<?php 

use API\Controller\Config;
use const Siler\Config\CONFIG;


$conn = mysqli_connect(Config::SERVERNAME, Config::USERNAME , Config::DB_PASSWORD , Config::DB_NAME);
$connUser = mysqli_connect(Config::SERVERNAME, Config::USERNAME , Config::DB_PASSWORD , Config::DB_NAME);

?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>LOG de Atividades</title>
	<head>
	<body>
		<?php
        $hoje = date('d/m/Y'); 
		// Definimos o nome do arquivo que será exportado
		$arquivo = 'Suporte Wetalk - Lista Atividades de ' . $hoje .'.xls';
        if ($_SESSION["company_id"] == 9999) {
            $colunas = 10;
        } else {
            $colunas = 7;
        }

		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="0">';
		$html .= '<tr>';
		$html .= '<td style="background: #1f8cd4;color:white;font-size:150%;" colspan=" '. $colunas . '">Log de Atividades</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
        if ($_SESSION["company_id"] == 9999){
            $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>ID</b></td>';
            $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Timeline Type</b></td>';
            $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Company</b></td>';
		}
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Nome</b></td>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Email</b></td>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Função</b></td>';
        $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Atividade</b></td>';
        $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Descrição</b></td>';
        $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Criado em</b></td>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Chamado Referência</b></td>';
		$html .= '</tr>';
		
		//Selecionar todos os itens da tabela 
        if ($_SESSION["company_id"] == 9999){
            $sql = "SELECT tln_user, tln_ticketReference, tln_title, tln_description, tln_type, tln_id, tln_date, tln_company  FROM " . Config::TABLE_TIMELINE . ";";
            $result = mysqli_query($conn , $sql);
		}else {
			$filterCompany = $_SESSION["company_id"];
            $sql = "SELECT tln_user, tln_ticketReference, tln_title, tln_description, tln_type, tln_id, tln_date, tln_company  FROM " . Config::TABLE_TIMELINE . " WHERE tln_company = '$filterCompany';";
			$result = mysqli_query($conn , $sql);
		}

       
		
		while($row_msg_contatos = mysqli_fetch_assoc($result)){
          
            $user = $row_msg_contatos["tln_user"];
            // if ($row_msg_contatos["tln_type"] == 1){ $color = "#7B68EE";} elseif ($row_msg_contatos["tln_type"] == 2){ $color = "#4169E1";}elseif ($row_msg_contatos["tln_type"] == 3){ $color = "#3CB371";}elseif ($row_msg_contatos["tln_type"] == 4){ $color = "#FF6347";}elseif ($row_msg_contatos["tln_type"] == 5){ $color = "#D2B48C";}elseif ($row_msg_contatos["tln_type"] == 6){ $color = "#B22222";}else{$color = "#C71585";}
           
            
			
			$html .= '<tr font-size:120%;>';
            if ($_SESSION["company_id"] == 9999){
                $html .= '<td >'.$row_msg_contatos["tln_id"].'</td>';
                $html .= '<td>'.$row_msg_contatos["tln_type"].'</td>';
                $html .= '<td>'.$row_msg_contatos["tln_company"].'</td>';
            }
            
            $sqlUser = "SELECT usr_id, usr_name, usr_password, usr_email, usr_last_name, usr_role, usr_born_date, usr_created_at, usr_changed_at, usr_picture, usr_company  FROM " . Config::TABLE_USERS . " WHERE usr_id = '$user';";
            $resultUser = mysqli_query($connUser , $sqlUser);
            
            while ($row_user = mysqli_fetch_assoc($resultUser)) {
                if ($row_user["usr_role"] == 1) {
                    $role = "Member";} else {
                        $role = "Admin";
                    }
                    $html .= '<td>'.$row_user["usr_name"]. ' ' .$row_user["usr_last_name"]. '</td>';
                    $html .= '<td>'. $row_user["usr_email"]. '</td>';
                    $html .= '<td>'. $role. '</td>';
                    
                }
                $html .= '<td>'.$row_msg_contatos["tln_title"].'</td>';
                $html .= '<td>'.$row_msg_contatos["tln_description"].'</td>';
                $html .= '<td>'.$row_msg_contatos["tln_date"].'</td>';
                
                if($row_msg_contatos["tln_ticketReference"] == 11111111){
                $ref = "N/A";
                }else {
                $ref = $row_msg_contatos["tln_ticketReference"];
                }

            $html .= '<td>'.$ref.'</td>';
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