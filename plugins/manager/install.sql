CREATE TABLE IF NOT EXISTS `rex_xform_table` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` tinyint(4) NOT NULL,
  `table_name` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `list_amount` tinyint(3) unsigned NOT NULL DEFAULT 50,
  `prio` int(11) NOT NULL,
  `search` tinyint(4) NOT NULL,
  `hidden` tinyint(4) NOT NULL,
  `export` tinyint(4) NOT NULL,
  `import` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

ALTER TABLE `rex_xform_table` CHANGE `prio` `prio` INT NOT NULL;

CREATE TABLE IF NOT EXISTS `rex_xform_field` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `table_name` varchar(255) NOT NULL,
  `prio` int(11) NOT NULL,
  `type_id` varchar(255) NOT NULL,
  `type_name` varchar(255) NOT NULL,
  `f1` text NOT NULL,
  `f2` text NOT NULL,
  `f3` text NOT NULL,
  `f4` text NOT NULL,
  `f5` text NOT NULL,
  `f6` text NOT NULL,
  `f7` text NOT NULL,
  `f8` text NOT NULL,
  `f9` text NOT NULL,
  `list_hidden` tinyint(4) NOT NULL,
  `search` tinyint(4) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;

ALTER TABLE `rex_xform_field` CHANGE `prio` `prio` INT NOT NULL;

CREATE TABLE IF NOT EXISTS `rex_xform_relation` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  `source_table` VARCHAR( 255 ) NOT NULL ,
  `source_name` VARCHAR( 255 ) NOT NULL ,
  `source_id` INT NOT NULL ,
  `target_table` VARCHAR( 255 ) NOT NULL ,
  `target_id` INT NOT NULL
) ENGINE=MyISAM  DEFAULT CHARSET=utf8;


