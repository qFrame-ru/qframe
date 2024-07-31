<div>
    <h1 class="title">Свойства</h1>

	{{--Форма нового свойства--}}
	<form
		class="box"
		wire:submit="create"
	>

		<h5 class="subtitle is-5">Новое свойство</h5>

		<div class="field has-addons">

			{{--Поле ввода--}}
			<div class="control is-expanded">
				<input
					type="text"
					required
					autocomplete="off"
					class="input"
					placeholder="Название свойства"

					wire:model="newPropertyName">
			</div>

			{{--Кнопка--}}
			<div class="control">
				<x-admin.inputs.submit icon="plus" text="Добавить"/>
			</div>

		</div>

	</form>

	{{--Существующие свойства--}}
	@if ($properties->count())
		<div class="box mt-6">
			<h5 class="subtitle is-5">Существующие свойства</h5>
			<div x-data x-sort="$wire.sort">
				@foreach($properties as $property)
					<livewire:properties.property :key="$property->id" :$property />
				@endforeach
			</div>
		</div>
	@endif

</div>
