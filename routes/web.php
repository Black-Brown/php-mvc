<?php

use lib\route;

use App\Controllers\HomeController;

route::get('/', [HomeController::class, 'index']);

route::get('/about', function() {
    return 'Hello, about page!';
});

route::get('/contact', function() {
    return 'Hello, contact page!';
});

route::get('/products/:slug', function($slug) {
    return "Hello, product id: " . $slug . '!';
});

route::run();                                    