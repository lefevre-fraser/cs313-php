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


  foreach ($db->query('select * from scriptures') as $row) {
  	echo "<p><span>" . $row['book']  . " " . $row['chapter'] . ":" .$row['verse'] . " - </span>";
  	echo '"' . $row["content"] . '"</p>';
  }








}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}



?>