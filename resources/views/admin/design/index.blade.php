<section>
	<h1 class="title">Дизайн</h1>

	{{--Логотип--}}
	<form
		class="box"

		x-data="upload"
		x-bind="container"

		wire:submit="updateLogo"
	>
		<h4 class="subtitle is-4">Логотип</h4>

		{{--Поле выбора файла--}}
		<div class="field">
			<x-admin.inputs.file field="logoFile"/>
		</div>

		@if ($logoFile)
			{{--Временное превью--}}
			<div class="is-flex">
				<img src="{{ $logoFile->temporaryUrl() }}" style="width: 328px">
			</div>
		@elseif ($logoModel->hasLogoMedia())
			{{--Загруженное изображение--}}
			<div class="is-flex">
				<img src="{{ $logoModel->getLogoUrl() }}" style="width: 328px">
			</div>
		@endif

		{{--Прогресс-бар--}}
		<x-admin.progress/>

		{{--Уведомление с ошибкой--}}
		<x-admin.notifications.error field="logoFile"/>

		{{--Кнопка--}}
		<div class="mt-3">
			<x-admin.inputs.submit bind="submit"/>
		</div>

	</form>

	{{--Фавиконка--}}
	<form
		class="box"

		x-data="upload"
		x-bind="container"

		wire:submit="updateFavicon"
	>
		<h4 class="subtitle is-4">Иконка сайта</h4>

		<div class="field">

			{{--Поле выбора файла--}}
			<x-admin.inputs.file field="faviconFile"/>

		</div>

		@if ($faviconFile)
			{{--Временное превью--}}
			<div class="is-flex">
				<img src="{{ $faviconFile->temporaryUrl() }}" class="image is-32x32">
			</div>
		@elseif ($faviconModel->hasFaviconMedia())
			{{--Загруженное изображение--}}
			<div class="is-flex">
				<img src="{{ $faviconModel->getFaviconUrl() }}" class="image is-32x32">
			</div>
		@endif

		{{--Прогресс-бар--}}
		<x-admin.progress/>

		{{--Уведомление с ошибкой--}}
		<x-admin.notifications.error field="faviconFile"/>

		{{--Кнопка--}}
		<div class="mt-3">
			<x-admin.inputs.submit bind="submit"/>
		</div>

	</form>

	{{--Цвета--}}
	<form
		class="box mt-6"
		wire:submit="updateColors"
	>
		<h4 class="subtitle is-4">Цвета</h4>
		<div class="grid is-col-min-12 is-row-gap-4">
			<livewire:design.color name="accent"/>
			<livewire:design.color name="accent-swipe"/>
			<livewire:design.color name="stroke"/>
			<livewire:design.color name="slider-bullet"/>
			<livewire:design.color name="card-text"/>
			<livewire:design.color name="card-background"/>
			<livewire:design.color name="page-text"/>
			<livewire:design.color name="page-background"/>
		</div>
		<x-admin.inputs.submit/>
	</form>

</section>
