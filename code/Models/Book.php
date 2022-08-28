<?php
namespace Models;

use PDO;

class Book extends Model
{
    public function __construct() {
        parent::__construct();
    }

    public function all() {
        $books = $this->connection->query("
        select books.id, books.name, authors.name as author, book_types.name as book_type, description, publish_year, image
        from books
        join authors on books.author_id = authors.id
        join book_types on books.type_id = book_types.id
        ");
        return $books->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $statement = $this->connection->prepare("insert into books(author_id, name, description, publish_year, image, type_id) values(?,?,?,?,?,?)");
        $statement->execute([$data->author_id, $data->name, $data->description, $data->year, $data->image, $data->type_id]);
    }

    public function delete($id) {
        $statement = $this->connection->prepare("delete from books where id=?");
        $statement->execute([$id]);
    }

    public function get($id)
    {
        $statement = $this->connection->prepare("select * from books where id=?");
        $statement->execute([$id]);
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function update($data)
    {
        $statement = $this->connection->prepare("update books set author_id = ?, name= ?,
                 description=?, publish_year=?, image=?, type_id=? where id=?");
        $statement->execute([
            $data->author_id, $data->name, $data->description, $data->year, $data->image, $data->type_id, $data->id
        ]);
    }

    public function search($text) {
        $books = $this->connection->prepare("
        select books.id, books.name, authors.name as author, book_types.name as book_type, description, publish_year, image
        from books
        join authors on books.author_id = authors.id
        join book_types on books.type_id = book_types.id where books.name like ? or description like ? or authors.name like ?
        ");
        $books->execute(['%'.$text.'%', '%'.$text.'%', '%'.$text.'%']);
        return $books->fetchAll(PDO::FETCH_ASSOC);
    }
}