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

$sql = "SELECT * FROM dubstep";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
$file_out = strval($row["Location"]); // The image to return

if (file_exists($file_out)) {

   $image_info = getimagesize($file_out);

   //Set the content-type header as appropriate
   header('Content-Type: ' . $image_info['mime']);

   //Set the content-length header
   header('Content-Length: ' . filesize($file_out));

   //Write the image bytes to the client
   readfile($file_out);
}
else { // Image file not found

    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");

}
  }
} else {
  echo "Invalid Details";
}
$conn->close();
?>
