<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_advertisement
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die('Restricted access');

class com_advertisementInstallerScript
{
	function install($parent) 
	{
		$parent->getParent()->setRedirectURL('index.php?option=com_advertisement');
	}

	function uninstall($parent) 
	{
		echo '<p>' . JText::_('COM_ADVERTISEMENT_UNINSTALL_TEXT') . '</p>';
	}

	function update($parent) 
	{
		echo '<p>' . JText::sprintf('COM_ADVERTISEMENT_UPDATE_TEXT', $parent->get('manifest')->version) . '</p>';
	}

	function preflight($type, $parent) 
	{
		echo '<p>' . JText::_('COM_ADVERTISEMENT_PREFLIGHT_' . $type . '_TEXT') . '</p>';
	}

	function postflight($type, $parent) 
	{
		echo '<p>' . JText::_('COM_ADVERTISEMENT_POSTFLIGHT_' . $type . '_TEXT') . '</p>';
	}
}