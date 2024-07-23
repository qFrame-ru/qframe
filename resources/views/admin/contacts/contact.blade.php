<div class="field">
	<label class="label">{{ trans('contacts.' . $type) }}</label>
	<div class="control">
		<input
			class="input"
			type="text"
			autocomplete="off"

			wire:model="value"
		>
	</div>
</div>
