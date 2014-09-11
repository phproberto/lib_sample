<?php
/**
 * @package     Sample.Library
 * @subpackage  Field
 *
 * @copyright   Copyright (C) 2013 Roberto Segura. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE
 */

defined('_JEXEC') or die;

JFormHelper::loadFieldClass('list');

/**
 * Sample list form field
 *
 * @package     Sample.Library
 * @subpackage  Field
 * @since       1.0
 */
class SampleFormFieldList extends JFormFieldList
{
	/**
	 * The form field type.
	 *
	 * @var  string
	 */
	protected $type = 'Sample';

	/**
	 * Cached array of the category items.
	 *
	 * @var  array
	 */
	protected static $options = array();

	/**
	 * Available predefined options
	 *
	 * @var  array
	 */
	protected $predefinedOptions = array(
		1 => 'LIB_SAMPLE_FIELD_SAMPLE_OPTION1',
		2 => 'LIB_SAMPLE_FIELD_SAMPLE_OPTION2'
	);

	/**
	 * Translate options labels ?
	 *
	 * @var  boolean
	 */
	protected $translate = true;

	/**
	 * Method to get the options to populate list
	 *
	 * @return  array  The field option objects.
	 */
	protected function getOptions()
	{
		// Hash for caching
		$hash = md5($this->element);
		$type = strtolower($this->type);

		if (!isset(static::$options[$type][$hash]) && !empty($this->predefinedOptions))
		{
			static::$options[$type][$hash] = parent::getOptions();

			$options = array();

			// Allow to only use specific values of the predefined list
			$filter = isset($this->element['filter']) ? explode(',', $this->element['filter']) : array();

			foreach ($this->predefinedOptions as $value => $text)
			{
				if (empty($filter) || in_array($value, $filter))
				{
					$text = $this->translate ? JText::_($text) : $text;

					$options[] = (object) array(
						'value' => $value,
						'text'  => $text
					);
				}
			}

			static::$options[$type][$hash] = array_merge(static::$options[$type][$hash], $options);
		}

		return static::$options[$type][$hash];
	}
}
