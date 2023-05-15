<?php
require_once "../db.php";

if (isset($_GET['divName'])) {
  $divName = $_GET['divName'];
  echo "The value of divName is: " . $divName;
} else {
  echo "divName is not set.";
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
