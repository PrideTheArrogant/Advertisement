<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_advertisement
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die('Restricted access');

class JFormRuleEmail extends JFormRule
{
	protected $regex = '[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}';
}