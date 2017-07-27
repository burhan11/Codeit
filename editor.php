<?php

session_start();
$uname=$_SESSION["uname"];

require_once('connection.php');

$sql="select * from users where codeid='".$uname."'";
$result=$con->query($sql);

$row=$result->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
   <link href="Quesstyle.css" type="text/css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
  	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="https://fonts.google.com/?selection.family=Arima+Madurai">
    <link rel="stylesheet" type="text/css" href="css/jquery.classyedit.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <title>Editor</title>
  <style type="text/css" media="screen">


   #prob{
      list-style-type: none;
      background-color: #f1f1f1;
      position: relative;
      border: 2px solid grey;
      margin-left: 5%; 
      margin-top: 2%;
      height: 40px;
      width: 800px;
    }


    #box{
        position: relative;
        display: block;
        margin-top: 1%;
    }

    #editor {
        height: 500px;
        width: 800px; 
        position: relative;
        margin-top: 1%;
        margin-left:5%;
        border: 2px solid grey;
    }

    #header{
      list-style-type: none;
      background-color: #f1f1f1;
      position: relative;
      border: 2px solid grey;
      margin-left: 5%; 
      margin-top: 1%;
      height: 40px;
      width: 800px;
    }

    #submission{
        display:none;       
      background-color: #f1f1f1;
      position: relative;
      border: 2px solid grey;
      margin-left: 5%; 
      margin-top: 1%;
      height: 40px;
      width: 800px;
    }

    .droplist{
      float: right;
    }

    .droplist a, .drop{
      display: block;
      position: relative;
      text-decoration: none;
      text-align: center;
      padding: 4px 13px;
      height: 35px;
      color: #000;
      background-color: #dddddd;
    }
    .droplist a:hover, .droplist:hover .drop{
      background-color: #555;
      color: white;
    }

    .droplist{
      display: inline-block;
    }
    
    .langname{
      display: none;
      position: relative;
      background-color: #f9f9f9;
      min-width: 60px;
    }

    .langname a{
      color: black;
      padding: 10px,13px;
      text-decoration: none;
      text-align: left;
    }

  
    .droplist:hover .langname{
      display: block;
    }

    #btn{
        display: block;
        position: relative;
        margin-left: 5%; 
        margin-top:7%;
        height: 40px;
        width: 800px;
        border: 2px solid grey;
      }

    #btn button{
      float: right;
      padding: 13px;
      height: 100%;
      background-color: #dddddd;
    }

    #input{
        position: relative;
        margin-left: 70%;
        margin-top: -38%;
    }

    #output{
        position: relative;
        margin-left: 70%;
        margin-top: 1%;
    }
  #pro{
        display:none;
        position: relative;
        margin-left: 5%;
        margin-top: 1%; 
        width:800px;
  }

  #ass{
      display:none;
        position: relative;
        margin-left: 5%;
        margin-top: 1%; 
        width:800px;

  }

.ace_editor, .ace_editor * { font-family: "Monaco", "Menlo", "Ubuntu Mono", "Droid Sans Mono", "Consolas", monospace !important; font-size: 1em !important; font-weight: 400 !important; letter-spacing: 0 !important; }

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
<script>

function say(){


alert("hello");

}

function checkName(){

var x=document.getElementById("uname");
var v=x.value;
var l=v.length;
var re= /^[0-9]+$/;
if(l<1)
{

document.getElementById("student_name").innerHTML="name cannot left empty";
x.style.borderColor="red";

}

else if(re.test(v[0]))
{
document.getElementById("student_name").innerHTML="name cannot start with a number";

x.style.borderColor="red";

}

 else{
 
 document.getElementById("student_name").innerHTML="";
 
 x.style.borderColor="green";
 }


}

function checkPassword(){

var x=document.getElementById("upass");
var v=x.value;
var l=v.length;
var re= /^[A-Za-z0-9]+$/;
if(l<6)
{

document.getElementById("student_pass").innerHTML="password should atleast 6 characters in length";
x.style.borderColor="red";

}

else if(!re.test(v))
{
document.getElementById("student_pass").innerHTML="password should alphanumeric";

x.style.borderColor="red";

}

 else{
 
 document.getElementById("student_pass").innerHTML="";
 
 x.style.borderColor="green";
 }


}




