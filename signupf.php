<?php
require_once("connection.php");

$name = $_POST["sname"];
$iname = $_POST["Iname"];
$pass = $_POST["Spass"];
$gen = $_POST["Gender"];
$id = $_POST["Handle"];
$email = $_POST["email"];
$coun = $_POST["country"];
$qual = $_POST["qual"];
$pp;
if($gen==="Male")
  $pp="profile_pic/male.jpg";
else
  $pp="profile_pic/female.jpg";
$eno="faculty";
$sql = "INSERT INTO users(codeid,password,name,institute,gender,email,country,qualification,profile,eno) VALUES('".$id."','".$pass."','".$name."','".$iname."','".$gen."','".$email."','".$coun."','".$qual."','".$pp."','".$eno."')";

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
