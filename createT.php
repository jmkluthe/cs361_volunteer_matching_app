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
    <form method="post" action="addTask.php">
      <h2>Create Event Task</h2>
      <fieldset>
        <legend>Task</legend>
        <label for="taskname">Task Name</label>
        <input name="taskname"
               id="taskname"
               type="text"
               placeholder="Pick up Trash"
               maxlength="50"/><br>

        <label for="taskinfo">Task Description</label>
        <input name="taskinfo"
               id="taskinfo"
               type="text"
               placeholder="picking up trash"
               maxlength="400"/><br>
        <input type="submit">
      </fieldset>
    </form>
  </body>
  <footer>

  </footer>
</html>