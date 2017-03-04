SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE charity;
TRUNCATE TABLE event;
TRUNCATE TABLE task;
TRUNCATE TABLE volunteer_task;
TRUNCATE TABLE volunteer;
TRUNCATE TABLE charity_tag;
TRUNCATE TABLE tag;
SET FOREIGN_KEY_CHECKS = 1;

INSERT INTO `charity` (`name`,`founder`,`year_founded`) VALUES 
("testname","testfounder",1998), 
("Helping Hands", "Mary Shields", 2001), 
("Food for the Hungry", "Robert Jones", 2013);

SELECT * from `charity`;

INSERT INTO `event` (`c_id`, `name`, `information`, `time`) VALUES 
((SELECT id FROM `charity` WHERE name="testname"), "Fundraiser", "raise funds", "March 5th, noon"), 
((SELECT id FROM `charity` WHERE name="Helping Hands"), "pancake breakfast", "free pancake breakfast", "March 12th, 8AM"), 
((SELECT id FROM `charity` WHERE name="Food for the Hungry"), "free dinner", "free dinner at 5", "March 21st, 5PM");

SELECT * from `event`;

INSERT INTO `task` (`e_id`, `name`, `description`) VALUES 
((SELECT id FROM `event` WHERE name="Fundraiser"), "taskname", "task description"), 
((SELECT id FROM `event` WHERE name="pancake breakfast"), "make pancakes", "cook and serve pancakes"), 
((SELECT id FROM `event` WHERE name="free dinner"), "bring ingredients", "bring ingredients for the meal");

SELECT * from `task`;

INSERT INTO `volunteer` (`name`, `email`) VALUES 
("volunteer name", "volunteer@email.com"), 
("Betsy Smith", "bs4700@gmail.com"), 
("Bob Stanley", "bob46325@hotmail.com");

SELECT * from `volunteer`;

INSERT INTO `tag` (`name`) VALUES 
("tag Name"), 
("Hunger"), 
("Homelessness");

SELECT * from `tag`;

INSERT INTO `volunteer_task` (`v_id`, `t_id`) VALUES 
((SELECT `id` FROM `volunteer` WHERE email="volunteer@email.com"), (SELECT `id` FROM `task` WHERE name="taskname")),
((SELECT `id` FROM `volunteer` WHERE email="bs4700@gmail.com"), (SELECT `id` FROM `task` WHERE name="make pancakes")),
((SELECT `id` FROM `volunteer` WHERE email="bob46325@hotmail.com"), (SELECT `id` FROM `task` WHERE name="bring ingredients"));

SELECT * FROM `volunteer_task`;

INSERT INTO `charity_tag` (`c_id`, `t_id`) VALUES 
((SELECT `id` FROM `charity` WHERE name="testname"), (SELECT `id` FROM `tag` WHERE name="tag Name")), 
((SELECT `id` FROM `charity` WHERE name="Food for the Hungry"), (SELECT `id` FROM `tag` WHERE name="Hunger")), 
((SELECT `id` FROM `charity` WHERE name="Helping Hands"), (SELECT `id` FROM `tag` WHERE name="Homelessness"));

SELECT * FROM `charity_tag`;

SELECT task.name FROM charity INNER JOIN
event ON event.c_id = charity.id INNER JOIN
task ON task.e_id = event.id WHERE charity.name = "Helping Hands";

SELECT volunteer.name, task.name, event.time FROM volunteer INNER JOIN
volunteer_task ON volunteer_task.v_id = volunteer.id INNER JOIN
task ON volunteer_task.t_id = task.id INNER JOIN
event ON task.e_id = event.id;

SELECT event.name, tag.name FROM event INNER JOIN
charity ON event.c_id = charity.id INNER JOIN
charity_tag ON charity_tag.c_id = charity.id INNER JOIN
tag ON charity_tag.t_id = tag.id;


