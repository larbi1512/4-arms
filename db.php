<?php
// Database configuration
$host = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "4-arms";
// Create database connection
$conn = new mysqli($host, $dbuser, $dbpass, $dbname);
// Check connection
if (mysqli_connect_error()) {
    echo "Connection establishing failed! <br >";
}
