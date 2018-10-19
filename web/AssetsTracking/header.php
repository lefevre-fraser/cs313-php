<?php

$header = '<div id="main_div" class="container">';

$header .= "<h1>Name: " . $_SESSION["full_name"] . "</h1>";
$header .= "<a href='logout.php' class='btn btn-secondary'>Log Out</a>";

$header .= "<br><hr>";

return $header;

?>