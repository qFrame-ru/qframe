<form
	class="field has-addons"
	wire:submit="update"
	x-sort:item="{{ $property->id }}"
>

	{{--Маркер перетаскивания--}}
	<div class="control">
		<x-admin.sort-handle/>
	</div>

	{{--Поле с названием--}}
	<div class="control is-expanded">
		<input
			type="text"
			required
			autocomplete="off"
			class="input"

			wire:model="name"
		>
	</div>

	{{--Подтвердить--}}
	<div class="control">
		<button
			type="submit"
			class="button is-primary"
		>
			<x-admin.icon icon="check"/>
		</button>
	</div>


	{{--Удалить--}}
	<div class="control">
		<button
			type="button"
			class="button is-danger"

			wire:click="delete"
			wire:confirm="Вы уверены, что хотите удалить свойство? Оно будет удалено из всех объектов без возможности восстановления."
		>
			<x-admin.icon icon="trash"/>
		</button>
	</div>

</form>
