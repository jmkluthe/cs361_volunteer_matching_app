<?php 
   $pagetitle="Home";
   include 'header.html'; 
?>

    <h2>Search Events By Tag</h2>
    <form method="POST" action="search.php">
      <fieldset>
      <legend>Search for specific event by tag</legend>
      <label for="tagsearch">Tag: </label>
      <input type="text" name="tagsearch"><br>
      <input type="submit" value="Submit">
      </fieldset>
    </form>
  </article>
  
  
  <?php
	$mysqli = new mysqli("oniddb.cws.oregonstate.edu", "xxx", "xxx", "xxx");

	if (!$mysqli || $mysqli->connect_errno) { print "No connection: " . $mysqli->connect_errno . " " . $mysqli->connect_error; } 

	// Query the search item
	$charSearch  = "SELECT charity.name, event.name, tag.name FROM event INNER JOIN
					charity ON event.c_id = charity.id INNER JOIN
					charity_tag ON charity_tag.c_id = charity.id INNER JOIN
					tag ON charity_tag.t_id = tag.id WHERE tag.name REGEXP ?;";
	
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
	
		if (!($tagsrch->bind_result($cname, $ename, $tname))) {
			print "Charity/tag search bind result failed: " . $tagsrch->errno . " " . $tagsrch->error;
		}
		print "<p>Here are the charities we found: </p>";
		
		// Display the results of the search in a table
		$foundCharities = "<table id='charitiesTable'><thead><th>Charity Name<th>Event Name<th>Tag<tbody>";
		
		while ($tagsrch->fetch()) {
			// Each found charity will show up in a table row
			$foundCharities .= "<tr><td>" . $cname . "<td>" . $ename . "<td>" . $tname;
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
