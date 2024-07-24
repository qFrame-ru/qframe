<?php namespace App\Admin\Design;

use Livewire\Component;

class Index extends Component
{
	/**
	 * Обновление
	 *
	 * @return void
	 */
	public function update():void {
		$this->dispatch('design-updated');
	}

	public function render() {
		return view('admin.design.index')
			->title('Дизайн');
	}
}
