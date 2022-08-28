<?php
namespace Models;

use PDO;

class BookType extends Model
{
    public function __construct() {
        parent::__construct();
    }

    public function all() {
        $types = $this->connection->query("select * from book_types");
        return $types->fetchAll(PDO::FETCH_ASSOC);
    }
}