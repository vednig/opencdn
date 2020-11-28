<?php
$servername = "sql305.freesite.vip";
$username = "frsiv_27284947";
$password = "vEDANSH123";
$dbname = "frsiv_27284947_store";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM dubstep";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["hash"]. " - Name: " . $row["Admin Usename"]. " " . $row["Location"]. "<br>";
  }
} else {
  echo "0 results";
}
$conn->close();
?>