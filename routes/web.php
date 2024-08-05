<?php

use App\Admin\Account;
use App\Admin\Contacts\Index as ContactIndex;
use App\Admin\Design\Index as DesignIndex;
use App\Admin\Items\Index as ItemIndex;
use App\Admin\Items\Create as ItemCreate;
use App\Admin\Items\Edit as ItemEdit;
use App\Admin\Metatags\Index as MetatagIndex;
use App\Admin\Properties\Index as PropertyIndex;
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
			Route::get('/', ItemIndex::class)->name('index');

			Route::get('create', ItemCreate::class)->name('create');

			Route::get('edit/{item}', ItemEdit::class)->name('edit');

		});

		// Свойства
		Route::get('properties', PropertyIndex::class)->name('properties');

		// Контакты
		Route::get('contacts', ContactIndex::class)->name('contacts');

		// Метатеги
		Route::get('metatags', MetatagIndex::class)->name('metatags');

		// Дизайн
		Route::get('design', DesignIndex::class)->name('design');

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
