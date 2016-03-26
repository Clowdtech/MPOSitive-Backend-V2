<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    protected $fillable = [
    	'uid', 'name', 'address', 'latitude', 'longitude', 'user_id', 'category_id'
    ];
}
