<div class="file">
	<label class="file-label">

		<input
			class="file-input"
			type="file"
			wire:model="{{ $field }}"
			{{ $attributes->has('multiple') ? 'multiple' : '' }}
		/>

		<span class="file-cta">
			<span class="file-icon">
				<i class="fas fa-upload"></i>
			</span>
			<span class="file-label">{{ $label ?? 'Выберите файл' }}</span>
		</span>

	</label>
</div>
