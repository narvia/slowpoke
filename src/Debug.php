<?php

/**
 * Debug to file
 *
 * @category   Model
 * @author     Jen
 */
 
namespace Slowpoke;

class Debug
{
	/**
	 * Add debug data to file
	 * Logged by date
	 *
	 * @param mixed $data
	 */
	public static function write($data)
	{
		file_put_contents('/tmp/slowpoke.debug.log', '['.date("Y-m-d").'] '.print_r($data, true)."\n", FILE_APPEND);
	}
}