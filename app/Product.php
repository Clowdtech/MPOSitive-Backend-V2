<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
    	'uid',
		'name',
		'background_color',
		'font_color',
		'price',
		'created_by',
    ];

    public function createdBy()
    {
    	return $this->hasOne(\App\User::class, 'id', 'created_by');
    }
}
