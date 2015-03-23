<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_advertisement
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die('Restricted access');

class AdvertisementModelAdvertisement extends JModelAdmin
{
	public function getTable($type = 'Advertisement', $prefix = 'AdvertisementTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

	public function getForm($data = array(), $loadData = true)
	{
		$form = $this->loadForm(
			'com_advertisement.advertisement',
			'advertisement',
			array(
				'control' => 'jform',
				'load_data' => $loadData
			)
		);

		if (empty($form))
		{
			return false;
		}

		return $form;
	}

	public function getScript()
	{
		return 'administrator/components/com_advertisement/models/forms/advertisement.js';
	}

	protected function loadFormData()
	{
		$data = JFactory::getApplication()->getUserState(
			'com_advertisement.edit.advertisement.data',
			array()
		);

		if (empty($data))
		{
			$data = $this->getItem();
		}

		return $data;
	}

	protected function canDelete($record)
	{
		if( !empty( $record->id ) )
		{
			return JFactory::getUser()->authorise( "core.delete", "com_advertisement.message." . $record->id );
		}
	}
}