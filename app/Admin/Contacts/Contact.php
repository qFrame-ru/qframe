<?php namespace App\Admin\Contacts;

use App\Models\Contact as ContactModel;
use Livewire\Attributes\On;
use Livewire\Component;

class Contact extends Component
{
	public ContactModel $contact;
	public string $type = '';
	public string|NULL $value = '';

	public function mount($type):void {
		$this->contact = ContactModel::get($type);
		$this->type = $type;
		$this->value = $this->contact->value;
	}

	/**
	 * Обновление
	 *
	 * @return void
	 */
	#[On('contacts-updated')]
	public function update():void {
		$this->contact->value = $this->value;
		$this->contact->save();
	}
}
