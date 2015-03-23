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
	protected $form;
	protected $item;
	protected $script;
	protected $canDo;

	public function display($tpl = null)
	{
		$this->form = $this->get('Form');
		$this->item = $this->get('Item');
		$this->script = $this->get('Script');

		$this->canDo = AdvertisementHelper::getActions($this->item->id);

		if (count($errors = $this->get('Errors')))
		{
			JError::raiseError(500, implode('<br />', $errors));

			return false;
		}

		$this->addToolBar();

		parent::display($tpl);

		$this->setDocument();
	}

	protected function addToolBar()
	{
		$input = JFactory::getApplication()->input;

		$input->set('hidemainmenu', true);

		$isNew = ($this->item->id == 0);

		JToolBarHelper::title($isNew ? JText::_('COM_ADVERTISEMENT_MANAGER_ADVERTISEMENT_NEW') : JText::_('COM_ADVERTISEMENT_MANAGER_ADVERTISEMENT_EDIT'), 'advertisement');

		if ($isNew)
		{
			if ($this->canDo->get('core.create'))
			{
				JToolBarHelper::apply('advertisement.apply', 'JTOOLBAR_APPLY');
				JToolBarHelper::save('advertisement.save', 'JTOOLBAR_SAVE');
				JToolBarHelper::custom('advertisement.save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', false);
			}
	
			JToolBarHelper::cancel('advertisement.cancel', 'JTOOLBAR_CANCEL');
		}
		else
		{
			if ($this->canDo->get('core.edit'))
			{
				JToolBarHelper::apply('advertisement.apply', 'JTOOLBAR_APPLY');
				JToolBarHelper::save('advertisement.save', 'JTOOLBAR_SAVE');
	
				if ($this->canDo->get('core.create'))
				{
					JToolBarHelper::custom('advertisement.save2new', 'save-new.png', 'save-new_f2.png', 'JTOOLBAR_SAVE_AND_NEW', false);
				}
			}

			if ($this->canDo->get('core.create'))
			{
				JToolBarHelper::custom('advertisement.save2copy', 'save-copy.png', 'save-copy_f2.png', 'JTOOLBAR_SAVE_AS_COPY', false);
			}

			JToolBarHelper::cancel('advertisement.cancel', 'JTOOLBAR_CLOSE');
		}
	}

	protected function setDocument()
	{
		$isNew = ($this->item->id < 1);
		$document = JFactory::getDocument();
		$document->setTitle($isNew ? JText::_('COM_ADVERTISEMENT_ADVERTISEMENT_CREATING') : JText::_('COM_ADVERTISEMENT_ADVERTISEMENT_EDITING'));
		$document->addScript(JURI::root() . $this->script);
		$document->addScript(JURI::root() . "/administrator/components/com_advertisement" . "/views/advertisement/submitbutton.js");
		JText::script('COM_ADVERTISEMENT_ADVERTISEMENT_ERROR_UNACCEPTABLE');
	}
}