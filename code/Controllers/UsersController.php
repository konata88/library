<?php
namespace Controllers;

use App\Response;
use Models\User;

class UsersController {
    /**
     * Get users
     */
    public static function getAll()
    {
        $u = new User;
        $allUsers= $u->all();
        Response::json($allUsers);
    }
}