<?php
include("./secrets.php");
$hostName = "localhost";
$userName = $DB_USER;
$password = $DB_PASS;
$databaseName = $DB_NAME;

// Create connection
$conn = new mysqli($hostName, $userName, $password, $databaseName);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

?>