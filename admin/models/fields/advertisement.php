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

class JFormFieldAdvertisement extends JFormFieldList
{
	protected $type = 'Advertisement';

	protected function getOptions()
	{
		$db    = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('#__advertisement.id as id, title, description, #__categories.title as category,catid');
		$query->from('#__advertisement');
		$query->leftJoin('#__categories on catid=#__categories.id');
		$query->where('#__advertisement.published = 1');
		$db->setQuery((string) $query);
		$messages = $db->loadObjectList();
		$options  = array();

		if ($messages)
		{
			foreach ($messages as $message)
			{
				$options[] = JHtml::_('select.option', $message->id, $message->title, $message->description . ($message->catid ? ' (' . $message->category . ')' : ''));
			}
		}

		$options = array_merge(parent::getOptions(), $options);
 
		return $options;
	}
}