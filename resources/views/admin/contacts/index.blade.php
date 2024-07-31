<form wire:submit="update">

	<h1 class="title">Контакты</h1>

	<livewire:contacts.contact type="{{ \App\Models\Contact::TYPE_COMPANY_NAME }}"/>
	<livewire:contacts.contact type="{{ \App\Models\Contact::TYPE_PHONE }}"/>
	<livewire:contacts.contact type="{{ \App\Models\Contact::TYPE_ADDRESS }}"/>
	<livewire:contacts.contact type="{{ \App\Models\Contact::TYPE_SCHEDULE }}"/>

	<x-admin.inputs.submit/>

</form>
