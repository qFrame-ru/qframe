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
			'description' => trim($this->description)
		];

		// Создание объекта
		/** @var Item $item */
		$item = Item::create($data);

		// Создание значений свойств
		foreach ($this->values as $property_id => $value) {
			$value = trim($value);

			if (mb_strlen($value)) {
				$value_data = compact('property_id', 'value');
				$item->values()->create($value_data);
			}
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
