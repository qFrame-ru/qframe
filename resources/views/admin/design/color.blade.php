<div class="cell">
	<div class="field">
		<label class="label">{{ trans('colors.' . $name) }}</label>
		<div class="control">
			<input type="color" value="{{ $hex }}" wire:model="hex">
		</div>
	</div>
</div>
