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
		$this->contact = ContactModel::where('type', $type)->first();
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
		$value = trim($this->value);
		$this->value = mb_strlen($value) ? $value : NULL;
		$this->contact->value = $this->value;
		$this->contact->save();
	}

	public function render() {
		return view('admin.contacts.contact');
	}
}
