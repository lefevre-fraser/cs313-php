<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>



	<?php

		echo "Name:  " . $_POST["name"] . "<br>";
		echo "Email: " . "<a href='mailto:" . $_POST["email"] . "'>" . $_POST["email"] . "</a><br>";
		echo "Major: " . $_POST["major"] . "<br>";
		echo "Comments:<br>";
		echo $_POST["comments"] . "<br><br>";

		echo "Continets:<br>";
		foreach ($_POST["continents"] as $key => $value) {
			echo $value . "<br>";
		}

	?>

</body>
</html>