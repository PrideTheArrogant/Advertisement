<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_advertisement
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die('Restricted access');

class AdvertisementViewAdvertisements extends JViewLegacy
{
	function display($tpl = null)
	{
		$app = JFactory::getApplication();
		$context = "advertisement.list.admin.advertisement";

		$this->items			= $this->get('Items');
		$this->pagination		= $this->get('Pagination');
		$this->state			= $this->get('State');
		$this->filter_order 	= $app->getUserStateFromRequest($context.'filter_order', 'filter_order', 'title', 'cmd');
		$this->filter_order_Dir = $app->getUserStateFromRequest($context.'filter_order_Dir', 'filter_order_Dir', 'asc', 'cmd');
		$this->filterForm    	= $this->get('FilterForm');
		$this->activeFilters 	= $this->get('ActiveFilters');

		$this->canDo = AdvertisementHelper::getActions();

		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));
 
			return false;
		}

		AdvertisementHelper::addSubmenu('advertisements');

		$this->addToolBar();

		parent::display($tpl);

		$this->setDocument();
	}

	protected function addToolBar()
	{
		$title = JText::_('COM_ADVERTISEMENT_MANAGER_ADVERTISEMENTS');

		if ($this->pagination->total)
		{
			$title .= "<span style='font-size: 0.5em; vertical-align: middle;'>(" . $this->pagination->total . ")</span>";
		}

		JToolBarHelper::title($title, 'advertisement');

		if ($this->canDo->get('core.create'))
		{
			JToolBarHelper::addNew('advertisement.add', 'JTOOLBAR_NEW');
		}
		if ($this->canDo->get('core.edit'))
		{
			JToolBarHelper::editList('advertisement.edit', 'JTOOLBAR_EDIT');
		}
		if ($this->canDo->get('core.delete'))
		{
			JToolBarHelper::deleteList('', 'advertisements.delete', 'JTOOLBAR_DELETE');
		}
		if ($this->canDo->get('core.admin'))
		{
			JToolBarHelper::divider();
			JToolBarHelper::preferences('com_advertisement');
		}
	}

	protected function setDocument()
	{
		$document = JFactory::getDocument();
		$document->setTitle(JText::_('COM_ADVERTISEMENT_ADMINISTRATION'));
	}
}