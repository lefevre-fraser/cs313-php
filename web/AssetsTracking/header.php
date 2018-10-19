<?php

echo '<div id="main_div" class="container">';

echo "<h1>Name: " . $_SESSION["full_name"] . "</h1>";
echo "<a href='logout.php' class='btn btn-secondary'>Log Out</a>";

echo "<br><hr>";

?>