@isset($text)
	@isset($icon)
		@php($collection = $collection ?? 'fas')
		<x-admin.icon :$collection :$icon />
	@endisset
	<span
		@class(['fw-bold' => $bold ?? false])
	>{{ $text }}</span>
@else
	<i class="{{ $collection ?? 'fas' }} fa-{{ $icon }} fa-fw"></i>
@endisset
