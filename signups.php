<?php
require_once("connection.php");

$name = $_POST["sname"];
$iname = $_POST["Iname"];
$pass = $_POST["Spass"];
$gen = $_POST["Gender"];
$id = $_POST["Handle"];
$roll = $_POST["Roll_No"];
$email = $_POST["email"];
$coun = $_POST["country"];
$qual = $_POST["qual"];
$pp;
if($gen==="Male")
  $pp="profile_pic/male.jpg";
else
  $pp="profile_pic/female.jpg";

$sql = "INSERT INTO users(codeid,password,name,institute,eno,gender,email,country,qualification,profile) VALUES('".$id."','".$pass."','".$name."','".$iname."','".$roll."','".$gen."','".$email."','".$coun."','".$qual."','".$pp."')";

if($con->query($sql)){
  require 'index.html';
  ?>
  <script>
    alert("Succresfully registered!!")
  </script>
<?php
}
else{
  require 'index.html';
  ?>
  <script>
    alert("Oops, Something went wrong. Try Again Later!!");
  </script>
<?php
}

?>