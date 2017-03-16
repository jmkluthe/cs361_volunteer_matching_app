<?php
   $pagetitle="Task Added";
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
<title>Task Added</title>
</head>
<body>
<h3>Task Added</h3>
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
    
    //query to get event id
    if($charity_id != NULL) {
        if(!($stmt = $mysqli->prepare("SELECT id FROM event WHERE name = ? AND c_id = ?"))){
            echo "Prepare failed: " . $mysqli->errno . " " . $mysqli->error;
        }
        if(!($stmt->bind_param("si", $_POST['eventname'], $charity_id))){
            echo "Bind failed: " . $mysqli->errno . " " . $mysqli->error;
        }
        if(!$stmt->execute()){
            echo "Execute failed: " . $mysqli->errno . " " . $mysqli->error;
        }    
        if(!$stmt->bind_result($event_id)){
            echo "Bind failed: " . $mysqli->errno . " " . $mysqli->error;
        }
        
        $stmt->fetch();
        
        $stmt->close();
    } else {
        echo "<p>That email address did not match a registered charity. Please try again.</p>";
    }
    
    
    //query for insert into event
    if($charity_id != NULL && $event_id != NULL) {
        if(!($stmt = $mysqli->prepare("INSERT INTO task(e_id, name, description) VALUES (?, ?, ?)"))){
            echo "Prepare failed: " . $mysqli->errno . " " . $mysqli->error;
        }
        if(!($stmt->bind_param("iss", $event_id, $_POST['taskname'], $_POST['taskinfo']))){
           echo "Bind failed: " . $mysqli->errno . " " . $mysqli->error;
        }
        if(!$stmt->execute()){
           echo "Execute failed: " . $mysqli->errno . " " . $mysqli->error;
        } else {
           echo "<p>Task successfully created.</p>";
        }    
        $stmt->close();
    } else {
        echo "<p>That event name did not match an event registered with the indicated charity. Please try again.</p>";
    }
?>