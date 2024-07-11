<?php namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthController extends Controller
{
	/**
	 * Форма входа
	 *
	 * @return View
	 */
    public function loginForm():View {
		return view('admin.login');
    }

	/**
	 * Вход
	 *
	 * @param Request $request
	 * @return RedirectResponse
	 */
	public function login(Request $request):RedirectResponse {
		$credentials = $request->validate([
			'email' => ['required', 'email'],
			'password' => ['required']
		]);

		if (Auth::attempt($credentials)) {
			$request->session()->regenerate();
			$default_route = route('admin.index');

			return redirect()->intended($default_route);
		}

		return back()->withErrors([
			'email' => 'Неверный электронный адрес'
		])->onlyInput('email');
	}

	/**
	 * Выход
	 *
	 * @return RedirectResponse
	 */
	public function logout():RedirectResponse {
		Auth::logout();

		return redirect()->route('admin.auth.form');
	}
}
