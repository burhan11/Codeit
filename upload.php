<?php

session_start();

$uname=$_SESSION["uname"];



?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="Uploadpage.css" type="text/css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
  	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.google.com/?selection.family=Arima+Madurai">
    <link rel="stylesheet" type="text/css" href="css/jquery.classyedit.css" />
    
    <script>

function  checka(){
var aname=document.getElementById("aname").value;


        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("aerror").innerHTML = xmlhttp.responseText;





            }
        };
        xmlhttp.open("GET", "checka.php?q="+aname, true);
        xmlhttp.send();





}
function  checkp(){

var pname=document.getElementById("pname").value;


        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("perror").innerHTML = xmlhttp.responseText;





            }
        };
        xmlhttp.open("GET", "checkp.php?q="+pname, true);
        xmlhttp.send();





}
</script>

    
    
    
    
    
    
</head>
<style type="text/css">


@-ms-viewport{
  width: device-width;
}

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
			  </button>
				<a href="#" class="navbar-brand"  style="background-color:#4090c3; color:white;">Code-!t</a>
			</div>
			<div  class="collapse navbar-collapse" id="mainNavbar">
				<ul class="nav navbar-nav" id="nav">
					<li><a href="#">Home</a></li>
					<li><a href="#">Profile</a></li>
`					<li><a href="Assg.php">Uploaded Questions</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right" id="nav-right">
					<li><a href="index.html" style="color: white;">Log-Out!</a></li>
				</ul>
			</div>
		</div>
	</nav>

	<!--Question Upload Page -->
	<form action="uupload.php" method="post"  enctype="multipart/form-data" >
	<div class="inner-wrapper rounded-cr-body">
		<div id="main-content-problem" class="box white">
			<table id="problem-page-top">
				<tr>
					<td width="28%">
						<h1 class="title" style="color: #1c7473 ;">Assignment No.:</h1>
					</td>
					<td>
						<input type="text" placeholder="Enter Asg_No." name="aid"style="width: 400px;" onblur="checka()">
						<div id="aerror"></div>
					</td>	
				</tr>
				<tr>
					<td width="28%">
						<h1 class="title" style="color: #1c7473 ;">Problem Id:</h1>
					</td>
					<td>
						<input type="text" placeholder="Enter Problem_Id" name="pid" style="width: 400px;" onblur="checkp()">
						<div id="perror"></div>
					</td>	
				</tr>
			</table>
			 <br>
			 <div id="problem-page-complete">
			 	<div class="upload">
			 		<div class="content">
			 		
			 			<b>Upload Question</b><br>
			 			<input type="file" name="ques" required = "required" >
			 			
			 			<hr>
			 		

			 			<div><b>Input file</b>
			 			<input type="file" name="input" id="input" required = "required">
			 			
			 			</div>
			 			<hr>
			 			
			 			
			 			<div><b>Output file</b>
			 			<input type="file" id ="output" name="output" required = "required">
			 			
			 			</div>
			 			<hr>
			 			<button class="btn btn-primary" style="margin:5px 18px;">Save & Upload</button>
			 			</form>
			 		</div>
			 	</div>
			 </div> 
		</div>
	</div>
</body>
</html>
