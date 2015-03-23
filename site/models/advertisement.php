<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_advertisement
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die('Restricted access');

class AdvertisementModelAdvertisement extends JModelItem
{
	protected $item;

	protected function populateState()
	{
		$jinput = JFactory::getApplication()->input;
		$id     = $jinput->get('id', 1, 'INT');
		$this->setState('message.id', $id);
		$this->setState('params', JFactory::getApplication()->getParams());

		parent::populateState();
	}

	public function getTable($type = 'Advertisement', $prefix = 'AdvertisementTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	public function getItem()
	{
		if (!isset($this->rows))
		{
			$id    = $this->getState('message.id');
			$db    = JFactory::getDbo();
			$query = $db->getQuery(true);
			$query->select('*') ->from('#__advertisement');
			$db->setQuery($query);
			$result = $db->loadAssocList();
		}

		return $result;
	}
}