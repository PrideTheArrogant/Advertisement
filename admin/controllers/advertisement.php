<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_advertisement
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die('Restricted access');

class AdvertisementControllerAdvertisement extends JControllerForm
{
	protected function allowAdd($data = array())
	{
		return parent::allowAdd($data);
	}

	protected function allowEdit($data = array(), $key = 'id')
	{
		$id = isset( $data[ $key ] ) ? $data[ $key ] : 0;

		if( !empty( $id ) )
		{
			return JFactory::getUser()->authorise( "core.edit", "com_advertisement.message." . $id );
		}
	}
}