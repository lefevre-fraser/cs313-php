<?php

$UniqueName = "1048$20";
$row["asset_name"] = "Bed";
$row["quantity"] = 2;
$row["asset_value"] = 500;

$asset_name = $row["asset_name"];
$quantity = $row["quantity"];
$asset_value = $row["asset_value"];

echo "<tr>";

echo "<th class='row'>";
echo "<input type='checkbox' name='assets[]' value='" . $UniqueName . "'>";
echo "<label class='tab'>" . $row["asset_name"] . "</label>";
echo "</th>";

echo "<td>";
echo "$quantity";
// echo "<input type=\"number\" value=\"$row['quantity']\" name=\"$UniqueName['quantity']\">";
echo "</td>";

echo "<td class='text-nowrap'>$";
// echo "<input type=\"number\" value=\"$row['asset_value']\" name=\"$UniqueName['asset_value']\">";
echo "</td>";

echo "<td>$" . ($row["quantity"] * $row["asset_value"]) . "</td>";

echo "</tr>";

?>
