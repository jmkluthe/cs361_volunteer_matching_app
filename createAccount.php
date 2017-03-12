<?php 
   $pagetitle="Home";
   include 'header.html'; 
?>

    <form method="post" action="addCharity.php">
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
        <label for="name">First and Last Name</label>
        <input name="name"
               id="name"
               type="text"
               placeholder="Charitable Organization"
               maxlength="80"/><br>
        <label for="email">Email Address</label>
        <input name="email"
               id="email"
               type="text"
               placeholder="random_org@blank.com"
               maxlength="50"/><br>
       <label for="pass">Password</label>
       <input name="pass"
               id="pass"
               type="password"
               placeholder="password"
               maxlength="30"/><br>
        <input type="submit">
      </fieldset> 
    </form>
    <form method="post" action="addVolunteer.php">
      <fieldset>
        <legend>Volunteer</legend>
        <label for="vname">First and Last Name</label>
        <input name="vname"
               id="vname"
               type="text"
               placeholder="Fred Mars"
               maxlength="80"/><br>
        <label for="vemail">Email Address</label>
        <input name="vemail"
               id="vemail"
               type="text"
               placeholder="random_dude@blank.com"
               maxlength="50"/><br>
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