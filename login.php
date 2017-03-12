<?php 
   $pagetitle="Home";
   include 'header.html'; 
?>
  
    <h2>Welcome to Volunteer Match!</h2>
    <h3>Please login</h3>
    <form method="post" action="orgLogin.php">
      <fieldset>
        <legend>Organization login</legend>
        <label for="oemail">Organization Email</label>
        <input name="oemail"
               id="oemail"
               type="text"
               placeholder="charitableO@gmail.org"
               maxlength="80"/><br>

        <label for="opass">Password</label>
        <input name="opass"
               id="opass"
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
        <label for="vemail">Email</label>
        <input name="vemail"
               id="vemail"
               type="text"
               placeholder="partyanimal999@whoo.yarr"
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
  </article>
  </body>
  
  <footer>
  </footer>
</html> 