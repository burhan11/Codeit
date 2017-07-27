<?php

session_start();

$q=$_GET["q"];
require_once('connection.php');

$sql="select * from problems where pid='".$q."'";

$result=$con->query($sql);

while($row=$result->fetch_assoc())


{

?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="Quesstyle.css" type="text/css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
  	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.google.com/?selection.family=Arima+Madurai">
    <link rel="stylesheet" type="text/css" href="css/jquery.classyedit.css" />
</head>
<style type="text/css">

body{
  background-color:#F5F5DC;
 }

</style>
<body>
	<nav class="navbar navbar-inverse">
<div class="container-fluid">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			 	<span class="icon-bar"></span>
				 <?php
				 if(isset($_SESSION["uname"])){?>
			  </button>
				<a href="loginindex.php" class="navbar-brand"  style="background-color:#4090c3; color:white;">Code-!t</a>
				<?php }
				else{
					?>
					<a href="index.html" class="navbar-brand"  style="background-color:#4090c3; color:white;">Code-!t</a>
				<?php }
				?>
			</div>
			<div  class="collapse navbar-collapse" id="mainNavbar">
				<ul class="nav navbar-nav" id="nav">
				<?php
				 if(isset($_SESSION["uname"])){ ?>
					<li><a href="loginindex.php">Home</a></li>
					<li><a href="p.php">Profile</a></li>
				<?php
				 }
				 else{
					 ?>
				 	<li><a href="index.html">Home</a></li>
				 <?php
				 }
				 ?>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle"
						data-toggle="dropdown">Practise <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="editor.php">Code & Compile</a></li>
							<li><a href="problems.php">Problems</a></li>
							<li><a href="#">Assignments</a></li>
						</ul>
					</li>
`					<li><a href="#">My Submission</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right" id="nav-right">
				<?php
				 if(isset($_SESSION["uname"])){ ?>
					<li><a href="index.html" style="color: white;">Log-Out!</a></li>
					<?php }
					?>
				</ul>
			</div>
		</div>
	</nav> 

	<!--Question Page -->
	<div class="inner-wrapper rounded-cr-body">
		<div id="main-content-problem" class="box white">
			<table id="problem-page-top">
				<tr>
					<td width="55%">
						<h1 class="title" style="color: #1c7473 ;"><?php echo $q?></h1>
					</td>	
				</tr>
			</table>
			  <div id="problem-page-complete">
			  	 <div id="problem">
			  	 	<div class="content">
			  	 		<b>Read Problem Carefully</b><br><br>
			  	 		<p>
<?php
$myfile = fopen($row["location"], "r") or die("Unable to open file!");
echo fread($myfile,filesize($row["location"]));
fclose($myfile);
}

?>


                                                </p>
			  	 		<hr>
			  	 		<table cellspacing="0" cellpadding="0" align="left">
							<tbody>
								<tr>
									<td width="2%"><b style="font-size: 18px;">Languages:</b></td>
									<td width="7%">C, C++, JAVA, PYTHON, PHP</td>
								</tr>
							</tbody>			  	 			
			  	 		</table>	
			  	 	</div>
			  	 	<br><br>
					<?php
				 if(isset($_SESSION["uname"])){?>
			  	 	<button href="#" style="color:#fff; background-color:#147089;  padding: 10px;font-size: 12px;
    							box-shadow: 0 1px 3px 0 rgba(0,0,0,.5);
    							border-radius: 2px;
    							transition: background .2s ease-in;
    							font-weight: 400;
    							border: none;margin: 8px 14px 12px;">SUBMIT</button>
				<?php }
				?>
			  	 </div>
			  </div>
		</div>
	</div>
</body>
</html>