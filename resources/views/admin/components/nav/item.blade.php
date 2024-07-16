<a
	@class(['navbar-item', 'is-selected' => Route::is($route)])
	href="{{ route($route) }}"
	wire:navigate.hover
>{{ $title }}</a>
