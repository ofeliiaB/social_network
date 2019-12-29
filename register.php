<?php
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';


 ?>


<html>
<head>

<link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
<script scr="assets/js/register.js"></script>

<title>Learning with Us</title>
</head>
<body>

  <div class="wrapper">

    <div class="login_box">
      <div class="login_header">
      <h1>Learning with Us</h1>
Communicate. Learn. Share Your Knowledge.
    </div>

    <div id="first">
      <form action="register.php" method="POST">
        <input type="email" name="log_email" placeholder="Email Address" value="<?php
        if(isset($_SESSION['log_email'])) {
          echo $_SESSION['log_email'];

        } ?>">
        <br>
        <input type="password" name="log_password" placeholder="Password">
        <br>


        <?php if(in_array("You have entered invalid email address or password<br>", $error_array)) echo "You have entered invalid email address or password<br>"; ?>
        <input type="submit" name="login_button" value="Login">
        <br>
        <a onclick="myFunction()" href="#" id="signup" class="signup"></a>

      </form>
    </div>
   <div id="second">



    <form action="register.php" method="POST">

      <input type="test" name="reg_fname" placeholder="First Name" value="<?php
      if(isset($_SESSION['reg_fname'])) {
        echo $_SESSION['reg_fname'];

      } ?>">
      <br>
      <?php if(in_array("Your first name should be between 2 and 25 characters<br>", $error_array)) echo "Your first name should be between 2 and 25 characters<br>"; ?>

      <input type="test" name="reg_lname" placeholder="Last Name" value="<?php
      if(isset($_SESSION['reg_lname'])) {
        echo $_SESSION['reg_lname'];
      } ?>">
      <br>

      <?php if(in_array("Your last name should be between 2 and 25 characters<br>", $error_array)) echo "Your last name should be between 2 and 25 characters<br>"; ?>


      <input type="email" name="reg_email" placeholder="Email" value="<?php
      if(isset($_SESSION['reg_email'])) {
        echo $_SESSION['reg_email'];
      } ?>">
      <br>


      <input type="email" name="reg_email2" placeholder="Confirm Email" value="<?php
      if(isset($_SESSION['reg_email2'])) {
        echo $_SESSION['reg_email2'];
      } ?>">

      <br>
      <?php if(in_array("Emails don't match!<br>", $error_array)) echo "Emails don't match!<br>";
    else if(in_array("Invalid format of Email<br>", $error_array)) echo "Invalid format of Email<br>";
    else if(in_array("Email has already been registered with us. Please use another email<br>", $error_array)) echo "Email has already been registered with us. Please use another email<br>"; ?>

      <input type="password" name="reg_password" placeholder="Password">
      <br>
      <input type="password" name="reg_password2" placeholder="Confirm Password">
      <br>
      <?php if(in_array("Your passwords do not match!<br>", $error_array)) echo "Your passwords do not match!<br>";
    else if(in_array("Your password should have only English characters or numbers.<br>", $error_array)) echo "Your password should have only English characters or numbers.<br>";
    else if(in_array("Your password must be between 5 and 30 characters long.<br>", $error_array)) echo "Your password must be between 5 and 30 characters long.<br>"; ?>



      <input type="submit" name="register_button" value="Register">
      <br>
      <?php if(in_array("<span style='color: #14C800;'>Registration completed! Thank you for joining us.</span><br>", $error_array)) echo "<span style='color: #14C800;'>Registration completed! Thank you for joining us.</span><br>"; ?>
          <a href="#" id="signin" class="signin"></a>


    </form>
  </div>

    </div>
    </div>
</body>
</html>
