<?php

use App\Http\Controllers\TicketController;
use Illuminate\Support\Facades\Route;

Route::get('/greeting', function () {
    return 'HELLO WORLD';
});

Route::resource('tickets', TicketController::class);
