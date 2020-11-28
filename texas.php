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

$file_out = "teas.php"; // The image to return

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
?>
