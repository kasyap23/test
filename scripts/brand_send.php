<?php
$nameErr = $emailErr = $phoneErr =$webappLinkErr ="";
$name = $email = $phone = $webappLink="";
$success="";
 //$custType=$_POST["custType"];
/*Checking Empty or not*/

if($_SERVER["REQUEST_METHOD"]=="POST")
{

    $name=test_input($_POST["brand-name"]);
    $email=test_input($_POST["email"]);
    $phone=test_input($_POST["phone"]);
    $webappLink=test_input($_POST["webapplink"]);
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}


$dbhost = "127.0.0.1";
$dbuser = "krishna";
$dbpass = "admin";
$db = "infolks";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO brands (name,webapplink,email,phone) VALUES ('$name','$webappLink','$email','$phone')";
if($conn->query($sql))
{
  $success="Sent Successfully.. ";
}
else {
  $success="Oops..There is an error..";
}

$conn->close();







  ?>
