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
?>