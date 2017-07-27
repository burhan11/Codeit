<?php
session_start();
$problems=array();
if(isset($_SESSION["uname"])){
$code=$_SESSION["uname"];
require_once('connection.php');

$sql3="select * from submission where codeid='".$code."' order by dos ";

$result=$con->query($sql3);
array_push($problems,"#");
while($row=$result->fetch_assoc()){
array_push($problems,$row["pid"]);
}
}
?>





<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link href="pstyle.css" type="text/css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
  	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.google.com/?selection.family=Arima+Madurai">
    <link rel="stylesheet" type="text/css" href="css/jquery.classyedit.css" />
<style type="text/css">
  
body{
  background-color:#F5F5DC;
 }
 .block{
    margin: 0 0 5px;
    margin-top: 0px;
    margin-right:-40px;
    margin-bottom: 5px;
    margin-left:0px;
    float: right;
    width: 410px;
    height: 470px;
    overflow-y: auto;
    position: relative;
 }
 .topbox-small-2{
    border: 1px solid #B3B3B3;
    padding-top: 8px;
    background: #f1f1f1;
    float: left;
    font-size: 12px;
    margin: 0 0 5px;
    margin-top: 0px;
    margin-right:-40px;
    margin-bottom: 5px;
    margin-left:0px;
    float: right;
    width: 410px;
    position: relative;
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
<script>




</script>
</head>
<body>
<nav class="navbar navbar-inverse">
<div class="container-fluid">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			 	<span class="icon-bar"></span>
			  </button>
        <?php
        if(isset($_SESSION["uname"])){
        ?>
				<a href="loginindex.php" class="navbar-brand"  style="background-color:#4090c3; color:white;">Code-!t</a>
        <?php
        }
        else{
          ?>
          <a href="index.html" class="navbar-brand"  style="background-color:#4090c3; color:white;">Code-!t</a>
       <?php 
        }
       ?>
			</div>
			<div  class="collapse navbar-collapse" id="mainNavbar">
				<ul class="nav navbar-nav" id="nav">
					 <?php
        if(isset($_SESSION["uname"])){
        ?>
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
							<li><a href="editor.php">Code,Compile & Run</a></li>
							<li><a href="problems.php">Problems</a></li>
							<li><a href="#">Assignments</a></li>
						</ul>
					</li>
`					<li><a href="#">My Submission</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right" id="nav-right">
        <?php
          if(isset($_SESSION["uname"])){
            ?>
          <li><a href="index.html" style="color: white;">Log-Out!</a></li>
          <?php
          }
          ?>

				</ul>
			</div>
		</div>
	</nav>
</div>

<div class="inner-wrapper rounded-cr-body">
	<div class="container">
      <div class="row">
      
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 " >
   
   
          <div class="panel panel-info" style="width: 750px; height:530px;  border-color:black">
            <div class="panel-heading" style="background-color:black">
              <h3 class="panel-title" style="font-size: 16px;font-weight: 700; color: white;" >Problems</h3>
            </div>
            <div class="panel-body">
              <div class="row">
               	<div class="col-md-3 col-lg-3" id="pic" style="float: left;">  
               		<div class="profile-edit">
               			<span class="glyphicon glyphicon-pencil" style="color: white;"></span>
               		</div>
               	</div>
                 <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <thead style="background-color: black;">
                        <tr>
                          <th style="color: white">Problem Code</th>
                          <th style="color: white;">Successful Submission</th>
                          <th style="color: white;">Date of Upload</th>
                       </tr>
                   </thead>

                    <tbody>
<?php
require_once('connection.php');

$sql="select * from problems order by dou desc";

$result=$con->query($sql);
while($row=$result->fetch_assoc()){
          if(isset($_SESSION["uname"]) && array_search($row["pid"],$problems,true)){
?>
                      <tr>
                        <td><span class="glyphicon glyphicon-ok" style="color: green;"></span><b><a href="<?php echo "ques.php?q=".$row["pid"]?>"><?php echo $row["pid"] ?></a></b></td>
                        <td style="color: brown"><?php echo $row["totalsub"] ?></td>
                        <td style="color: brown"><?php echo $row["dou"] ?></td>
                      </tr>
                      
                <?php
           }else{
           ?>
                      <tr>
                        <td><b><a href="<?php echo "ques.php?q=".$row["pid"]?>"><?php echo $row["pid"] ?></a></b></td>
                        <td style="color: brown"><?php echo $row["totalsub"] ?></td>
                        <td style="color: brown"><?php echo $row["dou"] ?></td>
                      </tr>
           <?php
           }
}
?>



                    </tbody>
                  </table>
                </div>
              </div>
             </div>
                <div class="panel-footer">
                </div> 
            
          </div>

        </div>
<?php

$sql3="select * from submission where codeid='".$code."' order by dos ";

$result=$con->query($sql3);

while($row=$result->fetch_assoc()){




?>
</div>  



<?php


}

?>












    <script src="js/jquery-3.0.0.min.js"></script>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.classyedit.js"></script>










</body>
</html>		