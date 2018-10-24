<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="teach06.css">
	<script type="text/javascript">
		function hide_show(id) {
			if (document.getElementById(id).classList.contains('hidden')) {
				document.getElementById(id).classList.remove('hidden');
			} else {
				document.getElementById(id).classList.add('hidden');
			}
		}
	</script>
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

	<?php
	$queryString  = "select";
	$queryString .= " scripture_id, book, chapter, verse, content";
	$queryString .= " from scriptures";

	$query = $db->prepare($queryString);
	$query->execute();
	$results = $query->fetchAll();

	

	foreach ($results as $row) {
		$queryString  = "select t.name from";
		$queryString .= " scriptures s inner join scripture_topics tp";
		$queryString .= " on s.scripture_id = tp.scripture_id";
		$queryString .= " inner join topic t";
		$queryString .= " on tp.topic_id = t.topic_id";
		$queryString .= " where s.scripture_id = " . $row["scripture_id"];

		$query = $db->prepare($queryString);
		$query->execute();
		$topics = $query->fetchAll();

		echo "<button onclick='hide_show(";
		echo $row['scripture_id'] . ")'>";
		echo $row["book"] . " " . $row["chapter"] . ":" . $row["verse"];
		echo "</button>";

		echo "<div id='" . $row['scripture_id'] . "' class='hidden'>";
		echo "<p>" . $row["content"] . "</p>";

		echo "<ul>";
		foreach ($topics as $topic) {
			echo "<li>" . $topic . "</li>";
		}

		echo "</ul>";

		echo "</div>";
	}

	?>

</body>
</html>

