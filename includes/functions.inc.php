<?php

//checking inputs are empty or not...
function emptyInputSignup($name, $email, $username, $password1, $password2){
  $result;
  if (empty($name) || empty($email) || empty($username) || empty($password1) || empty($password2)){
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}
//end


//checking username is valid or not...
function invalidUserName($username){
  $result;

  if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}
//end


//checking Email is valid or not..
function invalidEmail($email){
  $result;

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}
//end


//checking passowrds are same or not...
function passwordMatch($password1 , $password2){
  $result;

  if ($password1 !== $password2) {
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}
//end



//checking whether the username and email is taken or not...
function usernameExists($conn, $username, $email){
  $sql = "SELECT * FROM users WHERE username = ? OR email = ?;";

  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../signup.php?error=stmtfailed");
    exit();
  }
  mysqli_stmt_bind_param($stmt, "ss", $username, $email);

  mysqli_stmt_execute($stmt);

  $resultData = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($resultData)) {
    return $row;
  }
  else {
    $result = false;
    return $result;
  }

  mysqli_stmt_close($stmt);
}
//end


//registration for new users...
function createUser($conn, $name, $email, $username, $password1){
  $sql = "INSERT INTO users(Name,Email,Username,Password) VALUES(?,?,?,?);";

  $stmt = mysqli_stmt_init($conn);

  if (!mysqli_stmt_prepare($stmt, $sql)) {
    header("Location: ../signup.php?error=stmtfailed");
    exit();
  }

  $password = password_hash($password1, PASSWORD_DEFAULT);

  mysqli_stmt_bind_param($stmt, "ssss", $name, $email, $username, $password);

  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);

  header("Location: ../signup.php?error=none");
  exit();

}
//end



//checking login inputs are empty or not...
function emptyInputLogin($username, $password){
  $result;
  if (empty($username) || empty($password)){
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}
//end


//login to website...
function loginUser($conn, $username , $password){

    $usernameExists = usernameExists($conn, $username, $username);

    if ($usernameExists === false) {
      header("Location: ../login.php?error=WrongLogin");
      exit();
    }

    $dbpassword = $usernameExists["Password"];

    $checkPwd = password_verify($password, $dbpassword);

    if ($checkPwd === false) {
      header("Location: ../login.php?error=WrongPassword");
      exit();
    }
    else if ($checkPwd === true) {
      session_start();
      $_SESSION["userid"] =  $usernameExists["ID"];

      $_SESSION["name"] =  $usernameExists["Name"];

      $_SESSION["email"] =  $usernameExists["Email"];

      $_SESSION["username"] =  $usernameExists["Username"];

      $_SESSION["level"] =  $usernameExists["user_level"];

      header("Location: ../index.php");
      exit();
    }

}
//end

//user are log or not
function isLogin(){
  $result;
  $level = $_SESSION['level'];
  if ($level == 0 OR $level = 1){
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}
//end


// user login for admin or not
function isAdmin(){
  $result;
  $level = $_SESSION['level'];
  if ($level == 1){
    $result = true;
  }
  else {
    $result = false;
  }
  return $result;
}
//end
