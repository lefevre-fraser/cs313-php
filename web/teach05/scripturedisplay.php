<!DOCTYPE html>
<html>
<head>
  <title>Scripture Resources</title>
  <link rel="stylesheet" type="text/css" href="teach05.css">
</head>
<body>


<?php

try
{
  $dbUrl = getenv('DATABASE_URL');

  $dbOpts = parse_url($dbUrl);

  $dbHost = $dbOpts["host"];
  $dbPort = $dbOpts["port"];
  $dbUser = $dbOpts["user"];
  $dbPassword = $dbOpts["pass"];
  $dbName = ltrim($dbOpts["path"],'/');

  $db = new PDO("pgsql:host=$dbHost;port=$dbPort;dbname=$dbName", $dbUser, $dbPassword);

  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  echo '<h1>Scripture Details</h1>';

  foreach ($db->query("select * from scriptures where scripture_id = " . htmlspecialchars($_GET['id'])) as $row) {
  	echo "<p><span class='bold'>" . $row['book']  . " " . $row['chapter'] . ":" .$row['verse'] . " - </span>";
    echo '"' . $row["content"] . '"</p>';
  }


}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}



?>

</body>
</html>