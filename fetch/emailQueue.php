<?php

namespace API\Fetch;

use API\Controller\Config;
use API\Fetch\DateTime;
use DateTime as GlobalDateTime;
use DateTimeZone;
use Throwable;

function emailQueue()
{
   $conn = connect_db();

   $sql = "SELECT * FROM " . Config::TABLE_EMAIL_LINE . " ORDER BY fem_date DESC;";
   $result = mysqli_query($conn, $sql);
   if ($result) {
      if ($result->num_rows > 0) {
         // cria um array para armazenar os resultados
         $items = array();

         while ($row = $result->fetch_assoc()) {
            $data = array(
               "id" => (int) $row["fem_id"],
               "identifier" => $row["fem_identifier"],
               "receiver" => $row["fem_receiver"],
               "title" => $row["fem_title"],
               "operation" => $row["fem_operation"],
               "status" => $row["fem_status"],
               "date" => $row["fem_date"],
               "user" => $row["fem_user"],
               "sensitive" => $row["fem_sensitive"],
               "priority" => $row["fem_priority"],
               "message" => $row["fem_status_message"],
            );
            array_push($items, $data);
         }
         return $items;
      }
   } else {
      $error_msg = mysqli_error($conn);
      $error = true;
      return $error_msg;
   }
}
function viewEmail($id)
{
   $conn = connect_db();

   $sql = "SELECT * FROM " . Config::TABLE_EMAIL_LINE . " WHERE fem_identifier = '$id';";
   $result = mysqli_query($conn, $sql);
   if ($result) {
      if ($result->num_rows > 0) {
         // cria um array para armazenar os resultados
        

         while ($row = $result->fetch_assoc()) {
            $data = array(
               "id" => (int) $row["fem_id"],
               "identifier" => $row["fem_identifier"],
               "receiver" => $row["fem_receiver"],
               "title" => $row["fem_title"],
               "operation" => $row["fem_operation"],
               "status" => $row["fem_status"],
               "date" => $row["fem_date"],
               "user" => $row["fem_user"],
               "body" => $row["fem_body"],
               "sensitive" => $row["fem_sensitive"],
               "priority" => $row["fem_priority"],
               "message" => $row["fem_status_message"],
            );
         }
         return $data;
      }
   } else {
      $error_msg = mysqli_error($conn);
      $error = true;
      return $error_msg;
   }
}
