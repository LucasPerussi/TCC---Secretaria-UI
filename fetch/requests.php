<?php

namespace API\Fetch;

use API\Controller\Config;
use API\Fetch\DateTime;
use API\Model\Logger;
use DateTime as GlobalDateTime;
use DateTimeZone;
use Throwable;


// LISTA TODAS AS SALAS 
function listRequestCodes()
{
    $conn = connect_db();
    $sql = "SELECT *  FROM " . Config::TABLE_REQUESTS . ";";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        return $result;
    } else {
        $error_msg = mysqli_error($conn);
        $error = true;
        return $error_msg;
    }
}

function listRequestCodesAray(): array
{

   $conn = connect_db();
   $sql = "SELECT *  FROM " . Config::TABLE_REQUESTS . ";";
   $result = mysqli_query($conn, $sql);
   if ($result) {
      if ($result->num_rows > 0) {
         $items = array();

         while ($row = $result->fetch_assoc()) {
            $data = array(
               "id" => (int) $row["req_id"],
               "name" => $row["req_name"],
               "code" => $row["req_code"],
               "email" => $row["req_email"],
               "user" => $row["req_user"],
               "status" => $row["req_status"],
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

function listRequestCodesArrayDesc(): array
{

   $conn = connect_db();
   $sql = "SELECT *  FROM " . Config::TABLE_REQUESTS . " ORDER BY req_id DESC;";
   $result = mysqli_query($conn, $sql);
   if ($result) {
      if ($result->num_rows > 0) {
         $items = array();

         while ($row = $result->fetch_assoc()) {
            $data = array(
               "id" => (int) $row["req_id"],
               "name" => $row["req_name"],
               "code" => $row["req_code"],
               "email" => $row["req_email"],
               "user" => $row["req_user"],
               "status" => $row["req_status"],
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