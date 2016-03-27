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
		'category_id',
		'created_by',
    ];
}