function getHint(){

var x=document.getElementById("code");

var v=x.value;
var l=x.length;

    
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("codeid").innerHTML = xmlhttp.responseText;





            }
        };
        xmlhttp.open("GET", "gethint.php?q="+v, true);
        xmlhttp.send();
    }


function subCheck(){


var x=document.getElementById("uname").value;
var y=document.getElementById("upass").value;

var z=document.getElementById("code").value;


if(x=="" || y=="" || z=="")

alert("plz fill all the mandatory fields");





}

function checkName1(){

var x=document.getElementById("uname1");
var v=x.value;
var l=v.length;
var re= /^[0-9]+$/;
if(l<1)
{

document.getElementById("faculty_name").innerHTML="name cannot left empty";
x.style.borderColor="red";

}

else if(re.test(v[0]))
{
document.getElementById("faculty_name").innerHTML="name cannot start with a number";

x.style.borderColor="red";

}

 else{
 
 document.getElementById("faculty_name").innerHTML="";
 
 x.style.borderColor="green";
 }


}

function checkPassword1(){

var x=document.getElementById("upass1");
var v=x.value;
var l=v.length;
var re= /^[A-Za-z0-9]+$/;
if(l<6)
{

document.getElementById("faculty_pass").innerHTML="password should atleast 6 characters in length";
x.style.borderColor="red";

}

else if(!re.test(v))
{
document.getElementById("faculty_pass").innerHTML="password should alphanumeric";

x.style.borderColor="red";

}

 else{
 
 document.getElementById("faculty_pass").innerHTML="";
 
 x.style.borderColor="green";
 }


}




function getHint1(){

var x=document.getElementById("code1");

var v=x.value;
var l=x.length;

    
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("codeid1").innerHTML = xmlhttp.responseText;





            }
        };
        xmlhttp.open("GET", "gethint.php?q="+v, true);
        xmlhttp.send();
    }


function subCheck1(){


var x=document.getElementById("uname1").value;
var y=document.getElementById("upass1").value;

var z=document.getElementById("code1").value;


if(x=="" || y=="" || z=="")

alert("plz fill all the mandatory fields");

}


function matchPassword(){
  var x = document.getElementById("upass").value;
  var y = document.getElementById("cpass").value;

  if(x!=y){
    document.getElementById("match_pass").innerHTML = "Password not Matched.";
    x.style.borderColor="red";
    y.style.borderColor="red";
  }
  else
    document.getElementById("match_pass").innerHTML = "";
}


function matchPassword1(){
  var x = document.getElementById("upass1").value;
  var y = document.getElementById("upass2").value;

  if(x!=y){
    document.getElementById("match_pass1").innerHTML = "Password not Matched.";
    x.style.borderColor="red";
    y.style.borderColor="red";
  }
  else
    document.getElementById("match_pass1").innerHTML = "";
}
</script>
  <script type="text/javascript">
     
     function assignment(){
             var aid=document.getElementById("aid").value;  
//            alert(aid);
             var xmlhttp = new XMLHttpRequest();
             xmlhttp.onreadystatechange = function() {
               if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
  //                    alert(xmlhttp.responseText);               
                    document.getElementById("problems").innerHTML=xmlhttp.responseText;


                    var displayproperty=document.getElementById("ass");
                    displayproperty.style.display=(displayproperty.style.display === 'none' ? 'block' : 'none');
                    var displayproperty=document.getElementById("pro");
                    displayproperty.style.display='none';
               }
           };
      xmlhttp.open("POST","assignment.php", true);
      xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xmlhttp.send("a="+aid);

      }
     
      function display(p){
  //      alert("anand"+p);
  //           var pid=p;  
//                alert(pid);
             document.getElementById("setpid").value=p;
             var xmlhttp = new XMLHttpRequest();
             xmlhttp.onreadystatechange = function() {
               if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                 
                    
                    document.getElementById("quecontent").innerHTML=xmlhttp.responseText;


                    var displayproperty=document.getElementById("pro");
                    displayproperty.style.display=(displayproperty.style.display === 'none' ? 'block' : 'none');
               }
           };
            xmlhttp.open("POST","question.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("q="+p);

      }

      function displayset(){
                    var displayproperty=document.getElementById("submission");
                    displayproperty.style.display='none';
      }
      function foc(){
        document.getElementById("aid").style.color="black";
      }
  </script>

