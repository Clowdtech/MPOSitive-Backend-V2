<?php

namespace App\Platform\Validators;

use Exception;
use App\Platform\Repositories\StoreRepo;

class StoreValidator
{
	protected $storeRepo;

	public function __construct() {
		$this->storeRepo = new StoreRepo;
	}

	public function userIsSet()
	{
		if (!is_object($this->user)) {
			throw new Exception('user has to be set before setting the name.');
		}

		return true;
	}

	public function slugIsUsed($slug)
	{
		if (!is_null($this->storeRepo->findBySlug($this->user->id, $slug)))
			throw new Exception(str_replace('-', ' ', $slug) . ' store name is already in use.');
			
		return false;
	}
}