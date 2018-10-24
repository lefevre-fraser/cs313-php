<?php
echo $_GET["phone_number"];

$area_code = preg_split("/(/", $_GET["phone_number"]);

echo $area_code[0];
echo "<hr>";
echo $area_code[1];

$area_code = preg_split("/)/", $area_code[0]);


echo $area_code[0];
?>