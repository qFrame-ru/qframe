<?php namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Nevadskiy\Position\HasPosition;
use Spatie\Image\Enums\Constraint;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Item extends Model implements HasMedia
{
	use HasFactory, HasPosition, InteractsWithMedia;

	protected $fillable = ['name', 'description'];

	/**
	 * Значения
	 *
	 * @return HasMany
	 */
	public function values():HasMany {
		return $this->hasMany(Value::class);
	}

	/**
	 * Добавление значения свойства
	 *
	 * @param Property|int $property
	 * @param string|NULL $value
	 * @return Value|NULL
	 */
	public function addValue(Property|int $property, string|NULL $value):Value|NULL {
		$value = trim($value);

		if (mb_strlen($value)) {
			$property_id = is_int($property)
				? $property
				: $property->id;

			$value_data = compact('property_id', 'value');
			return $this->values()->create($value_data);
		}

		return NULL;
	}

	/**
	 * Запрос свойств
	 *
	 * @return Builder
	 */
	public function getPropertiesQuery():Builder {
		$properties_ids = $this->values()->get(['id']);
		return Property::whereIn('id', $properties_ids);
	}

	/**
	 * Массив отсортированных свойств со значениями
	 *
	 * @return array
	 */
	public function getPropertiesWithValues():array {
		$properties_ids = $this->values()->get('property_id');

		$properties = Property
			::whereIn('id', $properties_ids)
			->orderByPosition()
			->get();

		$pairs = [];

		foreach ($properties as $property) {
			$name = $property->name;
			$value = $property
				->values()
				->where('item_id', $this->id)
				->first()
				->value;

			$pairs[] = [
				'property_id'   => $property->id,
				'name'          => $name,
				'value'         => $value
			];
		}

		return $pairs;
	}

	/**
	 * Есть свойства
	 *
	 * @return bool
	 */
	public function hasProperties():bool {
		return (bool)$this->values()->count();
	}

	public function registerMediaCollections():void {
		$this->addMediaCollection('images');
	}

	public function registerMediaConversions(?Media $media = null):void {
		$this
			->addMediaConversion('image')
			->performOnCollections('images')
			->width(984, [Constraint::PreserveAspectRatio])
			->format('webp')
			->nonQueued();
	}

	/**
	 * Получить количество изображений в папке
	 *
	 * @return int
	 */
	public function getImagesCount():int {
		$path = public_path('i/' . $this->id);
		return count(scandir($path)) - 2;
	}

	/**
	 * Есть изображения
	 *
	 * @return bool
	 */
	public function hasImages():bool {
		return (bool)$this->getImagesCount();
	}
}
