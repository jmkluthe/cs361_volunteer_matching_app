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
    <h2>Welcome to Volunteer Match!</h2>
    <h3>Please login</h3>
    <form method="post" action="orgLogin.php">
      <fieldset>
        <legend>Organization login</legend>
        <label for="name">Name</label>
        <input name="name"
               id="name"
               type="text"
               placeholder="Charitable Organization"
               maxlength="80"/><br>

        <label for="pass">Password</label>
        <input name="pass"
               id="pass"
               type="password"
               placeholder="password"
               maxlength="30"/><br>
      <input type="submit">
      </fieldset>
    </form>
      <br>
      <form method="post" action="volLogin.php">
      <fieldset>
        <legend>Volunteer Login</legend>
        <label for="username">Name</label>
        <input name="username"
               id="username"
               type="text"
               placeholder="partyanimal999"
               maxlength="40"/><br>
        
        <label for="vpass">Password</label>
        <input name="vpass"
               id="vpass"
               type="password"
               placeholder="password"
               maxlength="30"/><br>
      <input type="submit">
      </fieldset>
    </form>  
  </body>
  
  <footer>
  </footer>
</html> 