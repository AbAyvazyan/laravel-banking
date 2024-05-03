<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CardController;

Route::post('cards', [CardController::class, 'store']);
Route::get('cards', [CardController::class, 'index']);

