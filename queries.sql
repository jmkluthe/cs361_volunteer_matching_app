

INSERT INTO `charity` (`name`,`founder`,`year_founded`) VALUES ("testname","testfounder",1998);

SELECT * from `charity`;

INSERT INTO `event` (`cid`, `name`, `information`, `time`) VALUES ((SELECT id FROM `charity` WHERE name="testname"), "Fundraiser", "raise funds", "March 5th, noon");

SELECT * from `event`;

INSERT INTO `task` (`eid`, `name`, `description`) VALUES ((SELECT id FROM `event` WHERE name="Fundraiser"), "taskname", "task description")

SELECT * from `task`;

INSERT INTO `volunteer` (`name`, `email`) VALUES ("volunteer name", "volunteer@email.com");

SELECT * from `volunteer`;

INSERT INTO `tag` (`name`) VALUES ("tag Name");

SELECT * from `tag`;


SET FOREIGN_KEY_CHECKS = 0;
DROP TABLE IF EXISTS charity;
DROP TABLE IF EXISTS event;
DROP TABLE IF EXISTS task;
DROP TABLE IF EXISTS volunteer_task;
DROP TABLE IF EXISTS volunteer;
DROP TABLE IF EXISTS charity_tag;
DROP TABLE IF EXISTS tag;
SET FOREIGN_KEY_CHECKS = 1;