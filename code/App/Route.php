<?php
namespace App;

use App\Request;
use Controllers\TestController as TestController;

class Route {
    public function add($type, $route, $method) {
        if ($_SERVER['REQUEST_METHOD'] != $type) {
            return false;
        }

        $routeArray = explode('/', trim($_SERVER['REQUEST_URI'], '/'));
        $clientRoute = array_shift($routeArray);
        if ('/'.$clientRoute === $route) {
            $request = new Request();
            call_user_func_array('Controllers\\'.$method, [$request, ...$routeArray]);
        }
    }
}