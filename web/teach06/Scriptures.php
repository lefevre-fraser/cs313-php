<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="InsertData.php" method="post">
		
		<label>Book:</label><br>
		<input type="text" size="40" name="book"><br>
		<label>Chapter:</label><br>
		<input type="number" name="chapter"><br>
		<label>Verse:</label><br>
		<input type="number" name="verse"><br>
		<label>Content:</label><br>
		<textarea name="content"></textarea><br>

		<?php
		include_once("DatabaseConnect.php");
		?>

		<?php
		$queryString = "select * from topic";
		$query = $db->prepare($queryString);
		$query->execute();
		$results = $query->fetchAll();

		?>

	

		<?php

		foreach ($results as $row) {
			echo "<input type='checkbox' name='topics[]'";
			echo "value='" . $row["topic_id"] . "'>";
			echo "<label>" . $row["name"] . "</label><br>";
		}

		?>

		<button type="submit">Submit scripture</button>

	</form>
</body>
</html>

