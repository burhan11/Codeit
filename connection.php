<?php
$servername = "localhost";
$username = "root";
$password = "as007@123";
$dbname="u121337729_code";
$con = new mysqli($servername, $username, $password, $dbname);

if ($con->connect_error){
   echo $con->error;
}

?> 
