<?php

spl_autoload_register(function($classname) {
    $filename = '../' . str_replace('\\', '/', $classname) . '.php';
    if (file_exists($filename)) {
        require_once $filename;
    } else {
        throw new Exception("File not found: " . $filename);
    }
});