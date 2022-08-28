<?php
namespace Models;

use Config\Config;
use PDO;

class Model
{
    public $connection;

    public function __construct() {
        //connect to db
        $dsn = "mysql:host=".Config::$DB_SERVER.";dbname=".Config::$DB_NAME;
        $this->connection = new PDO($dsn, Config::$DB_USERNAME, Config::$DB_PASSWORD);
    }
}