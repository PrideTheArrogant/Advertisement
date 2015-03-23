<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_advertisement
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die('Restricted access');

class JFormRuleTitle extends JFormRule
{
	protected $regex = '^[A-Za-z0-9 _]*[A-Za-z0-9][A-Za-z0-9 _]*$';
}