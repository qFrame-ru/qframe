<?php namespace App\Http\Controllers;

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
		return view('site.index');
    }

	/**
	 * Файл CSS-палитры
	 *
	 * @return Response
	 */
	public function cssPalette():Response {
		$palette_filename = resource_path('sass/palette.css');
		$content = file_get_contents($palette_filename);

		return response($content)
			->header('Content-Type', 'text/css');
	}
}
