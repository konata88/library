<?php
namespace App;

class Response
{
    /**
     * For json output
     * @param $data
     */
    public static function json($data) {
        header('Content-Type: application/json; charset=utf-8');
        self::send(json_encode($data));
    }

    /**
     * For views output
     * @param $file
     */
    public static function view($file) {
        require_once('../Views/'.$file);
        exit;
    }

    public static function show404()
    {
        self::send('not found');
    }

    public static function redirect($url)
    {
        header('Location: '.$url);
        exit;
    }

    private static function send($data) {
        print $data;
        exit;
    }
}