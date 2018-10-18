<?php 
session_unset();
session_destroy();

header("Location: AssetTracker.php");
exit;
?>