<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = [
		'name',
		'active',
		'user_id',
		'store_id',
    ];
}
