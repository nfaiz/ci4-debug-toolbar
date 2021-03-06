<?php 

namespace Nfaiz\DebugToolbar\Config;

use Config\Services as BaseService;

class Services extends BaseService
{
	// Deprecated. Will remove later

	public static function highlighter(bool $getShared = true)
	{
		if ($getShared)
		{
			return self::getSharedInstance('highlighter');
		}

		return new \Nfaiz\DebugToolbar\Utilities\Highlighter();
	}
}