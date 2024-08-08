<?php namespace App\Admin\Items;

use App\Models\Item;
use App\Models\Property;
use Livewire\Component;

class Create extends Component
{
	public $name;
	public $description;
	public $values = [];

	/**
	 * Сохранение
	 *
	 * @return void
	 */
	public function save():void {

		// Подготовка данных
		$data = [
			'name' => trim($this->name),
			'description' => $this->description
		];

		// Создание объекта
		/** @var Item $item */
		$item = Item::create($data);

		// Создание значений свойств
		foreach ($this->values as $property_id => $value) {
			$item->addValue($property_id, $value);
		}

		$this->redirectRoute('admin.items.index');
	}

	public function render() {
		$properties = Property::orderByPosition()->get();

		return view('admin.items.create')
			->title('Новый объект')
			->with('properties', $properties);
	}
}
