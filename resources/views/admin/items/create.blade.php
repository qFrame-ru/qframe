<form
	class="vstack row-gap-5"
	wire:submit="save"
>

	{{--Хлебные крошки--}}
    <nav>
	    <ul class="breadcrumb mb-0">
		    <li class="breadcrumb-item">
			    <a href="{{ route('admin.items.index') }}">Объекты</a>
		    </li>
		    <li class="breadcrumb-item active">&nbsp;</li>
	    </ul>
	    <h1>Новый объект</h1>
    </nav>

	{{--Поля объекта--}}
	<section class="vstack row-gap-3">

		<div>
			<label class="form-label">Название</label>
			<input
				type="text" class="form-control" autocomplete="off" autofocus required
				wire:model="name"
			>
		</div>

		<div>
			<label class="form-label">Описание</label>
			<textarea class="form-control" wire:model="description"></textarea>
		</div>

	</section>

	{{--Свойства--}}
	<section class="vstack row-gap-3">
		<h4>Свойства</h4>
		<div class="row">
			@foreach($properties as $property)
				<div class="col-3 mb-3">
					<label class="form-label">{{ $property->name }}</label>
					<input type="text" class="form-control" autocomplete="off" wire:model="values.{{ $property->id }}">
				</div>
			@endforeach
		</div>
	</section>

	<div>
		<x-admin.inputs.submit bind="submit"/>
	</div>

</form>
