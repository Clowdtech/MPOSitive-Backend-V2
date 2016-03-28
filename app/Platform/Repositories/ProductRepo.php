<?php

namespace App\Platform\Repositories;

use App\Product as Model;
use App\Platform\Domains\Product as Domain;

use App\Platform\Repositories\Repository;

class ProductRepo extends Repository
{
	public function __construct()
	{
		parent::__construct();
	}

	public function find($id)
	{
		$data = Model::where('id', $id)->first();

		return $this->ifNotEmpty($data, 'Couldn\'t find a product with the id ' . $id . '.');
	}

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
			'created_by'	=>	$product->user->id,
		]);
	}
}