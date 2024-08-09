<form
	wire:submit="save"
	x-data="upload"
	x-bind="container"
>

	{{--Хлебные крошки--}}
	<nav class="breadcrumb">
		<ul>
			<li><a href="{{ route('admin.items.index') }}">Объекты</a></li>
			<li class="is-active"><a href="#"></a></li>
		</ul>
		<h1 class="title is-1">{{ $item->name }}</h1>
	</nav>

	{{--Поля объекта--}}
	<div>

		<div class="field">
			<label class="label">Название</label>
			<div class="control">
				<input
					type="text"
					class="input"
					autocomplete="off"
					autofocus
					required

					wire:model="name"
				>
			</div>
		</div>

		<div class="field">
			<label class="label">Описание</label>
			<div class="control">
				<textarea
					class="textarea"
					wire:model="description"
				></textarea>
			</div>
		</div>

	</div>

	{{--Свойства--}}
	<section class="mt-6">
		<h4 class="subtitle is-4">Свойства</h4>
		<div class="fixed-grid has-4-cols">
			<div class="grid">
				@foreach($properties as $property)
					<div class="cell">
						<div class="field">
							<label class="label">{{ $property->name }}</label>
							<div class="control">
								<input type="text" class="input" autocomplete="off" wire:model="values.{{ $property->id }}">
							</div>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</section>

	{{--Изображения--}}
	<section class="my-6">
		<h4 class="subtitle is-4">Изображения</h4>

		{{--Поле выбора файлов--}}
		<div class="field">
			<x-admin.inputs.file field="images" multiple/>
		</div>

		@if (count($images))
			<x-admin.notifications.notification message="Загружено изображений: {{ count($images) }}"/>
		@endif

		{{--Прогресс-бар--}}
		<x-admin.progress/>

		{{--Изображения--}}
		@if ($item->hasImages())
			<div class="fixed-grid has-6-cols">
				<div class="grid" x-sort="$wire.sortImages">
					@foreach($item->getImages() as $image)
						<div class="cell is-draggable" x-sort:item="{{ $image->id }}">
							<figure class="image">
								<img src="{{ $image->getUrl('image') }}">
								<button
									type="button"
									class="button is-light is-full-width mt-2"

									wire:click="deleteImage({{ $image->id }})"
									wire:confirm="Вы уверены, что хотите удалить изображение?"
								>
									<x-admin.icon icon="trash" text="Удалить"/>
								</button>
							</figure>
						</div>
					@endforeach
				</div>
			</div>
		@endif

	</section>

	{{--Кнопки--}}
	<div class="field is-grouped">

		{{--Сохранить--}}
		<div class="control">
			<x-admin.inputs.submit bind="submit"/>
		</div>

		{{--Удалить--}}
		<div class="control">
			<button
				type="button"
				class="button is-danger"

				wire:click="delete"
				wire:confirm="Вы уверены, что хотите удалить объект? Отменить действие невозможно."
			>
				<x-admin.icon icon="trash" text="Удалить объект"/>
			</button>
		</div>

	</div>

</form>
