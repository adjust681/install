<?php
namespace install\sql;
include_once __DIR__. '/../config/Config.php';

use install\config\Config;
use PDO;
use PDOException;

class CreateDB
{
    public function create_db()
    {
        try {
            $conn = new PDO("mysql:host=" . Config::MYSQL_HOST, Config::MYSQL_USER, Config::MYSQL_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "CREATE DATABASE IF NOT EXISTS " . Config::MYSQL_DB_NAME . " CHARACTER SET " . Config::MYSQL_CHARSET . " COLLATE " . Config::MYSQL_COLLATE . ";";
            $conn->query($sql);
            $conn = null;
            return 0;
        } catch (PDOException $ex) {
            $conn = null;
            return $ex->getMessage();
        }
    }

    public function create_table()
    {
        try {
            $conn = new PDO(Config::MYSQL_DSN, Config::MYSQL_USER, Config::MYSQL_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "USE " . Config::MYSQL_DB_NAME . ";
            CREATE TABLE " . Config::MYSQL_TABLE_NAME . "
            (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                date INT(16) UNSIGNED DEFAULT 0,
                content VARCHAR(20) NOT NULL
            ) DEFAULT CHARSET=" . Config::MYSQL_CHARSET . " COLLATE=" . Config::MYSQL_COLLATE . ";";
            $conn->query($sql);
            $conn = null;
            return 0;
        } catch (PDOException $ex) {
            $conn = null;
            return $ex->getMessage();
        }
    }

    public function does_db_exist()
    {
        try {
            $conn = new PDO(Config::MYSQL_DSN, Config::MYSQL_USER, Config::MYSQL_PASSWORD);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return 1;
        } catch (PDOException $e) {
            return 0;
        }
    }
}