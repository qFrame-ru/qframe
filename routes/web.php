<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

Route::get('/', [SiteController::class, 'index'])->name('index');
Route::get('item/{item}', [SiteController::class, 'item'])->name('item');
Route::get('palette/{hash}.css', [SiteController::class, 'cssPalette'])->name('css-palette');
