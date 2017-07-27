
<?php 

session_start();

$uname=$_SESSION["uname"];

$aid=$_GET["q"];

require_once('connection.php');

$sql="select pid from problems where aid='".$aid."'";

$result=$con->query($sql);

while($row=$result->fetch_assoc()){

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
					<li><a href="loginindex.php">Home</a></li>
					<li><a href="p.php">Profile</a></li>
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
						<h1 class="title" style="color: #1c7473 ;"> <?php echo $aid?></h1>
					</td>	
				</tr>
			</table>
			<br>
			  <div id="problem-page-complete">
			  	 <div id="problem">
			  	 	<div class="content">
			  	 		  <div class="center topbox-small-2">
            <h3 style="color: #656565;font-size: 18px;margin: 12px 330px;font-weight: 700; margin-bottom: 12px;"><?php echo $aid?></h3>
        </div>
        <br>
      <div class="block block-block" style="border:1px solid;">

            <table class="table table-user-information">
                <thead style="background-color: black;">
                  <tr>
                    <th style="color: white;width:40%;" >Problem Id</th>
                    
                    <th style="color: white;">Successful Submission</th>
                    
                   
                  </tr>
                </thead>
                  <tbod>
                      <tr>
                        <td><a href="ques.php?q=<?php echo $["pid"]?>"> <?php echo $row["pid"]</a></td>
                        
                        <td> <?php echo $row["totalsub"]?> </td>
                        
                      </tr>
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
