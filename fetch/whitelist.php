<?php

namespace API\Fetch;

use API\Controller\Config;


// ALL WHITELISTS USER DA SESSAO
function listWhitelistSession(): array
{
   $conn = connect_db();
   $user = $_SESSION["user_id"];

   $sql = "SELECT * FROM " . Config::TABLE_WHITELIST . " WHERE wls_user = '$user';";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      if ($result->num_rows > 0) {
         // cria um array para armazenar os resultados
         $items = array();

         while ($row = $result->fetch_assoc()) {
            $data = array(
               "id" => (int) $row["wls_id"],
               "user" => $row["wls_user"],
               "ip" => $row["wls_ip"],
               "approved" => $row["wls_approved"],
               "created_at" => $row["wls_created_at"],
               "city" => $row["wls_city"],
               "state" => $row["wls_state"],
               "country" => $row["wls_country"],
               "latlon" => $row["wls_latlon"],
               "device" => $row["wls_device"],
               "os" => $row["wls_os"],
               "browser" => $row["wls_browser"],
            );
            array_push($items, $data);
         }
        
         return $items;
      } else {
         $error_msg = mysqli_error($conn);
         $error = true;
         return $error_msg;
      }
   }
}

function getSessionKeyByUser($user): array
{
   $conn = connect_db();

   $sql = "SELECT * FROM " . Config::TABLE_SESSIONS . " WHERE ses_user = '$user';";

   $result = mysqli_query($conn, $sql);

   if ($result) {
      if ($result->num_rows > 0) {
         while ($row = $result->fetch_assoc()) {
            return array(
               "id" => (int) $row["ses_id"],
               "user" => $row["ses_user"],
               "ip" => $row["ses_ip"],
               "company" => $row["ses_company"],
               "created_at" => $row["ses_created_at"],
               "city" => $row["ses_city"],
               "state" => $row["ses_state"],
               "country" => $row["ses_country"],
               "key" => $row["ses_key"],
            );
         }
      } else {
         $error_msg = mysqli_error($conn);
         return array(
            "error" => true,
            "message" => $error_msg,
         );
      }
   }
}
