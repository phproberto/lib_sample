<?php
/**
 * @package     Sample
 * @subpackage  Library
 *
 * @copyright   Copyright (C) 2013 Roberto Segura. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

namespace Phproberto\Sample\Monolog;

use Monolog\Handler\StreamHandler;

/**
 * Extended StreamHandler to avoid that PHP log files can be accessed from browser
 *
 * @since  1.0.0
 */
class PhpfileHandler extends StreamHandler
{
	protected $isNewFile = false;

	/**
	 * Close the file connection
	 *
	 * @return  void
	 */
	public function close()
	{
		parent::close();

		if ($this->isNewFile)
		{
			$extension = pathinfo($this->url, PATHINFO_EXTENSION);

			if ($extension === 'php')
			{
				file_put_contents($this->url, "#\n#<?php die('Forbidden.'); ?>\n" . file_get_contents($this->url));
			}
		}
	}

	/**
	 * Write to the file
	 *
	 * @param   array  $record  Record to write
	 *
	 * @return  void
	 */
	protected function write(array $record)
	{
		$this->isNewFile = !is_resource($this->stream) && !file_exists($this->url);

		parent::write($record);
	}
}
