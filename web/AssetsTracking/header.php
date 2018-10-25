<?php

$header =  "<h1>Name: " . $_SESSION["full_name"] . "</h1>";

$header .= "<a href='AssetTracker.php' id='tracker' class='btn btn-primary'>Asset Tracker</a>";
$header .= "<a href='AssetInsertForm.php' id='insert' class='btn btn-primary'>Asset Insert</a>";
$header .= "<a href='logout.php' class='btn btn-primary justify-content-end'>Log Out</a>";

$header .= "<br><hr>";

?>