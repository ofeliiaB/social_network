<?php
include("includes/header.php");

if(isset($_POST['cancel'])) {
	header("Location: settings.php");
}

if(isset($_POST['close_account'])) {
	$close_query = mysqli_query($con, "UPDATE users SET user_closed='yes' WHERE username='$userLoggedIn'");
	session_destroy();
	header("Location: register.php");
}


?>



<div class="main_column column">

	<h4>Close Account</h4>

	Please confirm that you want to close your account.<br><br>
	Your activity and information will be hided from other users.<br><br>
	To reopen your account simply log in at any time.<br><br>

	<form action="close_account.php" method="POST">
		<input type="submit" name="close_account" id="close_account" value="Close account" class="warning">
		<input type="submit" name="cancel" id="update_details" value="Cancel" class="success">
	</form>

</div>
