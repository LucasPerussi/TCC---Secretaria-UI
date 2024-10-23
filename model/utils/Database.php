<?php

namespace API\Model;

use API\Controller\Config;

class Database
{
    private static $connection;

    public static function connect()
    {
        if (!self::$connection) {
            $host = Config::SERVERNAME;
            $username = Config::USERNAME;
            $password = Config::DB_PASSWORD;
            $dbname = Config::DB_NAME;

            self::$connection = mysqli_connect($host, $username, $password, $dbname);

            if (mysqli_connect_errno()) {
                die("Failed to connect to MySQL: " . mysqli_connect_error());
            }
            self::$connection->set_charset("utf8mb4");

            // mysqli_set_charset(self::$connection, "utf8mb4");
        }

        return self::$connection;
    }
    public static function connectPDO()
    {
        if (!self::$connection) {
            $host = Config::SERVERNAME;
            $username = Config::USERNAME;
            $password = Config::DB_PASSWORD;
            $dbname = Config::DB_NAME;
            $charset = 'utf8mb4';
    
            $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";
    
            try {
                self::$connection = new \PDO($dsn, $username, $password);
                self::$connection->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
                self::$connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
            } catch (\PDOException $e) {
                $userId = $_SESSION["user_id"] ?? 9999;
                Logger::log($userId, "Error connecting DB. Error: " . $e->getMessage(), "connectPDO", "ERROR");
                throw $e; // Re-throw the exception to handle it outside
            }
        }
    
        return self::$connection;
    }


        public static function connectMySQLi(): ?\mysqli
      {
        if (self::$connection === null) {
          $host = Config::SERVERNAME;
          $username = Config::USERNAME;
          $password = Config::DB_PASSWORD;
          $dbname = Config::DB_NAME;
    
          self::$connection = new \mysqli($host, $username, $password, $dbname);
    
          if (self::$connection->connect_error) {
            Logger::log(9999, "Connection failed: " . self::$connection->connect_error, "connectMySQLi", "ERROR");
            self::$connection = null;
            return null;
          }
        }
    
        return self::$connection;
    }
    
}
