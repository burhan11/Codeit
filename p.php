<?php

session_start();

$code=$_SESSION["uname"];
require_once('connection.php');

$sql="select * from users where codeid='".$code."'";

$result=$con->query($sql);
while($row=$result->fetch_assoc()){







?>





<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

function checkpass(){
var x=document.getElementById("old").value;
 var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("logo").innerHTML = xmlhttp.responseText;





            }
        };
        xmlhttp.open("GET", "exist.php?q="+x, true);
        xmlhttp.send();
}

function match(){
var x=document.getElementById("new1").value;

var y=document.getElementById("new2").value;

if(x!=y)

document.getElementById("login_error").innerHTML="Password mismatch try again";

else if( x.length<6)
document.getElementById("login_error").innerHTML="Password must be atleast 6 characters in length";


}




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
				<a href="loginindex.php" class="navbar-brand"  style="background-color:#4090c3; color:white;">Code-!t</a>
			</div>
			<div  class="collapse navbar-collapse" id="mainNavbar">
				<ul class="nav navbar-nav" id="nav">
					<li><a href="loginindex.php">Home</a></li>
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
                                        <li id="image"><img src=<?php echo $row["profile"]?> /></li>
                                        <li><a href="#" style="color: white;"><?php echo $row["name"]?></a></li>
					<li><a href="index.html" style="color: white;">Log-Out!</a></li>
				</ul>
			</div>
		</div>
	</nav>
</div>

<div class="modal fade" id="CP">
      <div class="modal-dialog" style="width:400px;">
      <div class="modal-content">
        <div class="modal-header" style="background-color: black;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <div class="modal-title" style="color:white;">Change Password</span>
     </div>
        </div>
        <div class="modal-body">
          <form role="form" action="changep.php" method="post">
            <div class="form-group">
              <label><span class="glyphicon glyphicon-pencil"></span>Current Password</label>
              <input type="text" id="old" onblur="checkpass()" class="form-control" placeholder="Current Password">
               <span id="logo"></span>
            </div> 
            <div class="form-group">
                <label><span class="glyphicon glyphicon-pencil"></span>New Password</label>
              <input type="password" name="new" id="new1" class="form-control" placeholder="New Password">
            </div> 
            <div class="form-group">
                <label><span class="glyphicon glyphicon-pencil"></span>Confirm Password</label>
              <input type="password" name="new" id="new2" onblur="match()" class="form-control" placeholder="Confirm Password">
              <span id="login_error"></span>
            </div> 

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success pull-right"><span class="glyphicon glyphicon-edit"></span> Save</button>
          </form>

        </div>
        </div>
    </div>
    </div>
  </div>



<div class="inner-wrapper rounded-cr-body">
	<div class="container">
      <div class="row">
      
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 " >
   
   
          <div class="panel panel-info" style="width: 750px; height:530px;  border-color:black">
            <div class="panel-heading" style="background-color:black">
              <h3 class="panel-title" style="font-size: 16px;font-weight: 700; color: white;" ><?php echo $row["name"]?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
               	<div class="col-md-3 col-lg-3" id="pic" style="float: left;"> <img alt="User Pic" src=<?php echo$row["profile"]?>> 
               		<div class="profile-edit">
                    <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-pencil" style="color: white;"></span></a>
                        <ul class="dropdown-menu">
                        <form action="uimage.php" method = "post" enctype="multipart/form-data">
                        <li><input type="file" name="fileToUpload" id="filetoUpload"></li>
                        <li><input type="submit" name="submit" value="upload"></li>
                        </form>
                        </ul>
                    </li>  
               		</div>
               	</div>
                 <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td><b>Code!t handle:</b></td>
                        <td style="color: brown"><?php echo $row["codeid"] ?></td>
                      </tr>
                      <tr>
<?php
$f;
if($row["country"]=='India')
$f="flags/india.png";

else if($row["country"]=="China")
$f="flags/china.png";
else if($row["country"]=="Australia")
$f="flags/australia.jpg";

else if($row["country"]=="Japan")
$f="flags/japan.png";

else if($row["country"]=="Russia")
$f="flags/russia.png";
else if($row["country"]=="USA")
$f="flags/america.png";

?>
                        <td><b>Country:</b></td>
                        <td><img src=<?php echo $f?> > <?php echo$row["country"]?></td>
                      </tr>
                  	  <tr>
                        <td><b>Gender:</b></td>
                        <td><?php echo $row["gender"]?></td>
                      </tr>
                       
                      <tr>
                        <td><b>Email:</b></td>
                        <td><a href="#"><?php echo $row["email"]?></a></td>
                      </tr>
                        <td><b>Institute:</b></td>
                        <td><?php echo $row["institute"]?></td>
                      </tr>
                       <tr>
                        <td><b>Qualification:</b></td>
                        <td><?php echo $row["qualification"]?></td>
                      </tr>
                      </tr><?php
}




?>


<?php

$sql2="select count(*) from submission where codeid='".$code."'";
$result=$con->query($sql2);
while($row=$result->fetch_assoc()){
?>
                        <td><b>Successfully Solved:</b></td>
                        <td><?php echo $row["count(*)"]?></td>
                      </tr>
                     <?php

}
?>



                    </tbody>
                  </table>
                   <button href="#" type="button" class="btn btn-primary" id="btnTrigger" data-toggle="modal" data-target="#CP"> <span class="glyphicon glyphicon-pencil"></span> Change Password</button>
                </div>
              </div>
             </div>
                <div class="panel-footer">
<form action="Editprofile.php" method="get">
                        <button type="submit" href="Editprofile.html" class="btn btn-primary"> <span class="glyphicon glyphicon-edit"></span>Edit</button>
</form>
                </div> 
            
          </div>

        </div>
<?php

$sql3="select * from submission where codeid='".$code."' order by dos ";

$result=$con->query($sql3);

while($row=$result->fetch_assoc()){




?>
        <br><br>
        <div class="center topbox-small-2">
            <h3 style="color: #656565;font-size: 15px;margin: 10px 130px;font-weight: 700;">RECENT ACTIVITY</h3>
        </div>
        <br>
      <div class="block block-block" style="border:1px solid;">

            <table class="table table-user-information">
                <thead style="background-color: black;">
                  <tr>
                    <th style="color: white">Problem</th>
                    <th style="color: white;">Language</th>
                   <th style="color: white;">Date</th>
                  </tr>
                </thead>
                  <tbody>
                      <tr>

                        <td><a href="<?php echo "ques.php?q=".$row["pid"]?>"> <?php echo $row["pid"]?></a></td>
                        <td><?php echo $row["lang"]?></td>
                      <td><?php echo $row["dos"]?></td>
                      </tr> 
                  </tbody>
            </table>
    </div>
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
