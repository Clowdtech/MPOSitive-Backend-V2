<?php

namespace App\Platform\Helpers;

use Ramsey\Uuid\Uuid;

class Generate
{
	/**
	 * Generates a unique identifier.
	 * 
	 * @return string
	 */
	public static function uid()
	{
		$uid = Uuid::uuid1();

    	return str_replace('-', '', $uid->toString());
	}

	/**
	 * Generates a 4 digit pin.
	 * 
	 * @return string
	 */
	public static function pin()
	{
		return (string) rand(1000, 9999);
	}
}