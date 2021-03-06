<?php
   $pagetitle="Event Added";
   include 'header.html'; 

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
<h3>Add Event</h3>
<?php
    
    //query to get charity id
    if(!($stmt = $mysqli->prepare("SELECT id FROM charity WHERE email = ?"))){
        echo "Prepare failed: " . $mysqli->errno . " " . $mysqli->error;
    }
    if(!($stmt->bind_param("s", $_POST['email']))){
        echo "Bind failed: " . $mysqli->errno . " " . $mysqli->error;
    }
    if(!$stmt->execute()){
        echo "Execute failed: " . $mysqli->errno . " " . $mysqli->error;
    }    
    if(!$stmt->bind_result($charity_id)){
        echo "Bind failed: " . $mysqli->errno . " " . $mysqli->error;
    }
    
    $stmt->fetch();
    
    $stmt->close();    
    
    //query for insert into event
    if($charity_id != NULL) {
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
           echo "<p>Event successfully created.</p>";
        }    
        $stmt->close();
    } else {
        echo "<p>That email address did not match a registered charity. Please try again.</p>";
    }
?>