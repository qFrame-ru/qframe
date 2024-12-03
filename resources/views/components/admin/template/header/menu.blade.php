{{--Меню--}}
<ul class="navbar-nav me-auto">
	@foreach($menu as $title => $value)
		@if (is_array($value))
			<x-admin.template.header.menu-dropdown :$title :items="$value"/>
		@else
			<x-admin.template.header.menu-link :$title :route="$value"/>
		@endif
	@endforeach
</ul>
