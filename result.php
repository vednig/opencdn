<?php
// Allow from any origin
if(isset($_SERVER["HTTP_ORIGIN"]))
{
    // You can decide if the origin in $_SERVER['HTTP_ORIGIN'] is something you want to allow, or as we do here, just allow all
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
}
else
{
    //No HTTP_ORIGIN set, so we allow any. You can disallow if needed here
    header("Access-Control-Allow-Origin: *");
}

header("Access-Control-Allow-Credentials: true");
header("Access-Control-Max-Age: 60");    // cache for 1 minutes

if($_SERVER["REQUEST_METHOD"] == "OPTIONS")
{
    if (isset($_SERVER["HTTP_ACCESS_CONTROL_REQUEST_METHOD"]))
        header("Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE, PUT"); //Make sure you remove those you do not want to support

    if (isset($_SERVER["HTTP_ACCESS_CONTROL_REQUEST_HEADERS"]))
        header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");

    //Just exit with 200 OK with the above headers for OPTIONS method
    exit(0);
}
//From here, handle the request as it is ok
header('Set-Cookie: cookie2=value2; SameSite=None; Secure', false);
//header('Content-Disposition: attachment; filename="downloaded.jpg"');
/* Add your sql credentials and read Readme.md for Sql database structure*/
$servername = "*****";
$username = "mseet_27325869";
$password = "vEDANSH12345";
$dbname = "mseet_27325869_store";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$powerkeyn =$_GET["hash"];
$a = 11;

if(is_numeric($powerkeyn)){
    //echo $a;

    
$sql = "SELECT * FROM dubstep WHERE hash=".$powerkeyn."";
$result = $conn->query($sql);
//echo "Hello";
if ($result->num_rows > 0) {
    //echo "Hello";
  // output data of each row
  while($row = $result->fetch_assoc()) {
$file_out =strval($row["Location"]); // The image to return

if (file_exists($file_out)) {


   $image_info = getimagesize($file_out);

   //Set the content-type header as appropriate
   //header("Content-type: image/jpeg");
   header('Content-Type: ' . $image_info['mime']);

   //Set the content-length header
   header('Content-Length: ' . filesize($file_out));

   //Write the image bytes to the client
   readfile($file_out);
   #header("Cache-Control: no-cache");
    
    header('Set-Cookie: cookie2=value2; SameSite=None; Secure', false);
   if ($_GET["value"]=="js"){
         header('Content-Type: application/js');
   }
    if ($_GET["value"]=="css"){
         header('Content-Type: application/css');
   }
    if ($_GET["value"]=="txt"){
         header('Content-Type: text/html');
   }
   
    if ($_GET["value"]=="html"){
         header('Content-Type: text/html');
   }
   
    if ($_GET["value"]=="xml"){
         header('Content-Type: text/xml');
   }
}
else
if ($_GET["value"]=="img"){
        //Replace opencdn.hstn.me with your host.
       //header("Location: http://opencdn.hstn.me/src/serve.php?hash=".$_GET["hash"]);
   }
else { // Image file not found

    header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");

}
  }
} else {
  echo "Details Invalid";
}
$conn->close();
}else{
    echo $a+1;
    return $a+1;
    $conn->close();
}


?>
