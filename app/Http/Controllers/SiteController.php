<?php namespace App\Http\Controllers;

use App\Models\Color;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;

class SiteController extends Controller
{
	/**
	 * Главная страница
	 *
	 * @return View
	 */
    public function index():View {
		$items = Item::orderByPosition()->get();

		return view('site.index')
			->with('items', $items);
    }

	/**
	 * Объект
	 *
	 * @param Item $item
	 * @return View
	 */
	public function item(Item $item):View {
		return view('site.item')
			->with('item', $item);
	}

	/**
	 * Файл CSS-палитры
	 *
	 * @return Response
	 */
	public function cssPalette():Response {
		$css = '';

		$colors = Color::all();
		foreach ($colors as $color) {
			$css .= '--color-' . $color->name . ': ' . $color->hex . ';';
		}

		$css = ':root {' . $css . '}';

		return response($css)
			->header('Content-Type', 'text/css');
	}
}
