<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\SiteController;
use App\Http\Middleware\CheckAdminAuth;
use App\Admin\Account;
use App\Admin\Contacts;
use App\Admin\Design;
use App\Admin\Items\Index as ItemIndex;
use App\Admin\Properties\Index as PropertiesIndex;
use Illuminate\Support\Facades\Route;

// Сайт
Route::name('site.')->group(function() {

	// Главная страница
	Route::get('/', [SiteController::class, 'index'])->name('index');

	// Объект
	Route::get('item/{item}', [SiteController::class, 'item'])->name('item');

	// Палитра
	Route::get('palette/{hash}.css', [SiteController::class, 'cssPalette'])->name('css-palette');

});

// Админка
Route::prefix('admin')->name('admin.')->group(function() {

	Route::middleware(CheckAdminAuth::class)->group(function() {

		// Главная страница
		Route::get('/', function() {
			return redirect()->route('admin.items.index');
		})->name('index');

		// Объекты
		Route::prefix('items')->name('items.')->group(function() {

			// Список объектов
			Route::get('/', ItemIndex::class)->name('index');

		});

		// Свойства
		Route::prefix('properties')->name('properties.')->group(function() {

			// Список свойств
			Route::get('/', PropertiesIndex::class)->name('index');

		});

		// Контакты
		Route::get('contacts', Contacts::class)->name('contacts');

		// Дизайн
		Route::get('design', Design::class)->name('design');

		// Аккаунт
		Route::get('account', Account::class)->name('account');
	});

	// Аутентификация
	Route::prefix('auth')->name('auth.')->group(function() {

		// Страница входа
		Route::get('login', [AdminAuthController::class, 'loginForm'])->name('form');

		// Вход
		Route::post('login', [AdminAuthController::class, 'login'])->name('login');

		// Выход
		Route::post('logout', [AdminAuthController::class, 'logout'])->name('logout');

	});

});
