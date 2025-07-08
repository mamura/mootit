<?php

use App\Livewire\Teste;
use App\Livewire\ProductSearch;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste', Teste::class);
Route::get('/search', ProductSearch::class);
