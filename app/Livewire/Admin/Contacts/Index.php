<?php namespace App\Livewire\Admin\Contacts;

use Livewire\Component;

class Index extends Component
{
	/**
	 * Обновление
	 *
	 * @return void
	 */
	public function update():void {
		$this->dispatch('contacts-updated');
	}

	public function render() {
		return view('livewire.admin.contacts.index')
			->layout('livewire.admin.template')
			->title('Контакты');
	}
}