</head>
<body>
<?php
if(isset($_SESSION["uname"])){
?>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavbar">
        <span class="glyphicon glyphicon-option-vertical"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a href="index.html" class="navbar-brand"  style="background-color:#4090c3; color:white;">Code-!t</a>
      </div>
      <div  class="collapse navbar-collapse" id="mainNavbar">
        <ul class="nav navbar-nav" id="nav">
          <li><a href="#" style="color: white;">Home</a></li>
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
            data-toggle="dropdown" style="color: white;">Practise <span class="caret"></span></a>
            <ul class="dropdown-menu" id="drop">
              <li><a href="editor.php">Code,Compile & Run</a></li>
              <li><a href="problem.php">Problems</a></li>
              <li><a href="#">Assignments</a></li>
            </ul>
          </li>
           <li><a href="#">My Submission</a></li>
          </ul>
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
}else{
?>
  <nav class="navbar navbar-inverse">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mainNavbar">
        <span class="glyphicon glyphicon-option-vertical"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        </button>
        <a href="index.html" class="navbar-brand"  style="background-color:#4090c3; color:white;">Code-!t</a>
      </div>
      <div  class="collapse navbar-collapse" id="mainNavbar">
        <ul class="nav navbar-nav" id="nav">
          <li><a href="index.html">Home</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle"
            data-toggle="dropdown">Practise <span class="caret"></span></a>
            <ul class="dropdown-menu" id="drop">
              <li><a href="editor.php">Code,Compile & Run</a></li>
              <li><a href="problems.php">Problems</a></li>
            </ul>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right" id="nav-right">
          
            <li><a href="#" id="btnTrigger" data-toggle="modal" data-target="#popUp" style="color: white;">Log-in!</a></li>>
          <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: white;">Sign-up! <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="#" id="btnTrigger" data-toggle="modal" data-target="#popUpWindow">Faculty</a></li>
              <li><a href="#" id="btnTrigger" data-toggle="modal" data-target="#pop">Student</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>

<?php
}
?>
    <!-- Login for Student -->

     <div class="modal fade" id="popUp">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="modal-title">Log-in!</span>
       </div>
                </div>
                <div class="modal-body">
                    <form role="form" action="check.php" method="post">
                        <div class="form-group">
                            <label><span class="glyphicon glyphicon-pencil"></span>Code-!t</label>
                            <input type="text" name="coderid" class="form-control" placeholder="Enter Code-!t Id">
                            
                        </div>
                        <div class="form-group">
                            <label><span class="glyphicon glyphicon-pencil"></span>Password</label>
                            <input type="password" name="coderpass" class="form-control" placeholder="Password">
                            <div id="login_error"></div>
                        </div>  

                </div>
                
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success pull-right" >Log-in !</button>
                    </form> 
                    <button type="submit" class="btn btn-link pull-left" href="#" type="button" id="btnTrigger" data-toggle="modal" data-target="#FP" data-dismiss="modal">Forget Password?</button>
                    

                </div>

            </div>
        </div>
      </div>
    </div>

    <!-- Signup for Student -->

    <div class="modal fade" id="pop">
        <div class="modal-dialog" style="width: 750px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="modal-title">Sign-up!</span>
       </div>
                </div>
                <div class="modal-body">
                    <form role="form" action = "signups.php" method = "POST">
                        <div class="form-group">
                            <label><span class="glyphicon glyphicon-pencil"></span>Name</label>

                            <input type="text" id="uname" name="sname" class="form-control" placeholder="Enter your name" onblur="checkName()"/>

                                                     <div id="student_name">  </div>

                        </div>
                        <div class="form-group">
                            <label><span class="glyphicon glyphicon-inbox"></span>Institute</label>
                            <input type = "text" class="form-control" name = "Iname" placeholder = "Enter your Institute" required = "required">
                        </div>
                        <div class="form-group">
                            <label><span class="glyphicon glyphicon-pencil"></span>Password</label>
                            <input type="password" id="upass" name = "Spass" class="form-control" placeholder="Password" onblur="checkPassword()">
                                                        <span id="student_pass"> </span>
                         </div>
                         <div class="form-group">
                        
                            <label><span class="glyphicon glyphicon-pencil"></span>Confirm Password</label>
                            <input type="password" id="cpass" name = "Spass1" class="form-control" placeholder="Confirm Password" onblur="matchPassword()">
                            <div id = match_pass></div> 
                            
                        </div>

                        <div class="form-group">
                            <label><span class="glyphicon glyphicon-pencil"></span>Code-!t</label>
                            <input type="text"  id="code" name="Handle" class="form-control" onkeyup="getHint()" placeholder="Your Code-!t Id">
                                                        <div id="codeid">  </div>
                         </div>    
                         <div class="form-group"> 
                            <label><span class="glyphicon glyphicon-user"></span>Gender</label>
                            <select style="border-radius:5px; name="Gender" height:30px; width:200px">
                                <option id="vimp" value="male">Male</option>
                                <option id="vimp" value="female">Female</option>
                            </select>
                                                      
                            <span id="enroll">
                            <label><span class="glyphicon glyphicon-pencil"></span>Enrollment No.</label>
                            <input type="text" name="Roll_No" style="border-radius:5px; height:30px; width:200px;" placeholder="Enrollment No.">
                            </span>
                        </div>
                        <div class="form-group">
                            <label><span class="glyphicon glyphicon-calendar"></span>Email Id</label>
                            <input type="email" name="email" class="form-control" placeholder="example@gmail.com" required="required">
                        </div>  
                        <div class="form-group">
                            <label><span class="glyphicon glyphicon-map-marker"></span>Country</label>
                            <select name= "country" style="border-radius:5px; height:30px; width:200px">
                                <option id="vimp" value = "India">India</option>
                                <option id="vimp" value = "USA">America</option>
                                <option id="vimp" value = "Australia">Australia</option>
                                <option id="vimp" value = "Russia">Russia</option>
                                <option id="vimp" value = "China">China</option>
                                <option id="vimp" value = "Japan">Japan</option>
                            </select>
                            <span id="qualification">
                            <label><span class="glyphicon glyphicon-education"></span>Qualification</label>
                            <select name="qual" style="border-radius:5px; height:30px; width:200px">
                                <option id="vimp" value = "BE">BE</option>
                                <option id="vimp" value = "ME">ME</option>
                                <option id="vimp" value = "PHD">PHD</option>
                            </select>
                            </span>
                        </div>
                        <div class="form-group">
                            <span style="color:red">*</span><span style="font-style:oblique;">All feilds are mandotary<span></span>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit"class="btn btn-success pull-right" onclick="subCheck()">Sign-Up !</button>
                    </form>

                </div>
            </div>
        </div>
      </div>
    </div>

    <!--Signup for Faculty-->

    <div class="modal fade" id="popUpWindow">
        <div class="modal-dialog" style="width: 750px;">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <div class="modal-title">Sign-up!</span>
       </div>
                </div>
                <div class="modal-body">
                    <form role="form" action = "signupf.php" method = "POST">
                        <div class="form-group">
                            <label><span class="glyphicon glyphicon-pencil"></span>Name</label>
                            <input type="text"  id="uname1" name="sname" onblur="checkName1()" class="form-control" placeholder="Enter your name">

