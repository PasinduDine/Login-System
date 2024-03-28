<?php
    include_once "header.php";
?>

<div>
    
<ul>
    <li><a href="signup.php"> Sign Up</a></li>
    <li><a href="login.php">Login </a></li>
</ul>


<div class="signup_form">
    <form action="includes/signup.inc.php">
        <label>Username : </label>
        <input type="text" require>
        <br>
        <label>Email Address : </label>
        <input type="text" require>
        <br>
        <label>Password : </label>
        <input type="text" require>
        <br>
        <label>Conform Password : </label>
        <input type="text" require>
        <br>
        <input type="submit">
    </form>
</div>



</div>

<?php
    include_once "footer.php";
?>