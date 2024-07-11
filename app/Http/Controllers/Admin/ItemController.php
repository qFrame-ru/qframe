<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ItemController extends Controller
{
	/**
	 * Хаб объектов
	 *
	 * @return View
	 */
    public function index():View {
		return view('admin.items.index');
    }
}
