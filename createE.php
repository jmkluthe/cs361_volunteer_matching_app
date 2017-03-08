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
        <li><a href="index.php">Home</a></li>
        <li><a href="login.php">Login</a></li>
        <li><a href="createE.php">Create Event</a></li>
        <li><a href="createT.php">Create Task</a></li>
        <li><a href="">View</a></li>
        <li><a href="search.php">Search</a></li>
      </ul>
    </nav>
    <form method="post" action="addEvent.php">
      <h2>Create Event</h2>
      <fieldset>
        <legend>Organization Information</legend>
        <label for="name">Organization Name</label>
        <input name="name"
               id="name"
               type="text"
               placeholder="Charitable Organization"
               maxlength="80"/><br>

        <label for="founded">Year Founded</label>
        <input name="founded"
               id="founded"
               type="number"
               placeholder="YYYY"
               maxlength="4"/><br>

        <label for="founder">Founder Name</label>
        <input name="founder"
               id="founder"
               type="text"
               placeholder="Jesse Jackson"
               maxlength="50"/><br>
      </fieldset>
      <br>
      <fieldset>
        <legend>Event Details</legend>
        <label for="eventname">Event Name</label>
        <input name="eventname"
               id="eventname"
               type="text"
               placeholder="Party at White House"
               maxlength="100"/><br>

        <label for="eventtime">Date</label>
        <input name="eventdate"
               id="eventdate"
               type="date"
               placeholder="2011-08-01"
               maxlength="100"/><br>

        <label for="eventtime">Time</label>
        <input name="eventtime"
               id="eventtime"
               type="time"
               placeholder="12:00"
               maxlength="100"/><br>

        <label for="eventinfo">Information</label>
        <input name="eventinfo"
               id="eventinfo"
               type=text
               placeholder="more information"
               maxlength="400"/><br>
        <input type="submit">
      </fieldset>
    </form>
  </body>

  <footer>
  </footer>
</html>