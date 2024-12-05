<section class="vstack row-gap-4">
    <h1>Свойства</h1>

	{{--Форма нового свойства--}}
	<form class="card" wire:submit="create">
		<div class="card-header">Новое свойство</div>
		<div class="card-body">
			<div class="input-group">

				{{--Поле ввода--}}
				<input
					type="text" required autocomplete="off" class="form-control" placeholder="Название свойства"
					wire:model="newPropertyName"
				>

				{{--Кнопка--}}
				<x-admin.inputs.submit icon="plus" text="Добавить"/>

			</div>
		</div>
	</form>

	{{--Существующие свойства--}}
	@if ($propertiesQuery->count())
		<div class="card">
			<div class="card-header">Существующие свойства</div>
			<div
				class="card-body vstack row-gap-2"
				x-data x-sort="$wire.sort"
			>
				@foreach($propertiesQuery->get() as $property)
					<livewire:admin.properties.property
						:$property
						@deleted="$refresh"
						wire:key="property{{ $property->id }}"/>
				@endforeach
			</div>
		</div>
	@endif

</section>
