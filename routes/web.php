<?php

declare(strict_types=1);

use App\Controllers\WelcomeController;
use IronFlow\Support\Facades\Route;

// Route racine
Route::get('/', [WelcomeController::class, 'index'])->name('home');
