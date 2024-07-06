<?php namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Nevadskiy\Position\HasPosition;

class Property extends Model
{
    use HasFactory, HasPosition;

	protected $fillable = ['name'];

	/**
	 * Значения
	 *
	 * @return HasMany
	 */
	public function values():HasMany {
		return $this->hasMany(Value::class);
	}
}
