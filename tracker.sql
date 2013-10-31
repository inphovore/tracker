CREATE TABLE `tracking_table` (
 
`id` int(11) unsigned NOT NULL AUTO_INCREMENT,
`url` varchar(440) DEFAULT NULL,
`page` varchar(440) DEFAULT NULL,
`data` varchar(440) DEFAULT NULL,
`optout` varchar(1) DEFAULT NULL,
`use_date` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP,
 
PRIMARY KEY (`id`)
 
);
