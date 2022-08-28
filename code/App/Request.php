<?php
namespace App;

class Request
{
    public function __construct()
    {
        foreach ($_POST as $key => $value) {
            $filtered = htmlspecialchars($value);
            $this->{$key} = str_replace('&amp;', '&', $filtered);
        }
    }
}