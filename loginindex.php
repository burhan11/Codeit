<?php

session_start();
$uname=$_SESSION["uname"];

require_once('connection.php');

$sql="select * from users where codeid='".$uname."'";
$result=$con->query($sql);

while($row=$result->fetch_assoc()){


?>






<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">

<link href="css/bootstrap.min.css" rel="stylesheet">
  	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.google.com/?selection.family=Arima+Madurai">
    <link rel="stylesheet" type="text/css" href="css/jquery.classyedit.css" />
    

<style>
  body
  {
	
    background-size:100%;
  }

  .modal-header,.close {
      background-color:#282828 ;
      color:white;
      text-align: center;
      font-size: 30px;
  }
  #home{
  	margin:50px;
  }
  #gender{
  margin:30px;
  }
  #qualification{
  margin:30px;
  }
  #city{
  margin:100px;
  }
  #enroll{
  margin:50px;
  }
  #nav > li > a{
  	color: white;
  }
  
  .dropdown:hover #drop {
    display: block;
}
#student_pass{
color:red;
}
#student_name{
color:red
}
#codeid{
color:blue;
}
#faculty_pass{
color:red;
}
#faculty_name{
color:red
}
#codeid1{
color:blue;
}

#match_pass{
color:red;
}

#match_pass1{
color:red;
}
#image>img{
	width:30px;
	height: 22px;
	margin: 14px -5px; 
}
#image>img{
	border-radius: 50%;
}
</style>

</head>
<body>



<!-- Home Page-->

	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavbar">
				<span class="glyphicon glyphicon-option-vertical"></span>
				<span class="icon-bar"></span>
			 	<span class="icon-bar"></span>
			  </button>
				<a href="loginindex.php" class="navbar-brand"  style="background-color:#4090c3; color:white;">Code-!t</a>
			</div>
			<div  class="collapse navbar-collapse" id="mainNavbar">
				<ul class="nav navbar-nav" id="nav">
					<li><a href="loginindex.php">Home</a></li>
<?php
if($row["eno"]=="faculty"){

?>

                                         <li><a href="upload.php">Upload</a></li>
<?php
}
?>
					<li><a href="p.php">Profile</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle"
						data-toggle="dropdown">Practise <span class="caret"></span></a>
						<ul class="dropdown-menu" id="drop">
							<li><a href="editor.php">Code & Compile</a></li>
							<li><a href="problems.php">Problems</a></li>
                            <li><a href="#">Assignments</a></li>
						</ul>
					</li>
`					<li><a href="#">My Submission</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right" id="nav-right">
						<li id="image"><img src=<?php echo $row["profile"]?> /></li>
						<li><a href="p.php" style="color: white;"><?php echo $row["name"]?></a></li>
						<li><a href="index.html" style="color: white;">Log-Out!</a></li>>
				</ul>
			</div>
		</div>
	</nav>
<?php
}?>

<script src="js/jquery-3.0.0.min.js"></script>

  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.classyedit.js"></script>
    </script> 
<img src="http://devfloat.net/wp-content/uploads/2016/01/Code-It-Logical-HD-Wallpaper.jpg" width="1200" height="600">
</body>
</html>
		