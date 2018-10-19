<?php
session_start();

include_once("DatabaseConnect.php");

$queryString  = "select insert_asset(";
$queryString .= "'" . $_SESSION["user_name"] . "'";
$queryString .= ", " . $_POST["quantity"];
$queryString .= ", " . $_POST["asset_value"];
$queryString .= ", '" . $_POST["asset_name"] . "'";
$queryString .= ")";

$completed = $db->query($queryString);

header("Location: AssetInsertForm.php");
exit;
?>