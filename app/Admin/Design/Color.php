<?php namespace App\Admin\Design;

use App\Models\Color as ColorModel;
use Livewire\Attributes\On;
use Livewire\Component;

class Color extends Component
{
	public ColorModel $color;
	public string $name;
	public string $hex;

	public function mount(string $name):void {
		$this->color = ColorModel::get($name);
		$this->hex = $this->color->hex;
	}

	/**
	 * Обновление
	 *
	 * @return void
	 */
	#[On('design-updated')]
	public function update():void {
		$this->color->hex = $this->hex;
		$this->color->save();
	}
}
