<?php
$nameErr = $emailErr = $phoneErr =$socialLinkErr ="";
$name = $email = $phone = $socialLink="";
 //$custType=$_POST["custType"];
/*Checking Empty or not*/

if($_SERVER["REQUEST_METHOD"]=="POST")
{

    $name=test_input($_POST["influ-name"]);
    $email=test_input($_POST["email"]);
    $phone=test_input($_POST["phone"]);
    $socialLink=test_input($_POST["sociallink"]);
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

$sql = "INSERT INTO influencers (name,sociallink,email,phone) VALUES ('$name','$socialLink','$email','$phone')";
if($conn->query($sql))
{
  echo"success";
}
else {
  echo"fail ".mysqli_error($conn);
}

$conn->close();







  ?>
