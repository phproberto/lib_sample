<?php
/**
 * @package     Sample
 * @subpackage  Library
 *
 * @copyright   Copyright (C) 2013 Roberto Segura. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

namespace Phproberto\Sample\Helper;

defined('_JEXEC') or die;

/**
 * Just a dummy class
 *
 * @since  __DEPLOY_VERSION__
 */
class Dummy
{
	/**
	 * Sample dummy method
	 *
	 * @param   mixed  $bar  Variable to output
	 *
	 * @return  void
	 */
	public function foo($bar)
	{
		echo '<pre>';
		var_dump($bar);
		echo '</pre>';
	}
}
