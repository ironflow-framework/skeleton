<?php 

$router->get('/blog', function () {
    echo "Welcome to IronFlow!";
    echo "Version: 1.0.0";
    echo "Module Blog is active!";
})->name('home');