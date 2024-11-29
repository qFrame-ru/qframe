<div class="mb-3">
	<label class="form-label">{{ trans('contacts.' . $type) }}</label>
	<input
		class="form-control" type="text" autocomplete="off"
		wire:model="value"
	>
</div>
