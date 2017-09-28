<?php

/**
 * Handle HTML functions
 *
 * @category   Model
 * @author     Jen
 */

namespace Slowpoke;

use Symfony\Component\HttpFoundation\Request;
use DOMDocument;
use ErrorException;

class HtmlParse
{
	/**
	 * Parse HTML through DOMDocument
	 *
	 * @param string $html
	 * @return string
	 */
	public function parse($html)
	{
		set_error_handler(function($errno, $errstr, $errfile, $errline)
		{
			if (error_reporting()) { // skip errors that were muffled
				throw new ErrorException($errstr, $errno, 0, $errfile, $errline);
			}
		});
		
		try {
			
			$dom = new DOMDocument();
			$loaded = $dom->loadHTML($html);
			
		} catch (ErrorException $e) {
			
			return $e->getMessage();
		}
		
		return 'HTML loaded successfully!';
	}	
}
