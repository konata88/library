<?php

function autoloadApp($class) {
	$classArr = explode('\\', $class);
    $filename =  '../' . $classArr[0].'/'.$classArr[1] . '.php';
    if (is_readable($filename)) {
        require $filename;
    } 
}
spl_autoload_register("autoloadApp");