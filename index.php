<?php
  include_once 'header.php';

 ?>

 <section class="login">
   <div class="login-form">
     <h1>Log In</h1>
     <form action="includes/login.inc.php" method="post">
       <label for="username"> User Name </label>
       <input type="text" name="username" placeholder="Enter your email or username">
       <label for="password">Password</label>
       <input type="password" name="password" placeholder="Enter your password">
       <button type="submit"name="login">Login</button>
       <button type="=reset" name="reset" id="reset"> Reset All</button>
     </form>
     <?php
     if (isset($_GET["error"])) {
       if ($_GET["error"] == "emptyinput") {
         echo "<p> Enter all fileds</p>";
       }
       else if ($_GET["error"] == "WrongLogin") {
         echo "<p> incorrect login information</p>";
       }
       else if ($_GET["error"] == "WrongPassword") {
         echo "<p> incorrect Password</p>";
       }
     }
      ?>
   </div>
 </section>

 <section class="signup">
    <div class="form-signup">
      <h1>Registration</h1>
      <form action="includes/signup.inc.php" method="post">
        <label> User Name </label>
        <input type="text" name="username" placeholder="Enter your user name">
        <label> E mail</label>
        <input type="email" name="email" placeholder="Enter your email">
        <label>Password</label>
        <input type="password" name="password1" placeholder="Enter your password">
        <label>Confirm Password </label>
        <input type="password" name="password2" placeholder="Confirm your password">
        <button type="=reset" name="reset" id="resetbtn"> Reset All</button>
        <button type="submit"name="signup">Sing Up</button>
       </form>
       <div class="errors">
         <?php
         if (isset($_GET["error"])) {
           if ($_GET["error"] == "emptyinput") {
             echo "<p> Enter all fileds</p>";
           }
           else if ($_GET["error"] == "invalidusername") {
             echo "<p> invalid username</p>";
           }
           else if ($_GET["error"] == "invalidemail") {
             echo "<p> invalid email</p>";
           }
           else if ($_GET["error"] == "passwordsdontmatch") {
             echo "<p> passwords don't match</p>";
           }
           else if ($_GET["error"] == "usernametaken") {
             echo "<p> username is taken</p>";
           }
           else if ($_GET["error"] == "none") {
             echo "<p> Please Login</p>";
           }
         }
          ?>
       </div>
    </div>
  </section>

<?php
  include_once 'footer.php';
 ?>
