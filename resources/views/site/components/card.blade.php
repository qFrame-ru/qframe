<a href="{{ route('item', $item) }}" class="card">

	@if ($item->hasImages())
		<span class="slider slider_negative">
			<span class="swiper-wrapper">
				@for ($i = 1; $i <= $item->getImagesCount(); $i++)
					<span class="swiper-slide">
						<img src="{{ asset('i/' . $item->id . '/' . $i . '.webp') }}">
					</span>
				@endfor
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
