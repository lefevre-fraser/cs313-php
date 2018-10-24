<?php
session_start();

if ($_SESSION["user_name_exists"]) {
	echo "<script>alert('User name already Exists');</script>";
}

?>

<!DOCTYPE html>
<html>
<head>
	<title>New User SignUp</title>

	<?php
	include_once("BootStrapHeader.php");
	echo $BootStrapHeader;
	?>
</head>
<body>

	<div id="main_div" class="container h-100 d-flex justify-content-center">
		<div class="jumbotron my-auto">
			<form action="insert.php" method="post">
				<label>User Name:</label><br>
				<input type="text=" size="40" name="new_user_name" required><br>
				<label>Password:</label><br>
				<input type="password" size="40" name="password" id="password1" required><br>
				<label>Confirm Password:</label><br>
				<input type="password" size="40" name="password" id="password2" required><br>
				<label>First Name:</label><br>
				<input type="text" size="40" name="fname" placeholder="John" required><br>
				<label>Last Name:</label><br>
				<input type="text" size="40" name="lname" placeholder="Doe" required><br>
				<label>Middle Name:</label>
				<input type="text" size="40" name="mname">
				<label>10 Digit Phone Number:</label><br>
				<input type="number" name="phone_number" placeholder="(xxx) xxx-xxxx" required><br>

				<br>
				<button type="submit" class="btn btn-block">Login</button>
			</form>	
		</div>
	</div>


	<?php
	include_once("BootStrapFooter.php");
	echo $BootStrapFooter;
	?>
</body>
</html>