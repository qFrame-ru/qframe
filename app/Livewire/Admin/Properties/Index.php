<?php namespace App\Livewire\Admin\Properties;

use App\Models\Property;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
	public string $newPropertyName = '';

	/**
	 * Создание
	 *
	 * @return void
	 */
	public function create():void {
		// TODO Сделать валидацию названия нового свойства
		$data = ['name' => $this->newPropertyName];
		Property::create($data);
		$this->reset('newPropertyName');
	}

	/**
	 * Сортировка
	 *
	 * @param Property $property
	 * @param int      $position
	 *
	 * @return void
	 */
	public function sort(Property $property, int $position):void {
		$property->move($position);
	}

	public function render() {
		$properties_query = Property::orderByPosition();

		return view('livewire.admin.properties.index')
			->layout('livewire.admin.template')
			->title('Свойства')
			->with('propertiesQuery', $properties_query);
	}
}
