<form
	class="vstack row-gap-5"
	x-data="upload" x-bind="container"
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
		<h1>{{ $item->name }}</h1>
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

	{{--Изображения--}}
	<section class="vstack row-gap-3">
		<h4>Изображения</h4>

		{{--Поле выбора файлов--}}
		<x-admin.inputs.file field="images" multiple/>

		@if (count($images))
			<x-admin.notifications.notification message="Загружено изображений: {{ count($images) }}"/>
		@endif

		{{--Прогресс-бар--}}
		<x-admin.progress/>

		{{--Изображения--}}
		@if ($item->hasImages())
			<div class="row" x-sort="$wire.sortImages">
				@foreach($item->getImages() as $image)
					<div
						class="col-2 is-draggable vstack row-gap-2"
						x-sort:item="{{ $image->id }}"
					>
						<img src="{{ $image->getUrl('image') }}">
						<button
							type="button" class="btn btn-light"
							wire:click="deleteImage({{ $image->id }})"
							wire:confirm="Вы уверены, что хотите удалить изображение?"
						>
							<x-admin.icon icon="trash" text="Удалить"/>
						</button>
					</div>
				@endforeach
			</div>
		@endif

	</section>

	{{--Кнопки--}}
	<div class="hstack column-gap-2">

		{{--Сохранить--}}
		<x-admin.inputs.submit bind="submit"/>

		{{--Удалить--}}
		<button
			type="button" class="btn btn-danger"
			wire:click="delete"
			wire:confirm="Вы уверены, что хотите удалить объект? Отменить действие невозможно."
		>
			<x-admin.icon icon="trash" text="Удалить объект"/>
		</button>

	</div>

</form>
