<?php
$servername = "***";
$username = "***";
$password = "****";
$dbname = "****";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$hashn=$_GET["hash"]
$username=$_GET["user"]
$location=$_GET["storeloc"]
$sql = "INSERT INTO dubstep (hashn, AdminUsername, Location)
VALUES ($hashn,$username,$location)";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>
