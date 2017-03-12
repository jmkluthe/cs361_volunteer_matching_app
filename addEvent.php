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
    
    //query to get charity id
    #echo "email: " . $_POST['email'];
    
    $query = "SELECT id FROM charity WHERE name=" . $_POST['name'];
    if(!($stmt = $mysqli->prepare($query))){
        echo "Prepare failed: " . $mysqli->errno . " " . $mysqli->error;
    }
    #if(!($stmt->bind_param("s", $_POST['email']))){
    #    echo "Bind failed: " . $mysqli->errno . " " . $mysqli->error;
    #}
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