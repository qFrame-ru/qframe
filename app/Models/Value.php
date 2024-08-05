<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Value extends Model
{
	use HasFactory;

	protected $fillable = ['property_id', 'value'];

	/**
	 * Объект
	 *
	 * @return BelongsTo
	 */
	public function item():BelongsTo {
		return $this->belongsTo(Item::class);
	}

	/**
	 * Свойство
	 *
	 * @return BelongsTo
	 */
	public function property():BelongsTo {
		return $this->belongsTo(Property::class);
	}
}
