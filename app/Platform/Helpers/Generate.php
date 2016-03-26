<?php

namespace App\Platform\Helpers;

use Ramsey\Uuid\Uuid;

class Generate
{
	public static function uid()
	{
		$uid = Uuid::uuid1();

    	return str_replace('-', '', $uid->toString());
	}

	public static function pin()
	{
		return (string) rand(1000, 9999);
	}
}