<?php

use App\Admin\Account;
use App\Admin\Contacts\Index as ContactsIndex;
use App\Admin\Design;
use App\Admin\Items\Index as ItemsIndex;
use App\Admin\Metatags\Index as MetatagsIndex;
use App\Admin\Properties\Index as PropertiesIndex;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\SiteController;
use App\Http\Middleware\CheckAdminAuth;
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
			Route::get('/', ItemsIndex::class)->name('index');

		});

		// Свойства
		Route::get('properties', PropertiesIndex::class)->name('properties');

		// Контакты
		Route::get('contacts', ContactsIndex::class)->name('contacts');

		// Метатеги
		Route::get('metatags', MetatagsIndex::class)->name('metatags');

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
