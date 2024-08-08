<?php namespace App\Models;

use Dyrynda\Database\Support\NullableFields;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
	use HasFactory, NullableFields;

	const TYPE_COMPANY_NAME = 'company-name';
	const TYPE_PHONE = 'phone';
	const TYPE_ADDRESS = 'address';
	const TYPE_SCHEDULE = 'schedule';

	protected $fillable = ['type', 'value'];
	protected $nullable = ['value'];

	/**
	 * Получить контакт
	 *
	 * @param string $type
	 *
	 * @return static
	 */
	public static function get(string $type):static {
		return static::where('type', $type)->first();
	}

	/**
	 * Есть значение у контакта
	 *
	 * @param string $type
	 *
	 * @return bool
	 */
	public static function hasValue(string $type):bool {
		$contact = static::get($type);
		return !is_null($contact->value);
	}

	/**
	 * Получить значение
	 *
	 * @param string $type
	 *
	 * @return string|NULL
	 */
	public static function getValue(string $type):string|NULL {
		$contact = static::get($type);
		return $contact->value;
	}

	/**
	 * Получить очищенный номер телефона
	 *
	 * @return string|NULL
	 */
	public static function getCleanPhoneValue():string|NULL {
		$contact = static::get(static::TYPE_PHONE);
		return str_replace([' ', '-', '(', ')'], '', $contact->value);
	}
}
