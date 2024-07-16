<div class="navbar-item has-dropdown is-hoverable">
	<a class="navbar-link">{{ $title }}</a>

	<div class="navbar-dropdown">
		@foreach($items as $title => $route)
			<livewire:components.nav.item route="{{ $route }}" title="{{ $title }}" />
		@endforeach
	</div>
</div>
