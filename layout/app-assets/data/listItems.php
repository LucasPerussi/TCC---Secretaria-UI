<?php
use API\Controller\Config;

class listItems {
  private function gerarJson() {

    // "name": "Analytics Dashboard", "url": "dashboard-analytics.html", "icon": "home" },
    
    $conn = mysqli_connect(Config::SERVERNAME, Config::USERNAME, Config::DB_PASSWORD, Config::DB_NAME);
    
    if (!$conn) {
        die("Falha na conexão: " . mysqli_connect_error());
    }
    
    $sql = "SELECT usr_id, usr_name, usr_password, usr_last_name, usr_picture, usr_user FROM " . Config::TABLE_USERS .";";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Erro na consulta: " . mysqli_error($conn));
    }

    $rows = array();
    
    $row = [ 'listItems' => array(),];

    while ($row = mysqli_fetch_assoc($result)) {
      $rows['listItems'][] = array("name" => $row["usr_name"] . " " . $row["usr_last_name"] , "url" => "profile?username=" . $row["usr_user"], "icon" => "users");

    }

    try {
      $json = json_encode($rows);
      file_put_contents('search.json', $json);
      mysqli_close($conn);  
      return "Dados carregados com sucesso!";  
    } 
    catch (\Throwable $th) {
      mysqli_close($conn);  
      return "erro: " . $th;
    }
  }
}

?>