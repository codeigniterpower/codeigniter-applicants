<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

// --------------------------------------------------------------------

	/**
	 * @returns BOOL true on valid countable
	 */
	if (!function_exists('is_countable')) {
		function is_countable($c) {
			$is_C = FALSE;
			if(is_array($c))
				return TRUE;
			if($c instanceof Countable)
				return TRUE;
			return FALSE;
		}
	}

?>
