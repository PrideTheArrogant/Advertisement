<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_advertisement
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die('Restricted access');
 
class AdvertisementViewAdvertisement extends JViewLegacy
{
	function display($tpl = null)
	{
		$jinput = JFactory::getApplication()->input;
		$id     = $jinput->get('id', 1, 'INT');

		$this->id = $id;
		$this->rows = $this->get('Item');
		$this->count = round((count($this->rows)/10)+1);
		$this->link = "index.php?option=com_advertisement";

		if (count($errors = $this->get('Errors')))
		{
			JLog::add(implode('<br />', $errors), JLog::WARNING, 'jerror');

			return false;
		}

		parent::display($tpl);
	}
}