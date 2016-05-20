<?php
/**
 * @package     Sample
 * @subpackage  Library
 *
 * @copyright   Copyright (C) 2013 Roberto Segura. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

namespace Phproberto\Sample;

defined('_JEXEC') or die;

use Monolog\Logger;
use Phproberto\Sample\Monolog\PhpfileHandler;

/**
 * Sample factory
 *
 * @since  __DEPLOY_VERSION__
 */
class App
{
	/**
	 * Get the log
	 *
	 * @var    \Monolog\Logger
	 */
	private static $log;

	/**
	 * Get the log
	 *
	 * @return  \Monolog\Logger
	 *
	 * @throws  \RuntimeException  Log folder does not exist or is not writable
	 */
	public static function getLog()
	{
		if (null === static::$log)
		{
			$logDir = \JFactory::getConfig()->get('log_path');

			if (!is_writable($logDir))
			{
				throw new \RuntimeException("Cannot write to log folder. Check configuration");
			}

			$log = new Logger('sample');
			$log->pushHandler(new PhpfileHandler($logDir . '/sample.error.php', Logger::ERROR));

			static::$log = $log;
		}

		return static::$log;
	}
}
