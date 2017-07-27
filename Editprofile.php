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
    <link href="Editprofile.css" type="text/css" rel="stylesheet">
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
</style>

<script>
  function checkName(){
    var x = document.getElementById("name");
    var v=x.value;
    var l=v.length;
    if(l<1){
      document.getElementById("outName").innerHTML = "Name Field Cannot Be Empty";
      x.style.borderColor = "red";
    }
    else{
      x.style.borderColor = "green";
     document.getElementById("outName").innerHTML = ""; 
    }
  }

    function checkCountry(){
    var x = document.getElementById("country");
    var v=x.value;
    var l=v.length;
    if(l<1){
      document.getElementById("outCon").innerHTML = "Country Field Cannot Be Empty";
      x.style.borderColor = "red";
    }
    else{
      x.style.borderColor = "green";
     document.getElementById("outCon").innerHTML = ""; 
    }
  }

    function checkInst(){
    var x = document.getElementById("inst");
    var v=x.value;
    var l=v.length;
    if(l<1){
      document.getElementById("outInst").innerHTML = "Institute Field Cannot Be Empty";
      x.style.borderColor = "red";
    }
    else{
      x.style.borderColor = "green";
     document.getElementById("outInst").innerHTML = ""; 
    }
  }

    function checkMail(){
    var x = document.getElementById("mail");
    var v=x.value;
    var l=v.length;
    if(l<1){
      document.getElementById("outMail").innerHTML = "Mail Field Cannot Be Empty";
      x.style.borderColor = "red";
    }
    else{
     x.style.borderColor = "green";
     document.getElementById("outMail").innerHTML = ""; 
    }
  }

  function validate(){
    var a = document.getElementById("name");
    var b = document.getElementById("country");
    var c = document.getElementById("inst");
    var d = document.getElementById("mail");

    var w = a.value;
    var x = b.value;
    var y = c.value;
    var z = d.value;

    if(w==""||y==""||z==""||x==""){
      alert("Please fill the empty fields before submitting for update.");
    }
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
					<li><a href="p.php">Profile</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle"
						data-toggle="dropdown">Practise <span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="editor.php">Code & Compile</a></li>
							<li><a href="problems.php">Problems</a></li>
						</ul>
					</li>
					<li><a href="#">My Submission</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right" id="nav-right">
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
          <form role="form" action="check.php" method="post">
            <div class="form-group">
              <label><span class="glyphicon glyphicon-pencil"></span>Current Password</label>
              <input type="text" name="coderid" class="form-control" required="required"  placeholder="Current Password">
              
            </div>
            <div class="form-group">
                <label><span class="glyphicon glyphicon-pencil"></span>New Password</label>
              <input type="password" name="coderpass" class="form-control" required="required"  placeholder="New Password">
              <div id="login_error"></div>
            </div> 
            <div class="form-group">
                <label><span class="glyphicon glyphicon-pencil"></span>Confirm Password</label>
              <input type="password" name="coderpass" class="form-control" required="required" placeholder="Confirm Password">
              <div id="login_error"></div>
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
   
   
          <div class="panel panel-info" style="width: 880px; height:520px;  border-color:black">
            <div class="panel-heading" style="background-color:black">
              <h3 class="panel-title" style="font-size: 16px;font-weight: 700; color: white;" ><?php echo $row["name"]?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
               	<div class="col-md-3 col-lg-3" id="pic" style="float: left;"> <img alt="User Pic" src=<?php echo $row["profile"]?>> 
               	</div>
                 <div class=" col-md-9 col-lg-9 "> 
<form action="update.php" method="post">
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td><b>Name:</b></td>
                        <td ><input id="name" name="name" type="text" value="<?php echo $row["name"] ?>" required ="required" onblur="checkName()"/>
                     <div id="outName"></div>      
                        </td>
                      </tr>
                     
                      <tr>
                        <td><b>Country:</b></td>
                        <td><input id = "country" name="country" type="text" value="<?php echo $row["country"] ?>" required="required" onblur = "checkCountry()"/>
                      <div id="outCon"></div>   
                        </td>
                      </tr>
                  	  <tr>
                        <td><b>Gender:</b></td>
                        <td>
                          <select name="gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                          </select>
                        </td>
                      </tr>
                      
                      <tr>
                        <td><b>Email:</b></td>
                        <td><input id="mail" name="email" type="email" value="<?php echo $row["email"] ?>" required="required" onblur="checkMail()" style="width: 250px;" />
                      <div id="outMail"></div>  
                        </td>
                      </tr>
                      
                      <tr>
                        <td><b>Institute:</b></td>
                        <td><input id="inst" name="institute"  type="text" value="<?php echo $row["institute"] ?>" required="required" onblur="checkInst()" style="width:100%;" />
                     <div id="outInst"></div> 
                        </td>
                      </tr>
                        
                       <tr>
                        <td><b>Qualification:</b></td>
                        <td>
                           <select  name="qual" style="width: 100px;">
                            <option value="BE">BE</option>
                            <option value="ME">ME</option>
                               <option value="PHD">Phd</option>


                          </select>
                        </td>
                      </tr>
                    
                    </tbody>
                  </table>

                </div>
              </div>
             </div>
             <br><br>
              
                <div class="panel-footer">
                        <button type="submit" onClick="validate()" class="btn btn-success"> <span class="glyphicon glyphicon-edit"></span> Save</button>
                </div>
            
          </div>

        </div>
        <br><br>
<?php

}

?>
</form>
    <script src="js/jquery-3.0.0.min.js"></script>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.classyedit.js"></script>
</body>
</html>
