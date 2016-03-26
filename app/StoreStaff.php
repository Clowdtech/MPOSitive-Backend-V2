<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StoreStaff extends Model
{
	protected $table = 'store_staff';

    protected $fillable = [
		'store_id',
		'staff_id',
    ];
}
