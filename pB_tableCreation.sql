


CREATE TABLE `charity` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(255),
`founder` varchar(255),
`year_founded` varchar(255),
PRIMARY KEY (`id`)
)ENGINE=InnoDB;

CREATE TABLE `event` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`cid` int(11) NOT NULL,
`name` varchar(255),
`information` varchar(255),
`time` varchar(255),
PRIMARY KEY (`id`),
FOREIGN KEY (`cid`) REFERENCES `charity` (`id`)
)ENGINE=InnoDB;

CREATE TABLE `task` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`eid` int(11) NOT NULL,
`name` varchar(255),
`description` varchar(255),
PRIMARY KEY (`id`),
FOREIGN KEY (`eid`) REFERENCES `event` (`id`)
)ENGINE=InnoDB;

CREATE TABLE `volunteer` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(255),
`email` varchar(255),
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
FOREIGN KEY (`v_id`) REFERENCES `volunteer` (`id`),
FOREIGN KEY (`t_id`) REFERENCES `task` (`id`)
)ENGINE=InnoDB;

CREATE TABLE `charity_tag` (
`c_id` int(11) NOT NULL,
`t_id` int(11) NOT NULL,
PRIMARY KEY(`c_id`,`t_id`),
FOREIGN KEY (`c_id`) REFERENCES `charity` (`id`),
FOREIGN KEY (`t_id`) REFERENCES `tag` (`id`)
)ENGINE=InnoDB;