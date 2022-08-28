<?php

namespace Models;

use PDO;
class BookTaken extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function checkIntervals($bookId, $from, $to)
    {
        if ($from >= $to) {
            return false;
        }

        $taken = $this->connection->prepare("
        select count(*) as cnt from book_taken where book_id=? and
        ((from_time <= ? and to_time >= ?) or (from_time <= ? and to_time >= ?) or (from_time >= ? and to_time <= ? ) )");
        $taken->execute([$bookId, $from, $from, $to, $to, $from, $to]);
        $result = $taken->fetch(PDO::FETCH_ASSOC);
        return ($result['cnt'] == 0);
    }

    public function create($data) {
        $statement = $this->connection->prepare("insert into book_taken(book_id, user_id, from_time, to_time) values(?,?,?,?)");
        $statement->execute([$data->book_id, $data->user_id, $data->from, $data->to]);
    }

    public function getBookTaken($id)
    {
        $taken = $this->connection->prepare("select * from book_taken where book_id=?");
        $taken->execute([$id]);
        return $taken->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteBook($id) {
        $taken = $this->connection->prepare("delete from book_taken where book_id=?");
        $taken->execute([$id]);
    }

    public function all()
    {
        $books = $this->connection->query("select books.name as bookname, users.name as username,  DATE_FORMAT(from_time,'%d/%m/%Y') AS from_time, DATE_FORMAT(to_time,'%d/%m/%Y') AS to_time from book_taken
        join users on book_taken.user_id = users.id
        join books on book_taken.book_id = books.id
        ");
        return $books->fetchAll(PDO::FETCH_ASSOC);
    }
}
