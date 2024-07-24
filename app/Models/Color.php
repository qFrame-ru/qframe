<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
	use HasFactory;

	protected $fillable = ['name', 'hex'];

	/**
	 * Получить цвет
	 *
	 * @param string $name
	 *
	 * @return static
	 */
	public static function get(string $name):static {
		return static::where('name', $name)->first();
	}

	/**
	 * Получить шестнадцатеричный код
	 *
	 * @param string $name
	 *
	 * @return string|NULL
	 */
	public static function getHex(string $name):string|NULL {
		$color = static::get($name);
		return $color->hex;
	}
}
