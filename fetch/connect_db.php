<?php

namespace API\Fetch;

use API\Controller\Config;


function connect_db()
{

   $connection = mysqli_connect(Config::SERVERNAME, Config::USERNAME, Config::DB_PASSWORD, Config::DB_NAME);

   if (!$connection) {
      return ("Connection failed: " . mysqli_connect_error());
   }

   $connection->set_charset("utf8mb4");
   return $connection;
}

function connect_file_db()
{

   $connection = mysqli_connect(Config::SERVERNAME, Config::USERNAME, Config::DB_PASSWORD, Config::FILE_DB_NAME);

   if (!$connection) {
      return ("Connection failed: " . mysqli_connect_error());
   }

   $connection->set_charset("utf8mb4");
   return $connection;
}

function connect_logs_db()
{

   $connection = mysqli_connect(Config::SERVERNAME, Config::USERNAME, Config::DB_PASSWORD, Config::LOGS_DB_NAME);

   if (!$connection) {
      return ("Connection failed: " . mysqli_connect_error());
   }

   $connection->set_charset("utf8mb4");
   return $connection;
}

// function connect_centralizer_db()
// {

//    $connection = mysqli_connect(Config::SERVERNAME, Config::USERNAME, Config::DB_PASSWORD, Config::CENTRALIZER_DB_NAME);

//    if (!$connection) {
//       return ("Connection failed: " . mysqli_connect_error());
//    }

//    $connection->set_charset("utf8mb4");
//    return $connection;
// }