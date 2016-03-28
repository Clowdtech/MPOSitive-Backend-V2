<?php

namespace App\Platform\Validators;


class StoreValidator
{
	public function isSLugUsed($slug)
	{
		$storerepo = new \App\Platform\Repositories\StoreRepo;
		dd($storerepo->findBySlug($slug));
	}
}