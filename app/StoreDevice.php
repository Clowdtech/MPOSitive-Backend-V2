<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreDevice extends Model
{
    protected $fillable = [
		'id',
		'brand',
		'model',
		'uid',
		'store_id',
		'created_by',
    ];
}
