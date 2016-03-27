<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreProduct extends Model
{
    protected $fillable = [
		'qty',
		'store_id',
		'store_id',
		'product_id',
		'active',
    ];
}
