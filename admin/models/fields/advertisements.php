<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_advertisement
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die('Restricted access');
 
JFormHelper::loadFieldClass('list');

class JFormFieldAdvertisements extends JFormFieldList
{
	protected $type = 'Advertisement';

	protected function getOptions()
	{
		$db    = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('id,  title');
		$query->from('#__advertisement');
		$query->where('#__advertisement.published = 1');
		$db->setQuery((string) $query);
		$messages = $db->loadObjectList();
		$options  = array();

		if ($messages)
		{
			foreach ($messages as $message)
			{
				$options[] = JHtml::_('select.option', $message->id . ' - ' . $message->title);
			}
		}

		$options = array_merge(parent::getOptions(), $options);
 
		return $options;
	}
}