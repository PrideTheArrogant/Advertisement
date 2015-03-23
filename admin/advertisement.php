<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_advertisement
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die('Restricted access');

$document = JFactory::getDocument();

if (!JFactory::getUser()->authorise('core.manage', 'com_advertisement'))
{
	return JError::raiseWarning(404, JText::_('JERROR_ALERTNOAUTHOR'));
}

JLoader::register('AdvertisementHelper', JPATH_COMPONENT . '/helpers/advertisement.php');

$controller = JControllerLegacy::getInstance('Advertisement');

$input = JFactory::getApplication()->input;
$controller->execute($input->getCmd('task'));

$controller->redirect();