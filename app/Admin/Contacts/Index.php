<?php namespace App\Admin\Contacts;

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
		return view('admin.contacts.index')
			->title('Контакты');
	}
}
