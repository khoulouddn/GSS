<?php
session_start();
$_SESSION=array();
session_destroy();
header("LOCATION:page/page.php");

?>