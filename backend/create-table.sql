CREATE TABLE IF NOT EXISTS `cities` (
    `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `coordinate` point NOT NULL,
  PRIMARY KEY (`id`)
);