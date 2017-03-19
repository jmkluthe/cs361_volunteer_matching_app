<?php 
   $pagetitle="Home";
   include 'header.html'; 
?>

<?php
    ini_set('display_errors', 'On');
    //replace credentials as necessary
    $mysqli = new mysqli('oniddb.cws.oregonstate.edu', 'kluthej-db', 'bgT8kbH3894HObbo', 'kluthej-db');
    if($mysqli->connect_errno) {
       echo 'Error connecting to database: ' . $mysqli->connect_errno . ' ' . $mysqli->connect_error;
    }
?>

<?php
	
	//query for insert into charity
    if(!($stmt = $mysqli->prepare("INSERT INTO volunteer(name, email, password) VALUES (?, ?, ?)"))){
        echo "Prepare failed: " . $mysqli->errno . " " . $mysqli->error;
    }
    if(!($stmt->bind_param("sss", $_POST['vname'], $_POST['vemail'], $_POST['vpass']))){
        echo "Bind failed: " . $mysqli->errno . " " . $mysqli->error;
    }
    if(!$stmt->execute()){
        echo "Execute failed: " . $mysqli->errno . " " . $mysqli->error;
    } else {
        echo "Volunteer account created!";
    }
    $stmt->close();
?>