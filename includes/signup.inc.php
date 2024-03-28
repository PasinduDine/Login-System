<?php

if (isset($_POST["signup"])) {

  $name = $_POST["name"];
  $email = $_POST["email"];
  $username = $_POST["username"];
  $password1 = $_POST["password1"];
  $password2 = $_POST["password2"];



  require_once 'dbh.inc.php';
  require_once 'functions.inc.php';

  if (emptyInputSignup($name, $email, $username, $password1, $password2) !== false) {
    header("Location: ../signup.php?error=emptyinput");
    exit();
  }

  if (invalidUserName($username) !== false) {
    header("Location: ../signup.php?error=invalidusername");
    exit();
  }

  if (invalidEmail($email) !== false) {
    header("Location: ../signup.php?error=invalidemail");
    exit();
  }

  if (passwordMatch($password1 , $password2) !== false) {
    header("Location: ../signup.php?error=passwordsdontmatch");
    exit();
  }

  if (usernameExists($conn, $username , $email) !== false) {
    header("Location: ../signup.php?error=usernametaken");
    exit();
  }

  createUser($conn, $name, $email, $username, $password1);

}
else {
  header("Location: ../signup.php ");
}
