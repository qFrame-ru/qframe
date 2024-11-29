<?php namespace App\Livewire\Admin\Metatags;

use Livewire\Component;

class Index extends Component
{
	/**
	 * Обновление
	 *
	 * @return void
	 */
	public function update():void {
		$this->dispatch('metatags-updated');
	}

	public function render() {
		return view('livewire.admin.metatags.index')
			->layout('livewire.admin.template')
			->title('Метатеги');
	}
}
