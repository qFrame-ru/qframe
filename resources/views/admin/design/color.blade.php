<div class="cell">
	<label class="label">{{ trans('colors.' . $name) }}</label>
	<div class="field has-addons">

		{{--Пикер--}}
		<div class="control">
			<input class="is-full-height" type="color" wire:model="hex">
		</div>

		{{--Просто текстовое полее вода--}}
		<div class="control">
			<input
				type="text"
				class="input"

				wire:model="hex"
			>
		</div>

	</div>
</div>
