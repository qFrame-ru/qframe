<?php namespace App\Admin\Items;

use App\Models\Item;
use App\Models\Property;
use Livewire\Component;

class Edit extends Component
{
	public Item $item;
	public $name;
	public $description;
	public $values = [];

	public function mount():void {
		$this->name = $this->item->name;
		$this->description = $this->item->description;

		$pairs = $this->item->getPropertiesWithValues();
		foreach ($pairs as $pair) {
			$this->values[$pair['property_id']] = $pair['value'];
		}
	}

	public function save():void {

	}

	public function render() {
		$properties = Property::orderByPosition()->get();

		return view('admin.items.edit')
			->title($this->item->name)
			->with('properties', $properties);
	}
}
