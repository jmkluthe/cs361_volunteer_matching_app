<?php 
   $pagetitle="Create Event";
   include 'header.html'; 
?>

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
       <label for="email">Email Address</label>
       <input name="email"
               id="email"
               type="text"
               placeholder="random_dude@blank.com"
               maxlength="50"/><br>
       <label for="pass">Password</label>
       <input name="pass"
               id="pass"
               type="password"
               placeholder="password"
               maxlength="30"/><br>
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

        <label for="eventdate">Date</label>
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
               type="text"
               placeholder="more information"
               maxlength="400"/><br>
        <input type="submit">
      </fieldset>
    </form>
    </article>
  </body>
  
  <footer>
  </footer>
</html>