<div id="faculty_name"> </div>
                        </div>
                        <div class="form-group">
                            <label><span class="glyphicon glyphicon-inbox"></span>Institute</label>
                            <input type="text" name="Iname" class="form-control" placeholder="Institute">
                        </div>
                        <div class="form-group">
                            <label><span class="glyphicon glyphicon-pencil"></span>Password</label>
                            <input type="password" name = "Spass" class="form-control" placeholder="Password" id="upass1" onblur="checkPassword1()">
                                        <span id="faculty_pass"></span>
                        </div>
                        <div class="form-group">
                            <label><span class="glyphicon glyphicon-pencil"></span>Confirm Password</label>
                            <input type="password" name = "Spass1" class="form-control" placeholder="Confirm Password" id="upass2" onblur="matchPassword1()">
                                                        <div id=match_pass1></div>
                        </div>
                        <div class="form-group">
                            <label><span class="glyphicon glyphicon-user"></span>Gender</label>
                            <select name="Gender" style="border-radius:5px; height:30px; width:200px">
                                <option id="vimp" value="Male">Male</option>
                                <option id="vimp" value="Female">Female</option>
                            </select>
                            <span id="country" style="margin: 50px;">
                            <label><span class="glyphicon glyphicon-map-marker"></span>Country</label>
                            <select style="border-radius:5px; height:30px; width:200px;">
                                <option id="vimp" value = "India">India</option>
                                <option id="vimp" value = "USA">America</option>
                                <option id="vimp" value = "Australia">Australia</option>
                                <option id="vimp" value = "Russia">Russia</option>
                                <option id="vimp" value = "China">China</option>
                                <option id="vimp" value = "JPN">Japan</option>
                            </select>
                            </span>
                        </div>
                        <div class="form-group">
                            <label><span class="glyphicon glyphicon-pencil"></span>Code-!t</label>
                            <input type="text"  name="Handle" id="code1" class="form-control" placeholder="Your Code-!t Id" onblur="getHint1()">
                                    <div id="codeid1"></div>
                        </div>
                        <div class="form-group">
                            <label><span class="glyphicon glyphicon-calendar"></span>Email Id</label>
                            <input type="email" name = "email" class="form-control" placeholder="example@gmail.com">
                        </div>  
                        
                        <div class="form-group">
                            <span style="color:red">*</span><span style="font-style:oblique;">All feilds are mandotary<span></span>
                        </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" onclick="subCheck1()" class="btn btn-success pull-right">Sign-Up !</button>
                    </form>

                </div>
            </div>
        </div>
      </div>
    </div>

    <!--Forgot Password-->
    <div class="modal fade" id="FP">
      <div class="modal-dialog" style="width:350px;">
      <div class="modal-content">
        <div class="modal-header" style="background-color:#282828; height:50px;">
          <div class="modal-title" style="color:white; font-size: 15px;">Please enter your email-id</span>
     </div>
        </div>
        <div class="modal-body">
          <form role="form" action="fpass.php" method="post">
            <div class="form-group">
               <input type="text" name="e" placeholder="Enter your email"> 
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-success pull-left">Submit</button>
          </form>

        </div>
        </div>
    </div>
    </div>
  </div>





