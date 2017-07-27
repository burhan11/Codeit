<?php
session_start();
$q=$_REQUEST["c"];
 $p=$_REQUEST["q"];
 $i=$_REQUEST["i"];
 $filename=$_SESSION["uname"].".txt";
$f=fopen($filename,"w") or die("could not open");
fwrite($f,$i);

if($q=="C"){
$file=$_SESSION["uname"].".c";
$myfile=fopen($file,"w") or die("could not open");
fwrite($myfile,$p);
fclose($myfile);


$output=shell_exec("gcc ".$file." 2>&1");
if($output!=NULL)
	echo $output;
else{
	if(strlen($i)!=0)
		$output=shell_exec("./a.out < ".$filename);
	else
		$output=shell_exec("./a.out");
	echo $output;	
 }
unlink($file);
}


if($q=="Python"){

$file=$_SESSION["uname"].".py";
$myfile=fopen($file,"w") or die("could not open");
fwrite($myfile,$p);
fclose($myfile);
	if(strlen($i)!=0)
		$output=shell_exec("python3 ".$file." < ".$filename." 2>&1");
	else
		$output=shell_exec("python3 ".$file." 2>&1");
	echo $output;
unlink($file);
}

if($q=="Cpp"){
				
$file=$_SESSION["uname"].".cpp";
$myfile=fopen($file,"w") or die("could not open");
fwrite($myfile,$p);
fclose($myfile);


$output=shell_exec("g++ ".$file." 2>&1");
if($output!=NULL)
	echo $output;
else{
	if(strlen($i)!=0)
		$output=shell_exec("./a.out < ".$filename);
	else
		$output=shell_exec("./a.out");
	echo $output;
	}
unlink($file);
}

if($q=="PHP"){
$file=$_SESSION["uname"].".php";
$myfile=fopen($file,"w") or die("could not open");
fwrite($myfile,$p);
fclose($myfile);

$output=shell_exec("php ".$file." < ".$filename." 2>&1");
echo $output;

unlink($file);
}


if($q=="Java"){
$file=$_SESSION["uname"].".java";
$myfile=fopen($file,"w") or die("could not open");
fwrite($myfile,$p);
fclose($myfile);

$output=shell_exec("javac ".$file." 2>&1");
if($output!=NULL)
	echo $output;
else{
	if(strlen($i)!=0)
		$output=shell_exec("java ".$_SESSION['uname']." < ".$filename);
	else
		$output=shell_exec("java ".$_SESSION['uname']);
	echo $output;
	}
unlink($file);
}

unlink($filename);
?>
