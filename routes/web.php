<?php

use lib\route;

route::get('/', function() {
    echo 'Hello, principal page!';
});

route::get('/about', function() {
    echo 'Hello, about page!';
});

route::get('/contact', function() {
    echo 'Hello, contact page!';
});

route::run();                                    