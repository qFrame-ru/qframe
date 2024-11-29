<li class="nav-item dropdown">
	<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">{{ $title }}</a>
	<ul class="dropdown-menu">
		@foreach($items as $title => $route)
			<li>
				<a
					@class(['dropdown-item', 'active' => Route::is($route)])
					href="{{ route($route) }}"
					wire:navigate.hover
				>{{ $title }}</a>
			</li>
		@endforeach
	</ul>
</li>
