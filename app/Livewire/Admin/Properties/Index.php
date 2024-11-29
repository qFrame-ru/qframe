<?php namespace App\Livewire\Admin\Properties;

use App\Models\Property;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Component;

class Index extends Component
{
	public Collection $properties;

	public string $newPropertyName;

	public function mount():void {
		$this->syncProperties();
	}

	/**
	 * Синхронизация списка свойства
	 *
	 * @return void
	 */
	#[On('properties-updated')]
	public function syncProperties():void {
		$this->properties = Property::orderByPosition()->get();
	}

	/**
	 * Создание свойства
	 *
	 * @return void
	 */
	public function create():void {
		$data = ['name' => $this->newPropertyName];
		Property::create($data);
		$this->newPropertyName = '';
		$this->dispatch('properties-updated');
	}

	/**
	 * Сортировка свойства
	 *
	 * @param \App\Livewire\Admin\Properties\Property $property
	 * @param int      $position
	 *
	 * @return void
	 */
	public function sort(Property $property, int $position):void {
		$property->move($position);
		$this->syncProperties();
	}

	public function render() {
		return view('livewire.admin.properties.index')
			->layout('livewire.admin.template')
			->title('Свойства');
	}
}
