<?php
namespace Controllers;

use Models\Book;
use Models\Author;
use Models\BookTaken;
use Models\User;
use Models\BookType;
use App\Response;
use App\Request;

class BooksController {
    /**
     * Get all Books
     */
    public static function getAll() {
        $b = new Book;
        $allBooks = $b->all();
        Response::json($allBooks);
    }

    /**
     * Add book
     * @param $request
     */
    public static function addBook(Request $request) {
        $b = new Book;
        $b->create($request);
        Response::json(['result' => 'done']);
    }

    /**
     * Delete book
     * @param $request
     * @param int $id
     */
    public static function deleteBook(Request $request, int $id)
    {
        $b = new Book;
        $t = new BookTaken;
        $t->deleteBook($id);
        $b->delete($id);
        Response::json(['result' => 'done']);
    }

    public static function updateBook(Request $request)
    {
        $b = new Book;
        $b->update($request);
        Response::json(['result' => 'done']);
    }

    /**
     * Get one book
     * @param $request
     * @param int $id
     */
    public static function getBook(Request $request, int $id) {
        $b = new Book;
        $t = new BookTaken;
        $bookFields = $b->get($id);
        $bookFields['taken'] = $t->getBookTaken($id);//get taken records
        Response::json($bookFields);
    }

    /**
     * Search books
     * @param Request $request
     * @param $text
     */
    public static function search(Request $request, $text)
    {
        $b = new Book;
        $allBooks = $b->search($text);
        Response::json($allBooks);
    }
}