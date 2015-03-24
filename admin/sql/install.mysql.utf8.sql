DROP TABLE IF EXISTS `#__advertisement`;

CREATE TABLE `#__advertisement` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`asset_id` INT(10) NOT NULL DEFAULT '0',
	`title` VARCHAR(255) NOT NULL,
	`description` TEXT NOT NULL,
	`date` DATE,
	`email` VARCHAR(255) NOT NULL,
	`published` tinyint(4) NOT NULL,
	`catid` int(11) NOT NULL DEFAULT '0',
	`params` VARCHAR(1024) NOT NULL DEFAULT '',
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;