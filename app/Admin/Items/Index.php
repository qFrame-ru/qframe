<?php namespace App\Admin\Items;

use Livewire\Component;

class Index extends Component
{
	public function render() {
		return view('admin.items.index')
			->title('Объекты');
	}
}
