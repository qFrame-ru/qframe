@isset($text)
	<span class="icon-text">
		@isset($icon)
			<span class="icon">
				<i class="{{ $collection ?? 'fas' }} fa-{{ $icon }}"></i>
			</span>
		@endisset
		<span
			@class(['has-text-weight-bold' => $bold ?? false])
		>{{ $text }}</span>
	</span>
@else
	<span class="icon">
		<i class="{{ $collection ?? 'fas' }} fa-{{ $icon }}"></i>
	</span>
@endisset
