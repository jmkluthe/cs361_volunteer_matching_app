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
    if(!($stmt = $mysqli->prepare("INSERT INTO charity(name, founder, year_founded, email, password) VALUES (?, ?, ?, ?, ?)"))){
        echo "Prepare failed: " . $mysqli->errno . " " . $mysqli->error;
    }
    if(!($stmt->bind_param("sssss", $_POST['name'], $_POST['founder'], $_POST['founded'], $_POST['email'], $_POST['pass']))){
        echo "Bind failed: " . $mysqli->errno . " " . $mysqli->error;
    }
    if(!$stmt->execute()){
        echo "Execute failed: " . $mysqli->errno . " " . $mysqli->error;
    } else {
        echo "<p>Charity account created!<p>";
    }
    $stmt->close();
    
    //select the charity id just created
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
        echo "Bind failed: " . $stmt->errno . " " . $stmt->error;
    }
    $stmt->fetch();
    $stmt->close();

    //query to create tag relationship
    if(!($stmt = $mysqli->prepare("INSERT INTO charity_tag(c_id, t_id) VALUES (?, ?)"))){
        echo "Prepare failed: " . $mysqli->errno . " " . $mysqli->error;
    }
    if(!($stmt->bind_param("ii", $charity_id, $_POST['tag_id']))){
        echo "Bind failed: " . $mysqli->errno . " " . $mysqli->error;
    }
    if(!$stmt->execute()){
        echo "Execute failed: " . $mysqli->errno . " " . $mysqli->error;
    } else {
        echo "<p>Charity to Tag relationship created!</p>";
    }
    $stmt->close();
    
    
?>