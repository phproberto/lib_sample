<?php
/**
 * @package     Sample.Library
 * @subpackage  Helper
 *
 * @copyright   Copyright (C) 2013 Roberto Segura. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die;

/**
 * Asset helper
 *
 * @package     Sample.Library
 * @subpackage  Helper
 * @since       1.0
 */
abstract class SampleHelperAsset extends JHtml
{
	/**
	 * Includes assets from media directory, looking in the
	 * template folder for a style override to include.
	 *
	 * @param   string  $filename   Path to file.
	 * @param   string  $extension  Current extension name. Will auto detect component name if null.
	 * @param   array   $attribs    Extra attribs array
	 *
	 * @return  mixed  False if asset type is unsupported, nothing if a css or js file, and a string if an image
	 */
	public static function load($filename, $extension = null, $attribs = array())
	{
		if (is_null($extension))
		{
			$extensionParts = explode(DIRECTORY_SEPARATOR, JPATH_COMPONENT);
			$extension = array_pop($extensionParts);
		}

		$toLoad = "$extension/$filename";

		// Discover the asset type from the file name
		$type = substr($filename, (strrpos($filename, '.') + 1));

		switch (strtoupper($type))
		{
			case 'CSS':
				return self::stylesheet($toLoad, $attribs, true, false);
				break;
			case 'JS':
				return self::script($toLoad, false, true);
				break;
			case 'GIF':
			case 'JPG':
			case 'JPEG':
			case 'PNG':
			case 'BMP':
				$alt = null;

				if (isset($attribs['alt']))
				{
					$alt = $attribs['alt'];
					unset($attribs['alt']);
				}

				return self::image($toLoad, $alt, $attribs, true);
				break;
			default:
				return false;
		}
	}
}
