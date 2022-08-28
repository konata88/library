<?php
include '../autoload.php';

use App\Route;
use App\Response;

$route = new Route();

$route->add("GET","/", "IndexController::index");
$route->add("GET","/books", "BooksController::getAll");
$route->add("GET","/searchBook", "BooksController::search");

$route->add("GET","/book", "BooksController::getBook");
$route->add("GET","/authors", "AuthorsController::getAll");
$route->add("GET","/users", "UsersController::getAll");
$route->add("GET","/bookTypes", "BookTypesController::getAll");
$route->add("POST","/addBook", "BooksController::addBook");
$route->add("POST","/updateBook", "BooksController::updateBook");
$route->add("DELETE","/deleteBook", "BooksController::deleteBook");
$route->add("POST","/takeBook", "TakeBookController::takeBook");
$route->add("GET","/booksTaken", "TakeBookController::getAll");
//booksTaken

Response::show404();

?>