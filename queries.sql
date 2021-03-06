SET FOREIGN_KEY_CHECKS = 0;
TRUNCATE TABLE charity;
TRUNCATE TABLE event;
TRUNCATE TABLE task;
TRUNCATE TABLE volunteer_task;
TRUNCATE TABLE volunteer;
TRUNCATE TABLE charity_tag;
TRUNCATE TABLE tag;
SET FOREIGN_KEY_CHECKS = 1;

INSERT INTO `charity` (`name`,`founder`,`year_founded`, `email`, `password`) VALUES 
("testname","testfounder",1998,"test1@email.com", "password1"), 
("Helping Hands", "Mary Shields", 2001,"test2@email.com", "password2"), 
("Food for the Hungry", "Robert Jones", 2013,"test3@email.com", "password3");

INSERT INTO `event` (`c_id`, `name`, `information`, `time`) VALUES 
((SELECT id FROM `charity` WHERE name="testname"), "Fundraiser", "raise funds", "March 5th, noon"), 
((SELECT id FROM `charity` WHERE name="Helping Hands"), "pancake breakfast", "free pancake breakfast", "March 12th, 8AM"), 
((SELECT id FROM `charity` WHERE name="Food for the Hungry"), "free dinner", "free dinner at 5", "March 21st, 5PM");

INSERT INTO `task` (`e_id`, `name`, `description`) VALUES 
((SELECT id FROM `event` WHERE name="Fundraiser"), "taskname", "task description"), 
((SELECT id FROM `event` WHERE name="Fundraiser"), "taskname2", "task description2"), 
((SELECT id FROM `event` WHERE name="Fundraiser"), "taskname3", "task description3"), 
((SELECT id FROM `event` WHERE name="pancake breakfast"), "make pancakes", "cook and serve pancakes"), 
((SELECT id FROM `event` WHERE name="pancake breakfast"), "bring syrup", "bring delicious maple syrup"), 
((SELECT id FROM `event` WHERE name="pancake breakfast"), "make coffee", "because people want to feel awake"), 
((SELECT id FROM `event` WHERE name="free dinner"), "bring ingredients", "bring ingredients for the meal"),
((SELECT id FROM `event` WHERE name="free dinner"), "cook the meal", "make some awesome food"),
((SELECT id FROM `event` WHERE name="free dinner"), "bring dessert", "who doesn't want dessert");

INSERT INTO `volunteer` (`name`, `email`, `password`) VALUES 
("volunteer name", "volunteer@email.com", "superman1"), 
("Betsy Smith", "bs4700@gmail.com", "password"), 
("Bob Stanley", "bob46325@hotmail.com", "ilovecats");

INSERT INTO `tag` (`name`) VALUES 
("tag Name"), 
("Hunger"), 
("Homelessness");

INSERT INTO `volunteer_task` (`v_id`, `t_id`) VALUES 
((SELECT `id` FROM `volunteer` WHERE email="volunteer@email.com"), (SELECT `id` FROM `task` WHERE name="taskname")),
((SELECT `id` FROM `volunteer` WHERE email="bs4700@gmail.com"), (SELECT `id` FROM `task` WHERE name="make pancakes")),
((SELECT `id` FROM `volunteer` WHERE email="bob46325@hotmail.com"), (SELECT `id` FROM `task` WHERE name="bring ingredients"));

INSERT INTO `charity_tag` (`c_id`, `t_id`) VALUES 
((SELECT `id` FROM `charity` WHERE name="testname"), (SELECT `id` FROM `tag` WHERE name="tag Name")), 
((SELECT `id` FROM `charity` WHERE name="Food for the Hungry"), (SELECT `id` FROM `tag` WHERE name="Hunger")), 
((SELECT `id` FROM `charity` WHERE name="Helping Hands"), (SELECT `id` FROM `tag` WHERE name="Homelessness"));

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

SELECT * from `charity`;

SELECT * from `event`;

SELECT * from `task`;

SELECT * from `volunteer`;

SELECT * from `tag`;

SELECT * FROM `volunteer_task`;

SELECT * FROM `charity_tag`;
