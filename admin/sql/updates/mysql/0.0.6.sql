DROP TABLE IF EXISTS `#__advertisement`;

CREATE TABLE `#__advertisement` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`description` TEXT NOT NULL,
	`published` tinyint(4) NOT NULL,
	PRIMARY KEY (`id`)
)
	ENGINE =MyISAM
	AUTO_INCREMENT =0
	DEFAULT CHARSET =utf8;