<?php
namespace Controllers;

use App\Response;

class IndexController {
    /**
     * Получение главной страницы
     */
    public static function index() {
        Response::view('index.htm.php');
    }
}