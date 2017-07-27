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
    <link href="problemstyle.css" type="text/css" rel="stylesheet">
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
			  </button>
				<a href="#" class="navbar-brand"  style="background-color:#4090c3; color:white;">Code-!t</a>
			</div>
			<div  class="collapse navbar-collapse" id="mainNavbar">
				<ul class="nav navbar-nav" id="nav">
					<li><a href="index.html">Home</a></li>
					<li><a href="p.php">Profile</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle"
						data-toggle="dropdown">Practise <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="editor.php">Code,Compile & Run</a></li>
							<li><a href="problem.php">Problems</a></li>
							<li><a href="#">Assignments</a></li>
						</ul>
					</li>
`					<li><a href="#">My Submission</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right" id="nav-right">
					<li><a href="index.html" style="color: white;">Log-Out!</a></li>
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
						<h1 class="title" style="color: #1c7473 ;">Problems</h1>
					</td>	
				</tr>
			</table>
			<br>
			  <div id="problem-page-complete">
			  	 <div id="problem">
			  	 	<div class="content">
			  	 		  <div class="center topbox-small-2">
            <h3 style="color: #656565;font-size: 18px;margin: 12px 330px;font-weight: 700; margin-bottom: 12px;">PROBLEMS</h3>
        </div>
        <br>
      <div class="block block-block" style="border:1px solid;">

            <table class="table table-user-information">
                <thead style="background-color: black;">
                  <tr>
                    <th style="color: white;" >Problem Id</th>
                    <th style="color: white;">Successful Submission</th>
                    <th style="color: white;">Date of Upload</th>
                    <th style="color: white;">Accuracy</th>
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
                        <td><span class="glyphicon glyphicon-ok" style="color: green;"></span><b><a href="<?php echo "ques.php?q=".$row["pid"]?>"><?php echo $row["pid"]; ?></a></b></td>
                        <td style="color: brown"><?php echo $row["totalsub"]; ?></td>
                        <td style="color: brown"><?php echo $row["dou"]; ?></td>
                        <td style="color: brown"><?php echo $row["dou"]; ?></td>
                      </tr>
                      
                <?php
           }else{
           ?>
                      <tr>
                        <td><b><a href="<?php echo "ques.php?q=".$row["pid"]?>"><?php echo $row["pid"]; ?></a></b></td>
                        <td style="color: brown"><?php echo $row["totalsub"]; ?></td>
                        <td style="color: brown"><?php echo $row["dou"]; ?></td>
                        <td style="color: brown"><?php echo $row["dou"]; ?></td>
                      </tr>
           <?php
           }
}
?>
                  </tbody>
            </table>
    </div>
			  	 	</div>
			  	 	<br><br>
			  	 	 
			  	 </div>
			  </div>
		</div>
	</div>
</body>
</html>