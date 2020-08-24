<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Order
 *
 * @property int $id
 * @property int $user_id
 * @property float $total
 * @property string $address
 * @property string $telephone
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property User $user
 *
 * @package App\Models
 */
class Order extends Model
{
	protected $table = 'orders';

	protected $casts = [
		'user_id' => 'int',
		'total' => 'float'
	];

	protected $fillable = [
		'user_id',
		'total',
		'address',
		'telephone'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
