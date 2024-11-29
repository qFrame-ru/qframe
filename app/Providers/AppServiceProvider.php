<?php namespace App\Providers;

use App\Http\ViewComposers\Admin\MenuComposer;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	public function register():void {
		//
	}

	public function boot():void {
		view()->composer('livewire.admin.template', MenuComposer::class);
	}
}
