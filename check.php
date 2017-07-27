<?php


session_start();


require_once('connection.php');



$uname=$_POST["coderid"];

$pass=$_POST["coderpass"];


$sql="select name from users where codeid='".$uname."' and password='".$pass."'";

$result=$con->query($sql);


if($row=$result->fetch_assoc())

{

$_SESSION["uname"]=$uname;
session_start();
require('loginindex.php');

}
else{
require('index.html');

?>


<script>


alert("Invalid username or password");

</script>

<?php

}



?>