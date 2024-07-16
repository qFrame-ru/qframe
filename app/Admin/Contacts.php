<?php namespace App\Admin;

use Livewire\Component;

class Contacts extends Component
{
	public function render() {
		return view('admin.contacts')
			->title('Контакты');
	}
}
