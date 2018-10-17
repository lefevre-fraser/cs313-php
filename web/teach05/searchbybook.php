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

  echo '<h1>Scripture Resources</h1>';

  foreach ($db->query("select * from scriptures where book like '%" . htmlspecialchars($_POST['book']) . "%'") as $row) {
    echo "<a href='scripturedisplay.php?id=" . $row["scripture_id"] . "'><span class='bold'>" . $row['book']  . " " . $row['chapter'] . ":" .$row['verse'] . " - </span>";
    echo '</a><br>';
  }


}
catch (PDOException $ex)
{
  echo 'Error!: ' . $ex->getMessage();
  die();
}



?>

  <div>
    <form action="searchbybook.php" method="post">
      <label>Book</label>
      <input type="text" name="book" placeholder="John">
      <button type="submit">Click Me</button>
    </form>
  </div>

</body>
</html>