<?php namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Nevadskiy\Position\HasPosition;

class Item extends Model
{
	use HasFactory, HasPosition;

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
				'name' => $name,
				'value' => $value
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
