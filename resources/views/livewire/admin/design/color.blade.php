<div class="col-3 mb-3">
	<label class="form-label">{{ trans('colors.' . $name) }}</label>
	<div class="input-group">

		{{--Пикер--}}
		<input type="color" class="form-control" wire:model="hex" style="height: 38px">

		{{--Просто текстовое полее вода--}}
		<input
			type="text" class="form-control"
			wire:model="hex"
		>

	</div>
</div>
