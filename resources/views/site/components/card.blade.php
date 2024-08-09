<a href="{{ route('site.item', $item) }}" class="card">

	@if ($item->hasImages())
		<span class="slider">
			<span class="swiper-wrapper">
				@foreach($item->getImages() as $image)
					<span class="swiper-slide">
						<img src="{{ $image->getUrl('image') }}" alt="{{ $item->name }}">
					</span>
				@endforeach
			</span>
			<span class="swiper-pagination"></span>
		</span>
	@endif

	<span class="item-data card__data">
		<span class="item-data__title">{{ $item->name }}</span>
		@if ($item->hasProperties())
			<span class="item-data__params">
				@foreach($item->getPropertiesWithValues() as $property)
					<span class="item-data__param">
						<span class="item-data__param-label">{{ $property['name'] }}</span>
						<span class="item-data__param-value">{{ $property['value'] }}</span>
					</span>
				@endforeach
			</span>
		@endif
	</span>
</a>
