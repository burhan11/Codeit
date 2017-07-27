<?php 


require_once('connection.php');

$hint=$_REQUEST["q"];

 $sql="select name from users where codeid ='".$hint."'";

$result=$con->query($sql);

if($result->fetch_assoc()){
echo $hint." is not available,try again";
}

elseif($hint==""){
echo "username cannot be left blank";}

else{

 echo $hint." is available";
}


?>


