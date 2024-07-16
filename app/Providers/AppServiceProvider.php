<?php namespace App\Providers;

use App\Http\ViewComposers\Admin\MenuComposer;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	public function register():void {
		//
	}

	public function boot():void {
		view()->composer('admin.template', MenuComposer::class);
	}
}
