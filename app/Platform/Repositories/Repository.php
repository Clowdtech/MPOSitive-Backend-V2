<?php


namespace App\Platform\Repositories;

use Exception;

class Repository
{
	public function __construct() {}

	protected function ifNotEmpty($data, $message = 'Exception thrown Repository class.')
	{
		if (is_null($data))
		{
			throw new Exception($message);
		}

		return $data;
	}
}