<script src="js/jquery-3.0.0.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.classyedit.js"></script>
    </script> 

<div id="prob">
    <b style="margin-left: 4%; ">Assignment Id</b>&nbsp&nbsp&nbsp&nbsp&nbsp<input type="text" onkeyup="foc()" style=" float: center; height: 30px; width: 300px;" id="aid" placeholder="Enter Assignment Id"> 

        <button href="#" onclick="assignment()" style="float: right; color:#fff; background-color:#46b8da;  padding: 10px;font-size: 12px;
                                box-shadow: 0 1px 3px 0 rgba(0,0,0,.5);
                                border-radius: 2px;
                                transition: background .2s ease-in;
                                font-weight: 400;
                                border: none; width: 100px;">Select</button>
</div> 
<div id="ass">
         <div id="problems">            </div>   
</div>

<input type="hidden" id="setpid" value="a"/>

<div class="inner-wrapper rounded-cr-body" id="pro">
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
                        <p id="quecontent">
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
                 </div>
              </div>
        </div>
    </div>
</div>
<div id="box">
      <div id="submission">
          <b style="margin-left: 30px;">Status: </b><span id="status" style="margin: 0px;"></span>
          <b style="margin-left: 10px;">Time: </b><span id="time" style="margin: 0px;"></span>
             <a href="#" class="btn btn-info btn-lg" style="float: right; width: 50px; height: 36px;" onclick="displayset()">
              <span class="glyphicon glyphicon-remove"></span> 
            </a>
   </div>


      <div id="header">
          <select name="lang" style="float: right; width: 150px;">
            <option value="select">Languages</option>
            <option onclick="selectLang('C')" >C</option>
            <option onclick="selectLang('Cpp')" >Cpp</option>
            <option onclick="selectLang('Python')" >Python</option>
            <option onclick="selectLang('Java')" >Java</option>
            <option onclick="selectLang('PHP')" >PHP</option>
          </select>
          <b style="margin: 10px; margin: 20px;">CODE EDITOR !</b>
      </div>
 <div id="editor">
</div>
      <div id="input">
                    <b>Custom Input</b><br>
                     <textarea rows="8" cols="40" id="in"></textarea>

      </div>

      <div id="output">
                    <b>Custom Output</b><br>
                     <textarea rows="8" cols="40" id="out"></textarea>

      </div>
     
      <div id="btn">
                  <button href="#" onclick="upload()" style="color:#fff; background-color:#46b8da;  padding: 10px;font-size: 12px;
                                box-shadow: 0 1px 3px 0 rgba(0,0,0,.5);
                                border-radius: 2px;
                                transition: background .2s ease-in;
                                font-weight: 400;
                                border: none;margin-left: 8px;">SUBMIT</button>
          <button href="#" onclick="edit()" style="color:#fff; background-color:#46b8da;  padding: 10px;font-size: 12px;
                                box-shadow: 0 1px 3px 0 rgba(0,0,0,.5);
                                border-radius: 2px;
                                transition: background .2s ease-in;
                                font-weight: 400;
                                border: none;">RUN</button>
        <input type="hidden" id="lname"> 
      </div>
