<?php

namespace App\Controllers;

class Controller 
{
    public function view($route, $data = []) {

        extract($data);
        
        $file = "../resources/Views/{$route}.php";
        
        if (file_exists($file)) {
            ob_start();
            include $file;
            return ob_get_clean();
        } else {
            return "View file not found: {$file}";
        }
    }
}