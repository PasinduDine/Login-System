<?php

if (isset($_POST["login"])) {

  $username = $_POST["username"];
  $password = $_POST["password"];


    require_once 'dbh.inc.php';
    require_once 'functions.inc.php';

    if (emptyInputLogin($username, $password) !== false) {
      header("Location: ../login.php?error=emptyinput");
      exit();
    }

    loginUser($conn, $username , $password);

}
else {
  header("Location: ../login.php");
  exit();
}
