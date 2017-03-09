

SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS charity;
DROP TABLE IF EXISTS event;
DROP TABLE IF EXISTS task;
DROP TABLE IF EXISTS volunteer_task;
DROP TABLE IF EXISTS volunteer;
DROP TABLE IF EXISTS charity_tag;
DROP TABLE IF EXISTS tag;
SET FOREIGN_KEY_CHECKS = 1;

CREATE TABLE `charity` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(255) UNIQUE,
`founder` varchar(255),
`year_founded` varchar(255),
PRIMARY KEY (`id`)
)ENGINE=InnoDB;

CREATE TABLE `event` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`c_id` int(11) NOT NULL,
`name` varchar(255) UNIQUE,
`information` varchar(255),
`time` varchar(255),
PRIMARY KEY (`id`),
FOREIGN KEY (`c_id`) REFERENCES `charity` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE `task` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`e_id` int(11) NOT NULL,
`name` varchar(255),
`description` varchar(255),
PRIMARY KEY (`id`),
FOREIGN KEY (`e_id`) REFERENCES `event` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE `volunteer` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(255),
`email` varchar(255) UNIQUE,
PRIMARY KEY (`id`)
)ENGINE=InnoDB;

CREATE TABLE `tag` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(255),
PRIMARY KEY (`id`)
)ENGINE=InnoDB;

CREATE TABLE `volunteer_task` (
`v_id` int(11) NOT NULL,
`t_id` int(11) NOT NULL,
PRIMARY KEY(`v_id`,`t_id`),
FOREIGN KEY (`v_id`) REFERENCES `volunteer` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (`t_id`) REFERENCES `task` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;

CREATE TABLE `charity_tag` (
`c_id` int(11) NOT NULL,
`t_id` int(11) NOT NULL,
PRIMARY KEY(`c_id`,`t_id`),
FOREIGN KEY (`c_id`) REFERENCES `charity` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
FOREIGN KEY (`t_id`) REFERENCES `tag` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
)ENGINE=InnoDB;
