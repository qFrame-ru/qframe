<?php namespace App\Admin\Metatags;

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
		return view('admin.metatags.index')
			->title('Метатеги');
	}
}
