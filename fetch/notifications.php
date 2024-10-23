<?php

namespace API\Fetch;

use API\Controller\Config;
use API\Fetch\DateTime;
use DateTime as GlobalDateTime;
use DateTimeZone;
use Throwable;


function listUserNotifications()
{
    $conn = connect_logs_db();
    if (isset($_SESSION["user_id"])){
        $user = $_SESSION["user_id"];
        $cont = 0;
        $sql = "SELECT not_title, not_company, not_type, not_user, not_url, not_status, not_viewed, not_id, not_date FROM " . Config::TABLE_NOTIFICATIONS . " WHERE not_user = $user ORDER BY not_id DESC";
        $result = mysqli_query($conn, $sql);
        if ($result) {
            if ($result->num_rows > 0) {
                // cria um array para armazenar os resultados
                $items = array();
                // adiciona cada resultado ao array
                while ($row = $result->fetch_assoc()) {
                    // alertas para todos da empresa / alertas vindas do master
                    // if ($row["not_user"] == $_SESSION["user_id"]){
                    $cont++;
                    $item = array(
                        "id" => $row["not_id"],
                        "title" => $row["not_title"],
                        "company" => $row["not_company"],
                        "type" => $row["not_type"],
                        "user" => $row["not_user"],
                        "url" => $row["not_url"],
                        "status" => $row["not_status"],
                        "viewed" => $row["not_viewed"],
                        "date" => $row["not_date"]
                    );
                    array_push($items, $item);
                    // }
                }
                return $items;
            }
        } else {
            $error_msg = mysqli_error($conn);
            $error = true;
            return $error_msg;
        }    
    }else{
        return null;
    }
    
}
