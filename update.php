<?php
  session_start();
  require_once('connection.php');
  $code = $_SESSION["uname"];
  $name = $_POST["name"];
  $country = $_POST["country"];
  $gen = $_POST["gender"];
  $mail = $_POST["email"];
  $inst = $_POST["institute"];
  $qual = $_POST["qual"];

  $res=$res1=$res2=$res3=$res4=$res5=TRUE; 

  if(!empty($name)){
  	$sql = "UPDATE users SET name='".$name."' WHERE codeid ='".$code."'";
  	$res = $con->query($sql);
  }
  if(!empty($country)){
  	$sql1 = "UPDATE users SET country='".$country."' WHERE codeid ='".$code."'";
  	$res1 = $con->query($sql1);
  }

  if(!empty($gen)){
  	$sql2 = "UPDATE users SET gender='".$gen."' WHERE codeid ='".$code."'";
  	$res2 = $con->query($sql2);
  }

  if(!empty($mail)){
  	$sql3 = "UPDATE users SET email='".$mail."' WHERE codeid ='".$code."'";
  	$res3 = $con->query($sql3);
  }

  if(!empty($inst)){
  	$sql4 = "UPDATE users SET institute='".$inst."' WHERE codeid ='".$code."'";
  	$res4 = $con->query($sql4);
  }

  if(!empty($qual)){
  	$sql5 = "UPDATE users SET qualification='".$qual."' WHERE codeid ='".$code."'";
  	$res5 = $con->query($sql5);
  }

  if($res&&$res1&&$res2&&$res3&&$res4&&$res5){
  	require('loginindex.php');
  	?>
  	<script>
  		alert("All Changes DONE SUCCESSFULLY!!");
  	</script>
    <?php
  }

  else{
  	require('loginindex.php');
  	?>
  	<script>
  		alert("OOPS!! SOmething went wrong. Try again later...");
  	</script>
    <?php
  }
?>