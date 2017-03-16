<?php 
   $pagetitle="Home";
   include 'header.html'; 
?>

    <form method="post" action="addTask.php">
      <h2>Create Event Task</h2>
      <fieldset>
        <legend>Task</legend>
        <label for="charityname">Charity Name</label>
        <input name="charityname"
               id="charityname"
               type="text"
               placeholder="Home for Sad Mice"
               maxlength="50"/><br>
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
        <label for="eventname">Event Name</label>
        <input name="eventname"
               id="eventname"
               type="text"
               placeholder="Bring out your Cheese!"
               maxlength="50"/><br>
        <label for="taskname">Task Name</label>
        <input name="taskname"
               id="taskname"
               type="text"
               placeholder="Pass out cheese to mice."
               maxlength="50"/><br>

        <label for="taskinfo">Task Description</label>
        <input name="taskinfo"
               id="taskinfo"
               type="text"
               placeholder="Make sure all mice get equal cheese."
               maxlength="400"/><br>
        <input type="submit">
      </fieldset>
    </form>
  </article>
  </body>
  <footer>

  </footer>
</html>