<div class="mb-3">
	<label class="form-label">{{ trans('metatags.' . $type) }}</label>
	<div class="control">
		<input
			class="form-control" type="text" autocomplete="off"
			wire:model="value"
		>
	</div>
</div>
