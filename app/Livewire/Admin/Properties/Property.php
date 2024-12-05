<?php namespace App\Livewire\Admin\Properties;

use App\Models\Property as PropertyModel;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Property extends Component
{
	public PropertyModel $property;

	// Проработать валидацию названия свойства
	#[Validate('required', message: 'Необходимо указать название свойства')]
	public string $name;

	public function mount(PropertyModel $property) {
		$this->property = $property;
		$this->name = $property->name;
	}

	/**
	 * Обновление
	 *
	 * @return void
	 */
	public function update():void {
		$this->validate();
		$this->property->name = trim($this->name);
		$this->property->save();
	}

	/**
	 * Удаление
	 *
	 * @return void
	 */
	public function delete():void {
		$this->property->delete();
		$this->dispatch('deleted');
	}
}
