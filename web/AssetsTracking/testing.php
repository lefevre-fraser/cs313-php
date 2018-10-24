<?php
$area_code = preg_split("/(/", $_GET["phone_number"]);
$area_code = preg_split("/)/", $area_code[0]);

echo $area_code[0];
?>