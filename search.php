<?php 
   $pagetitle="Home";
   include 'header.html'; 
?>

    <h2>Search Events</h2>
    <form method="GET" action="searchE.php">
      <fieldset>
      <legend>Search for specific event</legend>
      <label for="eventname">Event: </label>
      <input type="text" name="eventname"><br>
      <input type="submit" value="Submit">
      </fieldset>
    </form>
  </article>
  </body>

  <footer>
  </footer>
</html> 