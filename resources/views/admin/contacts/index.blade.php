<form wire:submit="update">

	<h1 class="title">Контакты</h1>

	<livewire:contacts.contact type="company-name"/>
	<livewire:contacts.contact type="phone"/>
	<livewire:contacts.contact type="address"/>
	<livewire:contacts.contact type="schedule"/>

	<button type="submit" class="button is-primary">
		<x-admin.icon icon="check" text="Сохранить"/>
	</button>

</form>
