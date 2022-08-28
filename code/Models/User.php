<?php
namespace Models;

use PDO;

class User extends Model
{
    public function __construct() {
        parent::__construct();
    }

    public function all() {
        $authors = $this->connection->query("select * from users");
        return $authors->fetchAll(PDO::FETCH_ASSOC);
    }
}