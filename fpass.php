<?php
require_once("connection.php");

$email=$_POST["e"];
$sql ="select * from users where email='".$email."'";
$result=$con->query($sql);


if($row=$result->fetch_assoc()){


        $emailcut = substr($email, 0, 4);
		$randNum = rand(10000,99999);
		$tempPass = $emailcut.$randNum;
		
		$sql1 = "UPDATE users SET password='".$tempPass."' WHERE email='".$row['email']."' ";
        $con->query($sql1);
        $to = $email;
		$from = "jain.abhinav2406@gmail.com";
		$headers ="From: Code!T";
		
		$subject ="yoursite Temporary Password";
		$msg = "hello ".$row['name'].".The new temporary password for your code!t login is ".$tempPass." click here to login: www.coders.pe.hu";
		if(mail($to,$subject,$msg,$headers)) {
			include('index.html');
?>
<script>
alert("we have sent the new login password to ur repected email-id plz visit and sign-in");
</script>
<?php
			exit();
		} else {
			echo "email_send_failed";
			exit();
		}
    
}
else{

include('index.html');
?>
<script>
alert("your credential doesnot match,plz try again");
</script>
<?php
}

?>