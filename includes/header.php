<?php
require 'config/config.php';



//if the user not logged in  - he is sent back
if(isset($_SESSION['username'])) {
  $userLoggedIn = $_SESSION['username'];
  $user_details_query = mysqli_query($con, "SELECT * FROM users WHERE username='$userLoggedIn'");
  $user = mysqli_fetch_array($user_details_query);
}
else {
  header("Location: register.php");
}

 ?>


<html>
<head>
<tittle><tittle>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
  <script src="assets/js/bootstrap.js"></script>
    <script src="assets/js/bootbox.min.js"></script>
  <script src="assets/js/demo.js"></script>
  <script src="assets/js/jquery.jcrop.js"></script>
<script src="assets/js/jcrop_bits.js"></script>
<link rel="stylesheet" href="assets/css/jquery.Jcrop.css" type="text/css" />

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">

  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">

</head>
<body>

<div class="top_bar">

    <div class="logo">
      <a href="index.php">Learning with Us</a>
    </div>
    <nav>


        <a href="<?php echo $userLoggedIn ?>"><?php echo $user['first_name']; ?></i></a>


      <a href="index.php"><i class="fas fa-home"></i></a>

      <a href="messages.php"><i class="fas fa-envelope"></i>

      </a>
      <a href="requests.php"><i class="fas fa-users"></i></a>
      <a href="settings.php"><i class="fas fa-cog"></i></a>
      <a href="includes/handlers/logout.php"><i class="fas fa-sign-out-alt"></i></a>




    </nav>


</div>

<div class="wrapper">


</body>

</html>
