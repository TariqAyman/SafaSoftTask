<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cart
 *
 * @property int $id
 * @property int $item_id
 * @property int $user_id
 * @property int $quantity
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Item $item
 * @property User $user
 *
 * @package App\Models
 */
class Cart extends Model
{
	protected $table = 'carts';

	protected $casts = [
		'item_id' => 'int',
		'user_id' => 'int',
		'quantity' => 'int'
	];

	protected $fillable = [
		'item_id',
		'user_id',
		'quantity'
	];

	public function item()
	{
		return $this->belongsTo(Item::class);
	}

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
