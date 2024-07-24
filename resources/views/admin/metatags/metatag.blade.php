<div class="field">
	<label class="label">{{ trans('metatags.' . $type) }}</label>
	<div class="control">
		<input
			class="input"
			type="text"
			autocomplete="off"

			wire:model="value"
		>
	</div>
</div>
