<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Image\Enums\Constraint;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Logo extends Model implements HasMedia
{
	use HasFactory, InteractsWithMedia;

	const TYPE_LOGO = 'logo';
	const TYPE_FAVICON = 'favicon';

	protected $fillable = ['type'];

	/**
	 * Получить логотип
	 *
	 * @param string $type
	 * @return static
	 */
	public static function get(string $type):static {
		return static::where('type', $type)->first();
	}

	/**
	 * Получить модель логотипа
	 *
	 * @return static
	 */
	public static function getLogoModel():static {
		return static::get(static::TYPE_LOGO);
	}

	/**
	 * Получить модель фавиконки
	 *
	 * @return static
	 */
	public static function getFaviconModel():static {
		return static::get(static::TYPE_FAVICON);
	}

	/**
	 * Есть загруженный логотип
	 *
	 * @return bool
	 */
	public static function hasLogoMedia():bool {
		$logo = static::getLogoModel();
		return $logo->hasMedia(static::TYPE_LOGO);
	}

	/**
	 * Есть загруженная фавиконка
	 *
	 * @return bool
	 */
	public static function hasFaviconMedia():bool {
		$favicon = static::getFaviconModel();
		return $favicon->hasMedia(static::TYPE_FAVICON);
	}

	/**
	 * Получить адрес логотипа
	 *
	 * @return string|NULL
	 */
	public static function getLogoUrl():string|NULL {
		if (static::hasLogoMedia()) {
			return static::getLogoModel()->getFirstMediaUrl(static::TYPE_LOGO, static::TYPE_LOGO);
		}

		return NULL;
	}

	/**
	 * Получить адрес фавиконки
	 *
	 * @return string|NULL
	 */
	public static function getFaviconUrl():string|NULL {
		if (static::hasFaviconMedia()) {
			return static::getFaviconModel()->getFirstMediaUrl(static::TYPE_FAVICON, static::TYPE_FAVICON);
		}

		return NULL;
	}

	public function registerMediaCollections():void {
		// Логотип
		$this->addMediaCollection(static::TYPE_LOGO);

		// Фавиконка
		$this->addMediaCollection(static::TYPE_FAVICON);
	}

	public function registerMediaConversions(?Media $media = null):void {
		// Логотип
		$this
			->addMediaConversion(static::TYPE_LOGO)
			->performOnCollections(static::TYPE_LOGO)
			->width(984, [Constraint::PreserveAspectRatio])
			->format('webp')
			->nonQueued();

		// Фавиконка
		$this
			->addMediaConversion(static::TYPE_FAVICON)
			->performOnCollections(static::TYPE_FAVICON)
			->resize(32, 32, [])
			->width(32)
			->height(32)
			->format('png')
			->nonQueued();
	}
}
