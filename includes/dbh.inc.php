<?php

$server = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "login";

$conn = mysqli_connect($server , $dbusername , $dbpassword , $dbname);

if (!$conn) {
  die("Connection Failed: " . mysqli_connect_error());
}
