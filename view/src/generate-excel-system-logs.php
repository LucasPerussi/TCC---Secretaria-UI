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
		<title>MASTER REPORT DE LOGS DO SISTEMA</title>
	<head>
	<body>
		<?php
        $hoje = date('d/m/Y'); 
		// Definimos o nome do arquivo que será exportado
		$arquivo = 'Suporte Wetalk - Logs do Sistema - MASTER REPORT de ' . $hoje .'.xls';
       
            $colunas = 9;
        

		
		// Criamos uma tabela HTML com o formato da planilha
		$html = '';
		$html .= '<table border="0">';
		$html .= '<tr>';
		$html .= '<td style="background: #1f8cd4;color:white;font-size:150%;" colspan=" '. $colunas . '">Logs do Sistema - MASTER REPORT</tr>';
		$html .= '</tr>';
		
		
		$html .= '<tr>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>ID</b></td>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>User ID</b></td>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>User Name</b></td>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>User Email</b></td>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>User Username</b></td>';
		$html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Operation</b></td>';
        $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Function</b></td>';
        $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Status</b></td>';
        $html .= '<td style="background: #7634ff;color:white;font-size:120%;"><b>Data</b></td>';
		$html .= '</tr>';
		

        $sql = "SELECT log_id, log_user, log_date, log_operation, log_function, log_status  FROM " . Config::TABLE_LOGS . " ORDER BY log_date DESC ;";
  
        // executa a query SQL
        $result = $conn->query($sql);
  

       
		
		while($row_msg_contatos = mysqli_fetch_assoc($result)){
          
            $user = $row_msg_contatos["log_user"];           
            
			$html .= '<tr font-size:120%;>';
            $html .= '<td>'.$row_msg_contatos["log_id"].'</td>';
            $html .= '<td>'.$row_msg_contatos["log_user"].'</td>';
           

            $sqlUser = "SELECT usr_id, usr_name, usr_password, usr_email, usr_last_name, usr_role, usr_born_date, usr_created_at, usr_changed_at, usr_user, usr_picture, usr_company  FROM " . Config::TABLE_USERS . " WHERE usr_id = '$user';";
            $resultUser = mysqli_query($connUser , $sqlUser);
            
            while ($row_user = mysqli_fetch_assoc($resultUser)) {
                if ($row_user["usr_role"] == 1) {
                    $role = "Member";} else {
                        $role = "Admin";
                    }
                    $html .= '<td>'.$row_user["usr_name"]. ' ' .$row_user["usr_last_name"]. '</td>';
                    $html .= '<td>'. $row_user["usr_email"]. '</td>';
                    $html .= '<td>'. $row_user["usr_user"]. '</td>';                    
                }
                $html .= '<td>'.$row_msg_contatos["log_operation"].'</td>';
                $html .= '<td>'.$row_msg_contatos["log_function"].'</td>';
                $html .= '<td>'.$row_msg_contatos["log_status"].'</td>';
                $html .= '<td>'.$row_msg_contatos["log_date"].'</td>';

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