<li class="nav-item">
	<a
		@class(['nav-link', 'active' => Route::is($route)])
		href="{{ route($route) }}"
		wire:navigate.hover
	>{{ $title }}</a>
</li>
