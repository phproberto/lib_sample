<?php
/**
 * @package     Sample.Library
 * @subpackage  Html
 *
 * @copyright   Copyright (C) 2013 Roberto Segura. All rights reserved.
 * @license     GNU General Public License version 2 or later, see LICENSE.
 */

defined('_JEXEC') or die;

/**
 * Html css class.
 *
 * @package     Sample.Library
 * @subpackage  Html
 * @since       1.0
 */
abstract class JHtmlSample
{
	/**
	 * Extension name to use in the asset calls
	 * Basically the media/com_xxxxx folder to use
	 */
	const EXTENSION = 'sample';

	/**
	 * Array containing information for loaded files
	 *
	 * @var  array
	 */
	protected static $loaded = array();

	/**
	 * Load fontawesome 4.
	 *
	 * @return  void
	 */
	public static function fontawesome()
	{
		if (!empty(static::$loaded[__METHOD__]))
		{
			return;
		}

		SampleHelperAsset::load('vendor/font-awesome/font-awesome.min.css', self::EXTENSION);

		static::$loaded[__METHOD__] = true;
	}
}
