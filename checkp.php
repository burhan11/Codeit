<?php
$a=$_REQUEST["q"];
require_once('connection.php');
$sql ="select pid from problems where pid='".$a."'";

$result=$con->query($sql);


if($row=$result->fetch_assoc()){

echo $a." is not available !!";


}

elseif($a=="")
echo "Field cannot be left blank";

else{


echo $a." is available !";


}





?>