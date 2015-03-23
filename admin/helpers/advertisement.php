<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_advertisement
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die('Restricted access');

abstract class AdvertisementHelper
{
	public static function addSubmenu($submenu) 
	{
		JSubMenuHelper::addEntry(
			JText::_('COM_ADVERTISEMENT_SUBMENU_MESSAGES'),
			'index.php?option=com_advertisement',
			$submenu == 'messages'
		);

		JSubMenuHelper::addEntry(
			JText::_('COM_ADVERTISEMENT_SUBMENU_CATEGORIES'),
			'index.php?option=com_categories&view=categories&extension=com_advertisement',
			$submenu == 'categories'
		);

		$document = JFactory::getDocument();

		if ($submenu == 'categories') 
		{
			$document->setTitle(JText::_('COM_ADVERTISEMENT_ADMINISTRATION_CATEGORIES'));
		}
	}

	public static function getActions($messageId = 0)
	{
		$result	= new JObject; 

		if (empty($messageId))
		{
			$assetName = 'advertisement';
		} else {
			$assetName = 'com_advertisement.message.'.(int) $messageId;
		}

		$actions = JAccess::getActions('com_advertisement', 'component');

		foreach ($actions as $action) {
			$result->set($action->name, JFactory::getUser()->authorise($action->name, $assetName));
		}

		return $result;
	}
}