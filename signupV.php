<?php 
   $pagetitle="Home";
   include 'header.html'; 
?>

    <h2>Search Events By Tag</h2>
    <form method="POST" action="search.php">
      <fieldset>
      <legend>Search for specific event by:</legend>
			<input type="radio" name="Search" value="Charity" checked> Charity 
			<input type="radio" name="Search" value="Tag"> Tag 
			<input type="radio" name="Search" value="Event"> Event 
			<br>
			<label for="tagsearch">Search: </label>
      <input type="text" name="tagsearch"><br>
      <input type="submit" value="Submit">
      </fieldset>
    </form>
  </article>
  
 <?php
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "dbname", "password", "dbname");
	
	$signupTask = "INSERT INTO volunteer_task (v_id, t_id) VALUES ((SELECT id FROM volunteer WHERE email = ? AND password = ?), ?);";
	
	if (isset($_POST['vEmail']) && $_POST['vEmail'] != "" && isset($_POST['vPassword']) && $_POST['vPassword'] != "" && isset($_POST['vTask']) && $_POST['vTask'] != "") {		
		
		$signup = $mysqli->prepare($signupTask);
	
		if (!$signup) {
			print "Incorrect email and/or password: " . $signup->errno . " " . $signup->error;
		}
		if (!($signup->bind_param("ssi", $_POST['vEmail'], $_POST['vPassword'], $_POST['vTask']))) {
			print "Incorrect email and/or password: " . $signup->errno . " " . $signup->error;
		}
	
		if (!$signup->execute()) {
			print "Incorrect email and/or password: " . $signup->errno . " " . $signup->error;
		} else {
			echo "Added " . $signup->affected_rows . " row(s).";
			
			
		}
		
		$signup->close();
	}
?>
