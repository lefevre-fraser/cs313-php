<?php
echo $_GET["phone_number"];

$area_code = preg_split("/(/", $_GET["phone_number"]);
print_r($area_code);
$area_code = preg_split("/)/", $area_code[0]);
print_r($area_code);

echo $area_code[0];
?>