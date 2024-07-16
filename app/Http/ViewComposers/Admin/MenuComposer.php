<?php namespace App\Http\ViewComposers\Admin;

use Illuminate\View\View;

class MenuComposer
{
	public function compose(View $view):void {
		$view->with('menu', config('qframe.admin.menu'));
	}
}
