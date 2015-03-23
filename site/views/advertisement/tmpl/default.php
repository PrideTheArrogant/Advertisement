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

<div class="pages">
Pagine: 

<?php
for ($i=1; $i<=$this->count; $i++) {
	if ($i!=$this->id) echo "<a href=" .$this->link . "&id=" . $i . ">";

	echo $i;

	if ($i!=$this->id) echo "</a>";

	if ($i!=$this->count) {
	 echo " - ";
	}
}
?>

</div>

<?php
foreach ($this->rows as $row) {
	if ($row['id']>=(($this->id-1)*10)+1 && $row['id']<=$this->id*10) {
	$date = date("d-m-Y", strtotime($row['date']));
	$content = substr($row['description'], 0, 500);

	if (strlen($row['description'])>500) {
		$content .= "...";
	}
?>

<div id="preview">
	<div class="title-left">
		<a href="<?php echo $this->link . "&view=advertisements&id=" . $row['id']; ?>"><?php echo $row['title']; ?></a>
	</div>
	<div class="title-right">
		<?php echo "Data Pubblicazione: " . $date; ?>
	</div>

	<div class="content">
		<?php echo $content; ?>
	</div>
</div>

<?php
	}
}
?>

<div class="pages">
Pagine: 

<?php
for ($i=1; $i<=$this->count; $i++) {
	if ($i!=$this->id) echo "<a href=" .$this->link . "&id=" . $i . ">";

	echo $i;

	if ($i!=$this->id) echo "</a>";

	if ($i!=$this->count) {
	 echo " - ";
	}
}
?>

</div>