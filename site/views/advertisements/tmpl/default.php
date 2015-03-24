<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_advertisement
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die('Restricted access');
?>

<div id="preview">

<?php
if (isset($this->item)) {
?>

	<div class="title-left">
		<?php echo $this->item->title; ?>
	</div>
	<div class="title-right">
		<?php echo JText::_('COM_ADVERTISEMENT_DATE') . ": " . $this->item->date; ?>
	</div>

	<div class="content">
		<?php echo $this->item->description; ?>
	</div>
	<div class="email">
		<a href="mailto:<?php echo $this->item->email; ?>"><?php echo JText::_('COM_ADVERTISEMENT_SENDMAIL'); ?></a>
	</div>

<?php
} else {
?>
	<?php echo JText::_('COM_NO_ADVERTISEMENT'); ?>
<?php
}
?>

</div>