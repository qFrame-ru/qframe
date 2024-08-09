<?php namespace App\Models;

use Dyrynda\Database\Support\NullableFields;
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
use function App\Helpers\get_model_id;

class Item extends Model implements HasMedia
{
	use HasFactory, HasPosition, InteractsWithMedia, NullableFields;

	protected $fillable = ['name', 'description'];
	protected $nullable = ['description'];

	/**
	 * Значения
	 *
	 * @return HasMany
	 */
	public function values():HasMany {
		return $this->hasMany(Value::class);
	}

	/**
	 * Добавить значения свойства
	 *
	 * @param Property|int $property
	 * @param string|NULL $value
	 * @return Value|NULL
	 */
	public function addValue(Property|int $property, string|NULL $value):Value|NULL {
		$value = trim($value);

		if (mb_strlen($value)) {
			$property_id = get_model_id($property);
			$value_data = compact('property_id', 'value');

			return $this
				->values()
				->create($value_data);
		}

		return NULL;
	}

	/**
	 * Обновить значение свойства
	 *
	 * @param Property|int $property
	 * @param string|NULL $value
	 * @return void
	 */
	public function updateValue(Property|int $property, string|NULL $value):void {
		$value = trim($value);
		$value_model = $this->getValueModelOfProperty($property);

		if ($value_model) {
			// Если модель значения уже существует

			if (mb_strlen($value)) {
				// Если есть что сохранять, то сохраняем
				$value_model->value = $value;
				$value_model->save();
			} else {
				// Если сохранять нечего, то удаляем модель значения
				$value_model->delete();
			}
		} else {
			// Если модели значения ещё не существует,
			// то создаём её
			$this->addValue($property, $value);
		}
	}

	/**
	 * Получить модель значения по свойству
	 *
	 * @param Property|int $property
	 * @return Value|NULL
	 */
	public function getValueModelOfProperty(Property|int $property):Value|NULL {
		$property_id = get_model_id($property);

		return
			$this
				->values()
				->where('property_id', $property_id)
				->first();
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

	/**
	 * Есть изображения
	 *
	 * @return bool
	 */
	public function hasImages():bool {
		return $this->hasMedia('images');
	}

	/**
	 * Получить изображения
	 *
	 * @return Collection
	 */
	public function getImages():Collection {
		return $this->getMedia('images');
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

	protected static function booted() {
		static::deleting(function (Item $item) {
			foreach ($item->values as $value) {
				$value->delete();
			}
		});
	}
}
