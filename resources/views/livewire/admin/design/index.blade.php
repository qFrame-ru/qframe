<section class="vstack row-gap-4">
	<h1>Дизайн</h1>

	{{--Логотип--}}
	<form
		class="card"
		x-data="upload" x-bind="container"
		wire:submit="updateLogo"
	>
		<div class="card-header">Логотип</div>
		<div class="card-body">

			{{--Поле выбора файла--}}
			<x-admin.inputs.file field="logoFile"/>

			@if ($logoFile)
				{{--Временное превью--}}
				<img src="{{ $logoFile->temporaryUrl() }}" style="width: 328px">
			@elseif ($logoModel->hasLogoMedia())
				{{--Загруженное изображение--}}
				<img src="{{ $logoModel->getLogoUrl() }}" style="width: 328px">
			@endif

			{{--Прогресс-бар--}}
			<x-admin.progress/>

			{{--Уведомление с ошибкой--}}
			<x-admin.notifications.error field="logoFile"/>

			{{--Кнопка--}}
			<div class="mt-3">
				<x-admin.inputs.submit bind="submit"/>
			</div>

		</div>
	</form>

	{{--Фавиконка--}}
	<form
		class="card"
		x-data="upload" x-bind="container"
		wire:submit="updateFavicon"
	>
		<div class="card-header">Иконка сайта</div>

		<div class="card-body">

			{{--Поле выбора файла--}}
			<x-admin.inputs.file field="faviconFile"/>

			@if ($faviconFile)
				{{--Временное превью--}}
				<img src="{{ $faviconFile->temporaryUrl() }}" style="width: 32px; height: 32px">
			@elseif ($faviconModel->hasFaviconMedia())
				{{--Загруженное изображение--}}
				<img src="{{ $faviconModel->getFaviconUrl() }}" style="width: 32px; height: 32px">
			@endif

			{{--Прогресс-бар--}}
			<x-admin.progress/>

			{{--Уведомление с ошибкой--}}
			<x-admin.notifications.error field="faviconFile"/>

			{{--Кнопка--}}
			<div class="mt-3">
				<x-admin.inputs.submit bind="submit"/>
			</div>

		</div>

	</form>

	{{--Цвета--}}
	<form
		class="card"
		wire:submit="updateColors"
	>
		<div class="card-header">Цвета</div>
		<div class="card-body">
			<div class="row">
				<livewire:admin.design.color name="accent"/>
				<livewire:admin.design.color name="accent-swipe"/>
				<livewire:admin.design.color name="stroke"/>
				<livewire:admin.design.color name="slider-bullet"/>
				<livewire:admin.design.color name="card-text"/>
				<livewire:admin.design.color name="card-background"/>
				<livewire:admin.design.color name="page-text"/>
				<livewire:admin.design.color name="page-background"/>
			</div>

			<x-admin.inputs.submit/>
		</div>
	</form>

</section>
