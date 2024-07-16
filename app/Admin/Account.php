<?php namespace App\Admin;

use Livewire\Component;

class Account extends Component
{
	public function render() {
		return view('admin.account')
			->title('Аккаунт');
	}
}
