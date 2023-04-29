<?php
// Database configuration
$host = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "4_arms";
// Create database connection
$conn = new mysqli($host, $dbuser, $dbpass, $dbname);
// Check connection
if (mysqli_connect_error()) {
    echo "Connection establishing failed! <br >";
} else {
    echo "Connection established successfully. <br >";
}
?>;