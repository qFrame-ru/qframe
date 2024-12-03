{{--Ссылка--}}
<li>
	<a href="{{ $href }}" target="_blank" class="link-secondary link-opacity-75-hover link-underline link-underline-opacity-0">
		<x-admin.icon :$icon :collection="isset($brand) ? 'fa-brands' : 'fas'" :$text/>
	</a>
</li>
