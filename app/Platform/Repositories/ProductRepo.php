<?php

namespace App\Platform\Repositories;

use App\Product as Model;
use App\Platform\Domains\Product as Domain;

class ProductRepo
{
	public function first()
	{
		return Model::first();
	}

	public function create(Domain $product)
	{
		return Model::create([
			'uid'	=>	$product->uid,
			'name'	=>	$product->name,
			'background_color'	=>	$product->backgroundColor,
			'font_color'	=>	$product->fontColor,
			'price'	=>	$product->price,
			'category_id'	=>	$product->category->id,
			'created_by'	=>	$product->user->id,
		]);
	}
}