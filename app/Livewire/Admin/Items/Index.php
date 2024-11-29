<?php namespace App\Livewire\Admin\Items;

use App\Models\Item;
use Livewire\Component;

class Index extends Component
{
	public $items;

	public function mount() {
		$this->items = Item::orderByPosition()->get();
	}

	public function render() {
		return view('livewire.admin.items.index')
			->layout('livewire.admin.template')
			->title('Объекты');
	}
}
