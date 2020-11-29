<?php

namespace ContactApp\Facades;

use Illuminate\Support\Facades\Facade;

class ContactApp extends Facade
{

	protected static function getFacadeAccessor()
	{
		return 'ContactApp';
	}
}