<?php namespace App\Admin\Items;

use App\Models\Item;
use App\Models\Property;
use App\Models\Value;
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

	/**
	 * Сохранение объекта
	 *
	 * @return void
	 */
	public function save():void {

		// Подготовка данных
		$data = [
			'name' => trim($this->name),
			'description' => $this->description
		];

		// Обновление объекта
		$this->item->update($data);

		// Сохранение значений свойств
		foreach ($this->values as $property_id => $value) {
			$this->item->updateValue($property_id, $value);
		}

	}

	/**
	 * Удаление объекта
	 *
	 * @return void
	 */
	public function delete():void {
		$this->item->delete();
		$this->redirectRoute('admin.items.index');
	}

	public function render() {
		$properties = Property::orderByPosition()->get();

		return view('admin.items.edit')
			->title($this->item->name)
			->with('properties', $properties);
	}
}
