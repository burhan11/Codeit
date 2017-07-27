<?php
session_start();
$q=$_REQUEST["c"];
$p=$_REQUEST["q"];
$pi=$_REQUEST["pid"];
$aid=$_REQUEST["aid"];
$filename="pin/".$aid."_".$pi."_input.txt";
$outputfile="pout/".$aid."_".$pi."_output.txt";
$f=fopen($outputfile,"r");
if(!isset($_SESSION["uname"])){
	echo "login";
	die();
}
if(!$f)
	echo "Not Found";
else{

$out=fread($f,filesize($outputfile));

$error=0;
$correct=0;

if($q=="C"){
$file=$_SESSION["uname"].".c";
$myfile=fopen($file,"w") or die("could not open");
fwrite($myfile,$p);
fclose($myfile);
$start=shell_exec("echo `date +%s`");

$output=shell_exec("gcc ".$file." 2>&1");
if($output!=NULL){
	$error=1;
//	echo $output;
}
else{
		$output=shell_exec("./a.out < ".$filename);
//	echo $output;	
 }
$end=shell_exec("echo `date +%s`");
 $ans=(int)$end-(int)$start;
 //echo $start."  ".$end."  ".$ans;
unlink($file);
if($error==1)
	echo "E";
else if($ans>=5)
	echo "T";
else if($out==$output){
	$correct=1;
	echo "C";
}
else
	echo "W";
echo $ans;
}


if($q=="Python"){

$file=$_SESSION["uname"].".py";
$myfile=fopen($file,"w") or die("could not open");
fwrite($myfile,$p);
fclose($myfile);

$start=shell_exec("echo `date +%s`");
$output=shell_exec("python3 ".$file." < ".$filename." 2>&1");
$end=shell_exec("echo `date +%s`");
$ans=(int)$end-(int)$start;
 //echo $start."  ".$end."  ".$ans;

unlink($file);
if($error==1)
	echo "E";
else if($ans>=5)
	echo "T";
else if($out==$output){
	$correct=1;
	echo "C";
}
else
	echo "W";
echo $ans;
}

if($q=="Cpp"){
				
$file=$_SESSION["uname"].".cpp";
$myfile=fopen($file,"w") or die("could not open");
fwrite($myfile,$p);
fclose($myfile);


$start=shell_exec("echo `date +%s`");

$output=shell_exec("g++ ".$file." 2>&1");
if($output!=NULL){
	$error=1;
//	echo $output;
}
else{
	$output=shell_exec("./a.out < ".$filename." 2>&1");
//	echo $output;
	}
$end=shell_exec("echo `date +%s`");
 $ans=(int)$end-(int)$start;
 //echo $start."  ".$end."  ".$ans;
unlink($file);
if($error==1)
	echo "E";
else if($ans>=5)
	echo "T";
else if($out==$output){
	$correct=1;
	echo "C";
}
else
	echo "W";
echo $ans;
}

if($q=="PHP"){
$file=$_SESSION["uname"].".php";
$myfile=fopen($file,"w") or die("could not open");
fwrite($myfile,$p);
fclose($myfile);

$start=shell_exec("echo `date +%s`");
$output=shell_exec("php ".$file." < ".$filename." 2>&1");

//echo $output;
if($output!=NULL)
	$error=1;

$end=shell_exec("echo `date +%s`");
 $ans=(int)$end-(int)$start;
 //echo $start."  ".$end."  ".$ans;
unlink($file);
if($error==1)
	echo "E";
else if($ans>=5)
	echo "T";
else if($out==$output){
	$correct=1;
	echo "C";
}
else
	echo "W";
echo $ans;
}


if($q=="Java"){
$file=$_SESSION["uname"].".java";
$myfile=fopen($file,"w") or die("could not open");
fwrite($myfile,$p);
fclose($myfile);

$start=shell_exec("echo `date +%s`");

$output=shell_exec("javac ".$file." 2>&1");
if($output!=NULL){
	$error=1;
	//echo $output;
}
else{
		$output=shell_exec("java ".$_SESSION['uname']." < ".$filename);
//		echo $output;
	}
$end=shell_exec("echo `date +%s`");
 $ans=(int)$end-(int)$start;
// echo $start."  ".$end."  ".$ans;
unlink($file);
if($error==1)
	echo "E";
else if($ans>=5)
	echo "T";
else if($out==$output){
	$correct=1;
	echo "C";
}
else
	echo "W";
echo $ans;
}

if($correct==1){
	require_once("connection.php");
	$sql="update problems set totalsub=totalsub+1 where pid='".$pi."'";
	$result=$con->query($sql);
	if(!$result)
		echo $con->error;
	require_once("connection.php");
	$time=date("Y-m-d");
	$sql="insert into submission values('".$_SESSION["uname"]."','".$pi."','".$aid."','".$time."','".$q."')";
	$result=$con->query($sql);
	if(!$result)
		echo $con->error;

}
}


?>
