<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Item
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property float $price
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Cart[] $carts
 *
 * @package App\Models
 */
class Item extends Model
{
	protected $table = 'items';

	protected $casts = [
		'price' => 'float'
	];

	protected $fillable = [
		'name',
		'description',
		'price'
	];

	public function carts()
	{
		return $this->hasMany(Cart::class);
	}
}
