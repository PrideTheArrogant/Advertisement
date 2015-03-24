<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_advertisement
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die('Restricted access');

class AdvertisementModelAdvertisements extends JModelItem
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
		if (!isset($this->item)) 
		{
			$id    = $this->getState('message.id');
			$db    = JFactory::getDbo();
			$query = $db->getQuery(true);
			$query->select('h. title, h.description, DATE_FORMAT(h.date, "%d-%m-%Y") as date, h.email, h.params, c.title as category')
				  ->from('#__advertisement as h')
				  ->leftJoin('#__categories as c ON h.catid=c.id')
				  ->where('h.id=' . (int)$id);
			$db->setQuery((string)$query);

			if ($this->item = $db->loadObject()) 
			{
				$params = new JRegistry;
				$params->loadString($this->item->params, 'JSON');
				$this->item->params = $params;

				$params = clone $this->getState('params');
				$params->merge($this->item->params);
				$this->item->params = $params;
			}
		}
		return $this->item;
	}
}