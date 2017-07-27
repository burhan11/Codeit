<!DOCTYPE html>
<html>
<head>
<style>
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 5px;
    text-align: left;
}
</style>
</head>
<body>

<?php
	
	$q=$_REQUEST["a"];
	include("connection.php");
	$sql="select * from assignment where aid='".$q."'";
if(!$result=$con->query($sql))
    echo $con->error;

if($row=$result->fetch_assoc()){
	 $aid=$row["aid"];
	 $mark=$row["max_marks"];
	 $dou=$row["dou"];
	 $dos=$row["dos"];
?>

<b>Submission Date:-&nbsp<?php echo $dos;?></b><b style=" float:right;">MAX MARKS:-&nbsp<?php echo $mark;?></b></p>
<p></p>
<p></p>
<p></p>
<table style="width:100%">
  <tr style="width: 55%">
    <th>Problem Code</th>
    <th>Successful Submission</th>
    <th>Accuracy</th>
  </tr>

<?php
	$c=1;
		include("connection.php");
		$sql="select count(*) from users";
		if(!$result=$con->query($sql))
	    	echo $con->error;
		if($row=$result->fetch_assoc()){
		    $c=$row["count(*)"];
		}

		$sql="select * from problems where aid='".$aid."' order by totalsub desc";

	if(!$result=$con->query($sql))
	    echo $con->error;
	while($row=$result->fetch_assoc()){
		$pid=$row["pid"];
		$sub=$row["totalsub"];
		$acc=(double)$sub/(double)$c;
?>
		<tr style="width: 55%">
    		<td><a href="ques.php?q=<?php echo $pid; ?>" ><?php echo $pid;?></a><button onclick="display('<?php echo $pid; ?>')" style="float: right; color:#fff; background-color:#46b8da;  padding: 10px;font-size: 12px;
                                box-shadow: 0 1px 3px 0 rgba(0,0,0,.5);
                                border-radius: 2px;
                                transition: background .2s ease-in;
                                font-weight: 400;
                                border: none;  width: 50px;">View</button></td>
    		<td><?php echo $sub;?></td>
    		<td><?php echo $acc;?></td>
  		</tr>

<?php
	}
}else{
  echo $con->error;
}
?>

</table>
</body>
</html>