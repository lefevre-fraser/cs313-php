<?php
session_start();

if (isset($_SESSEION["logged_in"])) {
	if (!$_SESSEION["logged_in"]) {
		header("Location: signin.php");
		exit;
	}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Welcome</title>
</head>
<body>
	<h1>
		
		<?php
		echo "Welcome " . $_SESSEION["current_user"];
		?>

	</h1>

</body>
</html>