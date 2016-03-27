<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreProductCategory extends Model
{
    protected $fillable = [
		'active',
		'store_id',
		'product_category_id',
    ];
}
