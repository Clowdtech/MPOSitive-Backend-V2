<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = [
		'name',
		'pin',
		'user_id',
    ];
}
