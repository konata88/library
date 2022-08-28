<?php
namespace Models;

use PDO;

class Author extends Model
{
    public function __construct() {
        parent::__construct();
    }

    public function all() {
        $authors = $this->connection->query("select * from authors");
        return $authors->fetchAll(PDO::FETCH_ASSOC);
    }
}