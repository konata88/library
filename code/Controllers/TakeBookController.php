<?php
namespace Controllers;

use App\Response;
use App\Request;
use Models\BookTaken;

class TakeBookController {
    /**
     * Take books
     * @param Request $request
     */
    public static function takeBook(Request $request) {
        //check dates
        $b = new BookTaken;
        if ($b->checkIntervals($request->book_id, $request->from, $request->to)) {
            $b->create($request);
            $result = 'done';
        } else {
            $result = 'error';
        }
        Response::json(['result' => $result]);
    }

    /**
     * Taken books history
     */
    public static function getAll() {
        $b = new BookTaken;
        $taken = $b->all();
        Response::json($taken);
    }
}