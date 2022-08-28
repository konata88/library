<?php
namespace Controllers;

use App\Response;
use Models\BookType;

class BookTypesController {
    /**
     * Get book types
     */
    public static function getAll() {
        $bt = new BookType;
        $allBooksTypes = $bt->all();
        Response::json($allBooksTypes);
    }
}