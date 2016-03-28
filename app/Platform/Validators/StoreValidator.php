<?php

namespace App\Platform\Validators;

use Exception;

class StoreValidator
{
	public function __construct() {}

	public function userIsSet()
	{
		if (!is_object($this->user)) {
			throw new Exception('user has to be set before setting the name.');
		}

		return true;
	}
}