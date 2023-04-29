<?php
// Database configuration
$host = "sql209.epizy.com";
$dbuser = "epiz_34106685";
$dbpass = "f@7EbG#KFdr3tvH";
$dbname = "epiz_34106685_4ARMS";
// Create database connection
$conn = new mysqli($host, $dbuser, $dbpass, $dbname);
// Check connection
if (mysqli_connect_error()) {
    echo "Connection establishing failed! <br >";
} else {
    echo "Connection established successfully. <br >";
}
?>;