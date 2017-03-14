<?php 
   $pagetitle="Home";
   include 'header.html'; 
?>

    <h2>Search For Events</h2>
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
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "db-name", "password", "db-name");
	
	$charSearch = "";
	
	if (!$mysqli || $mysqli->connect_errno) { print "No connection: " . $mysqli->connect_errno . " " . $mysqli->connect_error; } 
	// Query the search item
	if (isset($_POST['Search']) && $_POST['Search'] == "Tag")
	{
	$charSearch = "SELECT charity.name, event.name, tag.name, task.name, event.time, task.id FROM event INNER JOIN
					charity ON event.c_id = charity.id INNER JOIN
					charity_tag ON charity_tag.c_id = charity.id INNER JOIN
					tag ON charity_tag.t_id = tag.id INNER JOIN
					task ON event.id = task.e_id
					WHERE tag.name REGEXP ? AND task.id NOT IN (SELECT volunteer_task.t_id FROM volunteer_task);";
	}
	else if (isset($_POST['Search']) && $_POST['Search'] == "Charity")
	{
	$charSearch = "SELECT charity.name, event.name, tag.name, task.name, event.time, task.id FROM event INNER JOIN
					charity ON event.c_id = charity.id INNER JOIN
					charity_tag ON charity_tag.c_id = charity.id INNER JOIN
					tag ON charity_tag.t_id = tag.id INNER JOIN
					task ON event.id = task.e_id
					WHERE charity.name REGEXP ? AND task.id NOT IN (SELECT volunteer_task.t_id FROM volunteer_task);";
	}
	else
	{
	$charSearch = "SELECT charity.name, event.name, tag.name, task.name, event.time, task.id FROM event INNER JOIN
					charity ON event.c_id = charity.id INNER JOIN
					charity_tag ON charity_tag.c_id = charity.id INNER JOIN
					tag ON charity_tag.t_id = tag.id INNER JOIN
					task ON event.id = task.e_id
					WHERE event.name REGEXP ? AND task.id NOT IN (SELECT volunteer_task.t_id FROM volunteer_task);";
	}
	if (isset($_POST['tagsearch']) && $_POST['tagsearch'] != "") {		
		$tagsrch = $mysqli->prepare($charSearch);
	
		if (!$tagsrch) {
			print "Charity/tag search query failed: " . $tagsrch->errno . " " . $tagsrch->error;
		}
		if (!($tagsrch->bind_param("s", $_POST['tagsearch']))) {
			print "Charity/tag search bind param failed: " . $tagsrch->errno . " " . $tagsrch->error;
		}
	
		if (!$tagsrch->execute()) {
			print "Charity/tag search execute failed: " . $tagsrch->errno . " " . $tagsrch->error;
		}
	
		if (!($tagsrch->bind_result($cname, $ename, $tname, $taname, $etime, $tid))) {
			print "Charity/tag search bind result failed: " . $tagsrch->errno . " " . $tagsrch->error;
		}
		print "<p>Available tasks for upcoming events: </p>";
		
		// Display the results of the search in a table
		$foundCharities = "<table id='charitiesTable'><thead><th>Charity Name<th>Event Name<th>Tag<th>Tasks<th>Event Time<th>Sign-Up<tbody>";
		
		while ($tagsrch->fetch()) {
			// Each found charity will show up in a table row
			$foundCharities .= "<tr><td>" . $cname . "<td>" . $ename . "<td>" . $tname . "<td>" . $taname . "<td>" . $etime . "<td><form name='signUp' method='post' action='signupV.php'>Email: <input type='text' name='vEmail' style='width: 150px;'><br>Password: <input type='password' name='vPassword' style='width: 150px;'><input type='hidden' name='vTask' value='" . $tid . "'><input type='submit' value='Sign-Up'></form>";
		}
		
		$foundCharities .= "</tbody></table><br>";
		
		echo $foundCharities;
		
		$tagsrch->close();
	}
?>
  
  </body>

  <footer>
  </footer>
</html> 
