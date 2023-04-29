<?php

if(isset($_GET['divName'])) {
  $divName = $_GET['divName'];
  echo "The value of divName is: " . $divName;
} else {
  echo "divName is not set.";
}


// insert the div_name value into the name_div column of a MySQL table
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "4-arms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// prepare and bind the INSERT statement
$stmt = $conn->prepare("INSERT INTO assigned VALUES ()");
$stmt->bind_param("s", $divName);

// execute the statement and check for errors
if ($stmt->execute()) {
  echo "Data inserted successfully";
} else {
  echo "Error inserting data: " . $stmt->error;
}

// close the statement and the connection
$stmt->close();
$conn->close();
?>
