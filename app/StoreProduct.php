<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreProduct extends Model
{
    protected $fillable = [
		'qty',
		'uid',
		'store_id',
		'product_id',
		'active',
    ];
}