</div>

<script src="ace/ace.js" type="text/javascript" charset="utf-8"></script>
<script>

ace.require("ace/ext/language_tools");
    var editor = ace.edit("editor");
    editor.session.setMode("ace/mode/html");
    editor.setTheme("ace/theme/tomorrow");
    editor.setOptions({
        enableBasicAutocompletion: true,
        enableSnippets: true,
        enableLiveAutocompletion: true,
         fontSize: "20px"
        
    });


  function selectLang(lang){
    if(lang=="C" || lang=="Cpp")
      editor.getSession().setMode("ace/mode/c_cpp");
    else if(lang=="Python")
      editor.getSession().setMode("ace/mode/python");
    else if(lang=="Java")
      editor.getSession().setMode("ace/mode/java");
    else if(lang=="PHP")
      editor.getSession().setMode("ace/mode/php"); 
     document.getElementById("lname").value=lang;
  }

  function edit(){
  
    var code=editor.getValue();
    var lname=document.getElementById("lname").value;
    var test=document.getElementById("in").value;
   // alert(lname+code+test);
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
             //   alert(xmlhttp.responseText);
                if(xmlhttp.responseText.search("error")>0 || xmlhttp.responseText.search("Error")>0 || xmlhttp.responseText.search("Traceback")>0){
                    document.getElementById("out").value=xmlhttp.responseText;
                    document.getElementById("out").style.color="red";
                }
                else{
                    document.getElementById("out").value=xmlhttp.responseText;
                    document.getElementById("out").style.color="green"; 
                }
            }
        };
            xmlhttp.open("POST", "code_editor.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("c="+encodeURIComponent(lname)+"&q="+encodeURIComponent(code)+"&i="+encodeURIComponent(test));
    }

  function upload(){
    <?php
    if(!isset($_SESSION["uname"])){
     ?>
       alert("Oops!! You must have to login to submit.");
       return; 
    <?php
    } 
    ?>
    var code=editor.getValue();
    var lname=document.getElementById("lname").value;
    var aid=document.getElementById("aid").value;
    var pid=document.getElementById("setpid").value;
    //alert(pid);
    if(aid.length==0){
        document.getElementById("aid").focus();
        document.getElementById("aid").style.color="#FFBABA";
    }
 //  alert(lname+code+pid);
    else{
    var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
              //alert(xmlhttp.responseText);
                if(xmlhttp.responseText=="Not Found"){
                    document.getElementById("aid").focus();
                    document.getElementById("aid").style.color="#FFBABA";
                }
                else{
                var time="";
                for(var i=1;i<xmlhttp.responseText.length;i++)
                    time+=xmlhttp.responseText[i];
                time+=" sec";
//                alert(time);
                if(xmlhttp.responseText[0]=="E"){
                    document.getElementById("status").innerHTML="Compiler Error";
                    document.getElementById("status").style.color="red";
                    document.getElementById("time").innerHTML=time;
                }else if(xmlhttp.responseText[0]=="T"){
                    document.getElementById("status").innerHTML="Time Limit Exceeds";
                    document.getElementById("status").style.color="orange";     
                    document.getElementById("time").innerHTML=time;
                }else if(xmlhttp.responseText[0]=="C"){
                    document.getElementById("status").innerHTML="Correct";
                    document.getElementById("status").style.color="green";      
                    document.getElementById("time").innerHTML=time;
                }else if(xmlhttp.responseText[0]=="W"){
                    document.getElementById("status").innerHTML="Wrong";
                    document.getElementById("status").style.color="red";        
                    document.getElementById("time").innerHTML=time;
                }
                    var displayproperty=document.getElementById("submission");
                    displayproperty.style.display='block';
          

            }
        }
        };
            xmlhttp.open("POST", "codesubmit.php", true);
            xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xmlhttp.send("c="+encodeURIComponent(lname)+"&q="+encodeURIComponent(code)+"&pid="+encodeURIComponent(pid)+"&aid="+encodeURIComponent(aid));
    }  
}
  
</script>


</body>
</html>

