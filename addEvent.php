<?php
    ini_set('display_errors', 'On');
    //replace credentials as necessary
    $mysqli = new mysqli('oniddb.cws.oregonstate.edu', 'kluthej-db', 'bgT8kbH3894HObbo', 'kluthej-db');
    if($mysqli->connect_errno) {
       echo 'Error connecting to database: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
    }
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Add Event</title>
</head>
<body>
<h1>Add Event</h1>
<?php
	
	//query for insert into charity
    if(!($stmt = $mysqli->prepare("INSERT INTO charity(name, founder, year_founded, email, password) VALUES (?, ?, ?, ?, ?)"))){
        echo "Prepare failed: " . $mysqli->errno . " " . $mysqli->error;
    }
    if(!($stmt->bind_param("sssss", $_POST['name'], $_POST['founder'], $_POST['founded'], $_POST['email'], $_POST['pass']))){
        echo "Bind failed: " . $mysqli->errno . " " . $mysqli->error;
    }
    if(!$stmt->execute()){
        echo "Execute failed: " . $mysqli->errno . " " . $mysqli->error;
    } else {
        echo "Charity created!";
    }
    $stmt->close();
    
    //query to get charity id
    if(!($stmt = $mysqli->prepare("SELECT charity.id FROM charity WHERE charity.name = (?)"))){
        echo "Prepare failed: " . $mysqli->errno . " " . $mysqli->error;
    }
    if(!($stmt->bind_param("s", $_POST['name']))){
        echo "Bind failed: " . $mysqli->errno . " " . $mysqli->error;
    }
    if(!$stmt->execute()){
        echo "Execute failed: " . $mysqli->errno . " " . $mysqli->error;
    }    
    if(!$stmt->bind_result($charity_id)){
        echo "Bind failed: " . $mysqli->errno . " " . $mysqli->error;
    }
    $stmt->close();
    
    echo "charity id: " . $charity_id;
    
    //query for insert into event
    if(!($stmt = $mysqli->prepare("INSERT INTO event(c_id, name, information, time) VALUES (?, ?, ?, ?)"))){
        echo "Prepare failed: " . $mysqli->errno . " " . $mysqli->error;
    }
    $event_time = $_POST['eventdate'] . ' ' . $_POST['eventtime'];
    if(!($stmt->bind_param("isss", $charity_id, $_POST['eventname'], $_POST['eventinfo'], $event_time))){
        echo "Bind failed: " . $mysqli->errno . " " . $mysqli->error;
    }
    if(!$stmt->execute()){
        echo "Execute failed: " . $mysqli->errno . " " . $mysqli->error;
    } else {
        echo "Event created!";
    }    
    $stmt->close();
    
    

	
?>
<!--

CREATE TABLE `charity` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`name` varchar(255) UNIQUE,
`founder` varchar(255),
`year_founded` varchar(255),
`email` varchar(255) UNIQUE,
`password` varchar(255),
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

        <label for="name">Organization Name</label>
        <input name="name"
               id="name"
               type="text"
               placeholder="Charitable Organization"
               maxlength="80"/><br>

        <label for="founded">Year Founded</label>
        <input name="founded"
               id="founded"
               type="number"
               placeholder="YYYY"
               maxlength="4"/><br>

        <label for="founder">Founder Name</label>
        <input name="founder"
               id="founder"
               type="text"
               placeholder="Jesse Jackson"
               maxlength="50"/><br>
      </fieldset>
      <br>
      <fieldset>
        <legend>Event Details</legend>
        <label for="eventname">Event Name</label>
        <input name="eventname"
               id="eventname"
               type="text"
               placeholder="Party at White House"
               maxlength="100"/><br>

        <label for="eventdate">Date</label>
        <input name="eventdate"
               id="eventdate"
               type="date"
               placeholder="2011-08-01"
               maxlength="100"/><br>

        <label for="eventtime">Time</label>
        <input name="eventtime"
               id="eventtime"
               type="time"
               placeholder="12:00"
               maxlength="100"/><br>

        <label for="eventinfo">Information</label>
        <input name="eventinfo"
               id="eventinfo"
               type=text
               placeholder="more information"
               maxlength="400"/><br>
        <input type="submit">
        -->
