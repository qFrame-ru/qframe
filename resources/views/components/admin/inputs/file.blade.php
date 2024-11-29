<div class="mb-3">
	<input
		class="form-control" type="file"
		{{ $attributes->has('multiple') ? 'multiple' : '' }}
		wire:model="{{ $field }}"
	/>
</div>
