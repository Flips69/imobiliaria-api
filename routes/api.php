<?php

use App\Http\Controllers\ClienteController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('find/{id}', [ClienteController::class, 'pesquisarPorId']);

Route::post('cliente',
[ClienteController::class, 'cliente']);