<?php
$nameErr = $emailErr = $phoneErr = $messageErr = $custTypeErr ="";
$name = $email = $phone = $message ="";
 $custType=$_POST["custType"];
/*Checking Empty or not*/

if($_SERVER["REQUEST_METHOD"]=="POST")
{
  if(empty($_POST["name"]))
  {
    $nameErr = "Name is required";
  }



  else {
    $name=test_input($_POST["name"]);
  }

  if(empty($_POST["email"]))
  {
    $emailErr = "Email is required";
  }
  else {
    $email=test_input($_POST["email"]);
  }

  if(empty($_POST["phone"]))
  {
    $phoneErr = "Mobile Number is required";
  }
  else {
    $phone=test_input($_POST["phone"]);
  }


  if(empty($_POST["custType"]))
  {
    $custTypeErr = "This field is required";
  }
  else {
    $custTypeErr=test_input($_POST["custType"]);
  }


  if(empty($_POST["message"]))
  {
    $messageErr = "Message is required";
  }
  else {
    $message=test_input($_POST["message"]);
  }

}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
  /*form validation*/
  if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
  $nameErr = "Only letters and white space allowed";
  }

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
     $emailErr = "Invalid Email";
   }
   if(!preg_match('/^[0-9]{10}+$/', $phone))
  {
    $phoneErr = "only numbers allowed";
  }
/*  if($custType >"0" && $custType<'5' == false) //form validation
  {
    $custTypeErr="Invalid data in field";
  }*/


$dbhost = "127.0.0.1";
$dbuser = "krishna";
$dbpass = "admin";
$db = "infolks";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO visitors (name, email, phone,type,message) VALUES ('$name','$email','$phone','$custType','$message')";
if($conn->query($sql))
{
  echo"success";
}
else {
  echo"fail".mysqli_error($conn);
}

$conn->close();







  ?>
