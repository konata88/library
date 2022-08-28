<?php
namespace Controllers;

use App\Response;
use Models\Author;

class AuthorsController {
    /**
     * Получение списка авторов
     */
    public static function getAll() {
        $a = new Author;
        $allAuthors = $a->all();
        Response::json($allAuthors);
    }
}