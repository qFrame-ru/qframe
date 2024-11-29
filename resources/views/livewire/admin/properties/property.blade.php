<form
	class="input-group"
	x-sort:item="{{ $property->id }}"
	wire:submit="update"
>

	{{--Маркер перетаскивания--}}
	<x-admin.sort-handle/>

	{{--Поле с названием--}}
	<input
		type="text" required autocomplete="off" class="form-control"
		wire:model="name"
	>

	{{--Подтвердить--}}
	<button type="submit" class="btn btn-primary">
		<x-admin.icon icon="check"/>
	</button>

	{{--Удалить--}}
	<button
		type="button" class="btn btn-danger"
		wire:click="delete"
		wire:confirm="Вы уверены, что хотите удалить свойство? Оно будет удалено из всех объектов без возможности восстановления."
	>
		<x-admin.icon icon="trash"/>
	</button>

</form>
