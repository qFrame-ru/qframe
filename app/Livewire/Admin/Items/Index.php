<?php namespace App\Livewire\Admin\Items;

use App\Models\Item;
use Livewire\Component;

class Index extends Component
{
	public function render() {
		$items = Item
			::orderByPosition()
			->get();

		return view('livewire.admin.items.index')
			->layout('livewire.admin.template')
			->title('Объекты')
			->with('items', $items);
	}
}
