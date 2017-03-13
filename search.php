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
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "db-name", "password", "db-name");
	
	$charSearch = "";
	
	if (!$mysqli || $mysqli->connect_errno) { print "No connection: " . $mysqli->connect_errno . " " . $mysqli->connect_error; } 
	// Query the search item
	if (isset($_POST['Search']) && $_POST['Search'] == "Tag")
	{
	$charSearch = "SELECT charity.name, event.name, tag.name, task.name FROM event INNER JOIN
					charity ON event.c_id = charity.id INNER JOIN
					charity_tag ON charity_tag.c_id = charity.id INNER JOIN
					tag ON charity_tag.t_id = tag.id INNER JOIN
					task ON event.id = task.e_id
					WHERE tag.name REGEXP ?;";
	}
	else if (isset($_POST['Search']) && $_POST['Search'] == "Charity")
	{
	$charSearch = "SELECT charity.name, event.name, tag.name, task.name FROM event INNER JOIN
					charity ON event.c_id = charity.id INNER JOIN
					charity_tag ON charity_tag.c_id = charity.id INNER JOIN
					tag ON charity_tag.t_id = tag.id INNER JOIN
					task ON event.id = task.e_id
					WHERE charity.name REGEXP ?;";
	}
	else
	{
	$charSearch = "SELECT charity.name, event.name, tag.name, task.name FROM event INNER JOIN
					charity ON event.c_id = charity.id INNER JOIN
					charity_tag ON charity_tag.c_id = charity.id INNER JOIN
					tag ON charity_tag.t_id = tag.id INNER JOIN
					task ON event.id = task.e_id
					WHERE event.name REGEXP ?;";
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
	
		if (!($tagsrch->bind_result($cname, $ename, $tname, $taname))) {
			print "Charity/tag search bind result failed: " . $tagsrch->errno . " " . $tagsrch->error;
		}
		print "<p>Here are the events we found: </p>";
		
		// Display the results of the search in a table
		$foundCharities = "<table id='charitiesTable'><thead><th>Charity Name<th>Event Name<th>Tag<th>Tasks<tbody>";
		
		while ($tagsrch->fetch()) {
			// Each found charity will show up in a table row
			$foundCharities .= "<tr><td>" . $cname . "<td>" . $ename . "<td>" . $tname . "<td>" . $taname;
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
