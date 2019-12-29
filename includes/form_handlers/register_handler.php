<?php

$fname = ""; //First name
$lname = ""; //Last name
$em = ""; //Email
$em2 = ""; //Email_2
$password = ""; //Password
$password2 = ""; //Password_2
$date = ""; //Date when the user signed up
$error_array = array(); //Holds error messages

//if the registration button is pressed check the values of the form:
if(isset($_POST['register_button'])){
//First Name
  $fname = strip_tags($_POST['reg_fname']); //storing in the variable the value that was sent and not allowing hntl tags as imput
  $fname = str_replace(' ', '', $fname);
  $fname = ucfirst(strtolower($fname)); //to allow uppercase only on first letters
  $_SESSION['reg_fname'] = $fname;

//Last Name
  $lname = strip_tags($_POST['reg_lname']);
  $lname = str_replace(' ', '', $lname);
  $lname = ucfirst(strtolower($lname));
  $_SESSION['reg_lname'] = $lname;

//Email
  $em = strip_tags($_POST['reg_email']);
  $em = str_replace(' ', '', $em);
  $em = ucfirst(strtolower($em));
  $_SESSION['reg_email'] = $em;

//Email2
  $em2 = strip_tags($_POST['reg_email2']);
  $em2 = str_replace(' ', '', $em2);
  $em2 = ucfirst(strtolower($em2));
  $_SESSION['reg_email2'] = $em2;

//Password and Password_2
  $password = strip_tags($_POST['reg_password']);
  $password2 = strip_tags($_POST['reg_password2']);

  $date = date("Y-m-d"); //current date

  if($em == $em2) {

//checking if emails in correct format
    if(filter_var($em, FILTER_VALIDATE_EMAIL)) {
      $em = filter_var($em, FILTER_VALIDATE_EMAIL);
      //checking if email exists already
      $e_check = mysqli_query($con, "SELECT email FROM users WHERE email='$em'");
      $num_rows = mysqli_num_rows($e_check);
      if($num_rows > 0) {
        array_push($error_array, "Email has already been registered with us. Please use another email<br>");
      }
    }
    else {
      array_push($error_array, "Invalid format of Email<br>");
    }
  }
  else {
    array_push($error_array, "Emails don't match!<br>");
  }

  if(strlen($fname) > 25 || strlen($fname) < 2) {
    array_push($error_array, "Your first name should be between 2 and 25 characters<br>");
  }
  if(strlen($lname) > 25 || strlen($lname) < 2) {
    array_push($error_array, "Your last name should be between 2 and 25 characters<br>");
  }

  if($password != $password2) {
    array_push($error_array, "Your passwords do not match!<br>");
  }
  else {
    if(preg_match('/[^A-Za-z0-9]/', $password)) {
      array_push($error_array, "Your password should have only English characters or numbers.<br>");
    }
  }

  if(strlen($password) > 30 || strlen($password) < 5) {
    array_push($error_array, "Your password must be between 5 and 30 characters long.<br>");
  }

  if(empty($error_array)) {
    $password = md5($password); //encryption of password

    //creating username automatically
    $username = strtolower($fname . "_" . $lname);
    $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
    $i = 0;
    while(mysqli_num_rows($check_username_query) != 0) {
      $i++;
      $username = $username . "_" . $i;
      $check_username_query = mysqli_query($con, "SELECT username FROM users WHERE username='$username'");
      //if username existed in the database, it will add number (1++) to the new username
    }

    //PROFILE PICTURE BY DEFAULT
    $rand = rand(1, 2);
    if($rand == 1)
    $profile_pic = "assets/images/profile_pics/defaults/icons8-name-filled-50.png";
    else if($rand == 2)
    $profile_pic = "assets/images/profile_pics/defaults/icons8-name-50.png";
    $query = mysqli_query($con, "INSERT INTO users VALUES ('', '$fname', '$lname', '$username', '$em', '$password', '$date', '$profile_pic', '0', '0', 'no', ',')");
    array_push($error_array, "<span style='color: #14C800;'>Registration completed! Thank you for joining us.</span><br>");
    $_SESSION['reg_fname'] = "";
    $_SESSION['reg_lname'] = "";
    $_SESSION['reg_email'] = "";
    $_SESSION['reg_email2'] = "";
    $_SESSION['reg_fname'] = "";

  }

}
?>
