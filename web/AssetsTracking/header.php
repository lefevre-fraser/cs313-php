<?php

$header =  "<h1>Name: " . $_SESSION["full_name"] . "</h1>";

$header .= "<a href='AssetTracker.php' id='tracker' class='btn btn-primary'>Asset Tracker Page</a>";
$header .= "<a href='AssetInsertForm.php' id='insert' class='btn btn-primary'>Insert Asset Page</a>";
$header .= "<a href='logout.php' class='btn btn-secondary'>Log Out</a>";

$header .= "<br><hr>";

?>