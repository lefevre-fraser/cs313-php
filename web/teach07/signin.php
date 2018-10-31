<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign In</title>
</head>
<body>
	<form action="login.php" method="post">
		<label>User Name:</label><br>
		<input type="text" name="user_name"><br>
		<label>Password:</label><br>
		<input type="password" name="password"><br>
		<button type="submit">Sign In</button><br>
		<a href="signup.php">No account? Sign Up Here!</a>
	</form>

	<?php
	if (isset($_SESSION["logged_in"])) {
		if (!$_SESSION["logged_in"]) {
			echo "<script>";
			echo "alert('User name and password combination not recognised')";
			echo "</script>";
			unset($_SESSION["logged_in"]);
		}
	}
	?>
</body>
</html>