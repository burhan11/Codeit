<?php 

session_start();

$uname=$_SESSION["uname"];

$new=$_POST["new"];

require_once('connection.php');

$sql="update users set password='".$new."' where codeid='".$uname."'";

if($con->query($sql))
{
?>


<script>
alert("password changed successfully!");


</script>
<?php

include('p.php');
}

else
{
?>
<script>
alert("password changed successfully!");
</script>

<?php

include('p.php');

}


?>