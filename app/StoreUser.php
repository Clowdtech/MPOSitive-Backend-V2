<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreUser extends Model
{
    protected $fillable = [
		'name',
		'store_id',
		'user_id',
    ];
}
