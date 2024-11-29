<form wire:submit="update">

	<h1 class="mb-5">Контакты</h1>

	<livewire:admin.contacts.contact type="{{ \App\Models\Contact::TYPE_COMPANY_NAME }}"/>
	<livewire:admin.contacts.contact type="{{ \App\Models\Contact::TYPE_PHONE }}"/>
	<livewire:admin.contacts.contact type="{{ \App\Models\Contact::TYPE_ADDRESS }}"/>
	<livewire:admin.contacts.contact type="{{ \App\Models\Contact::TYPE_SCHEDULE }}"/>

	<x-admin.inputs.submit/>

</form>
