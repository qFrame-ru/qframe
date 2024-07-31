<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Metatag extends Model
{
	use HasFactory;

	const TYPE_HOME_TITLE = 'home-title';
	const TYPE_HOME_DESCRIPTION = 'home-description';
	const TYPE_HOME_KEYWORDS = 'home-keywords';
	const TYPE_HOME_H1 = 'home-h1';

	protected $fillable = ['type', 'value'];

	/**
	 * Получить тег
	 *
	 * @param string $type
	 * @return static
	 */
	public static function get(string $type):static {
		return static::where('type', $type)->first();
	}

	/**
	 * Есть значение у тега
	 *
	 * @param string $type
	 * @return bool
	 */
	public static function hasValue(string $type):bool {
		$metatag = static::get($type);
		return !is_null($metatag->value);
	}

	/**
	 * Получить значение
	 *
	 * @param string $type
	 * @return string|NULL
	 */
	public static function getValue(string $type):string|NULL {
		$metatag = static::get($type);
		return $metatag->value;
	}
}
