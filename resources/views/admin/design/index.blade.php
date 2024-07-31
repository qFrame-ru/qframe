<section>
	<h1 class="title">Дизайн</h1>

	{{--Логотип--}}
	<form
		class="box"
		wire:submit="updateLogo"
	>
		<h4 class="subtitle is-4">Логотип</h4>

		<div
			class="field"

			x-data="{ uploading: false, progress: 0 }"
			x-on:livewire-upload-start="uploading = true"
			x-on:livewire-upload-finish="uploading = false"
			x-on:livewire-upload-cancel="uploading = false"
			x-on:livewire-upload-error="uploading = false"
			x-on:livewire-upload-progress="progress = $event.detail.progress"
		>

			{{--Поле выбора файла--}}
			<div class="file">
				<label class="file-label">
					<input class="file-input" type="file" wire:model="logoFile"/>
					<span class="file-cta">
						<span class="file-icon">
							<i class="fas fa-upload"></i>
						</span>
						<span class="file-label">Выберите файл</span>
					</span>
				</label>
			</div>

			@if ($logoFile)
				{{--Временное превью--}}
				<img src="{{ $logoFile->temporaryUrl() }}" style="width: 328px">
			@elseif ($logoModel->hasLogoMedia())
				{{--Загруженное изображение--}}
				<img src="{{ $logoModel->getLogoUrl() }}" style="width: 328px">
			@endif

			{{--Прогресс-бар--}}
			<div class="mt-3" x-show="uploading">
				<progress class="progress is-small" max="100" x-bind:value="progress"></progress>
			</div>

		</div>

		<x-admin.notifications.error field="logoFile"/>
		<x-admin.inputs.submit/>
	</form>

	{{--Фавиконка--}}
	<form
		class="box"
		wire:submit="updateFavicon"
	>
		<h4 class="subtitle is-4">Иконка сайта</h4>

		<div
			class="field"

			x-data="{ uploading: false, progress: 0 }"
			x-on:livewire-upload-start="uploading = true"
			x-on:livewire-upload-finish="uploading = false"
			x-on:livewire-upload-cancel="uploading = false"
			x-on:livewire-upload-error="uploading = false"
			x-on:livewire-upload-progress="progress = $event.detail.progress"
		>

			{{--Поле выбора файла--}}
			<div class="file">
				<label class="file-label">
					<input class="file-input" type="file" wire:model="faviconFile"/>
					<span class="file-cta">
						<span class="file-icon">
							<i class="fas fa-upload"></i>
						</span>
						<span class="file-label">Выберите файл</span>
					</span>
				</label>
			</div>

			@if ($faviconFile)
				{{--Временное превью--}}
				<img src="{{ $faviconFile->temporaryUrl() }}" class="image is-32x32">
			@elseif ($faviconModel->hasFaviconMedia())
				{{--Загруженное изображение--}}
				<img src="{{ $faviconModel->getFaviconUrl() }}" class="image is-32x32">
			@endif

			{{--Прогресс-бар--}}
			<div class="mt-3" x-show="uploading">
				<progress class="progress is-small" max="100" x-bind:value="progress"></progress>
			</div>

		</div>

		<x-admin.notifications.error field="faviconFile"/>
		<x-admin.inputs.submit/>
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
