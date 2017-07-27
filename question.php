<?php
	$q=$_REQUEST["q"];

	include("connection.php");

	$sql="select * from problems where pid='".$q."'";

	if(!$result=$con->query($sql))
	    echo $con->error;

	if($row=$result->fetch_assoc()){
		$loc=$row["location"];
	$myfile = fopen($loc, "r") or die("Unable to open file!");
    echo fread($myfile,filesize($loc));
	fclose($myfile);
	}else{
	  echo $con->error;
	}
?>