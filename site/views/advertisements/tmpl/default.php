<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_advertisement
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die('Restricted access');

$date = date("d-m-Y", strtotime($this->item->date));
?>

<div id="preview">
	<div class="title-left">
		<?php echo $this->item->title; ?>
	</div>
	<div class="title-right">
		<?php echo "Data Pubblicazione: " . $date; ?>
	</div>

	<div class="content">
		<?php echo $this->item->description; ?>
	</div>
	<div class="email">
		<a href="mailto:<?php echo $this->item->email; ?>">Invia Curriculum</a>
	</div>
</div>