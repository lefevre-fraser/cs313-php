<?php

include_once("DatabaseConnect.php");

$book		= $_POST["book"];
$chapter	= $_POST["chapter"];
$verse		= $_POST["verse"];
$content	= $_POST["content"];

$topics		= $_POST["topics"];


$queryString  = "select insert_scripture(";
$queryString .= "'" . $book . "'";
$queryString .= ", " . $chapter;
$queryString .= ", " . $verse;
$queryString .= ", '" . $content . "'";
$queryString .= ")";

$query = $db->prepare($queryString);
$query->execute();
$results = $query->fetchAll();

foreach ($topics as $id) {
	$queryString  = "select connect_to_topic(";
	$queryString .= $results[0]["insert_scripture"];
	$queryString .= ", " . $id;
	$queryString .= ")";

	$query = $db->prepare($queryString);
	$query->execute();
	$success = $query->fetchAll();
}

header("Location: Scriptures.php");
exit;

?>