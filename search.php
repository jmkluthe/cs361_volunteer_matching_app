<!doctype html>
<html lag="en">
  <head>
    <?php /*Variables*/
      $sitename="Volunteer Match";
      $sitepath="people.oregonstate.edu/~wattsli/CS361";
    ?>
    <!--meta-->
    <!--links-->
    <link rel="stylesheet" href="main.css" />
  </head>
  <body>
      <nav>
      <ul>
        <li><a href="login.php">Login</a></li>
        <li><a href="createE.php">Create Event</a></li>
        <li><a href="createT.php">Create Task</a></li>
        <li><a href="">View</a></li>
        <li><a href="search.php">Search</a></li>
      </ul>
    </nav>

    <h2>Search Events</h2>
    <form method="GET" action="searchE.php">
      <fieldset>
      <legend>Search for specific event</legend>
      <label for="eventname">Event: </label>
      <input type: "text" name="eventname">
      <input type="submit" value="Submit">
      </fieldset>
    </form>

  </body>

  <footer>
  </footer>
</html> 