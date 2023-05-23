<?php
// Unset all of the session variables
session_start();
$_SESSION = array();
session_unset();
session_destroy();
header("location: index.php");
exit();
