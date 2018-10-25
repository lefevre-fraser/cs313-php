<?php

$header =  "<h1>Name: " . $_SESSION["full_name"] . "</h1>";

$header .= "<div class='d-flex flex-row'>";
$header .= "<a href='AssetTracker.php' id='tracker' class='btn btn-primary'>Asset Tracker</a>";
$header .= "<a href='AssetInsertForm.php' id='insert' class='btn btn-primary'>Asset Insert</a>";
$header .= "<a href='logout.php' class='btn btn-primary ml-auto'>Log Out</a>";
$header .= "</div>";

$header .= "<br><hr>";

?>