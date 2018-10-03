<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>



	<?php

		echo "Name:  " . $_POST["name"] . "<br>";
		echo "Email: " . "<a href='mailto:" . $_POST["email"] . "'>EmailME:</a><br>";
		echo "Major: " . $_POST["major"] . "<br>";
		echo "Comments: " . $_POST["comments"] . "<br>";



	?>

</body>
</html>