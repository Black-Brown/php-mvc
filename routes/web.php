<?php

use lib\route;

route::get('/', function() {
    return array(
        'message' => 'Hello, world!',
        'status' => 'success'
    );
});

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