<?php
session_start();
$value=$_REQUEST["q"];

$uname=$_SESSION["uname"];
require_once('connection.php');

$sql="select codeid from users where password='".$value."'";

$result=$con->query($sql);

if($row=$result->fetch_assoc())
echo "";

else

echo "Invalid password plz try again!!";




?>

