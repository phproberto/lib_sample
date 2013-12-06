<?php
/**
 * @package     Sample.Library
 * @subpackage  Helper
 *
 * @copyright   Copyright (C) 2013 Roberto Segura. All rights reserved
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die;

/**
 * Sample class with dummy functions
 *
 * @package     Sample.Library
 * @subpackage  Helper
 * @since       1.0
 */
abstract class SampleHelperNumbers
{
	/**
	 * Convert associative array into attributes.
	 *
	 * @param   mixed  $numbers  Number or array of numbers to sum up
	 *
	 * @return  string
	 */
	public static function sum($numbers)
	{
		return array_sum((array) $numbers);
	}
}
