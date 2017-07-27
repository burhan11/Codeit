

function checkName(x,f){
var v= x.value;

var re= /^[0-9]/+$;

var l=x.value.length;


if(l<1)
{

x.style.borderColor="red";

document.getElementById(f).innerHTML="This field cannot be empty!!";



}

else if(re.test(v[0]){

x.style.borderColor="red";

document.getElementById(f).innerHTML="Your name cannot start with a number";



}
else{

document.getElementById(f).innerHTML="";
x.style.borderColor="green";


}



}

function checkPassword(x,f){


var v=x.value;
var l=x.value.length;

if(l<1){

x.style.borderColor="red";

document.getElementById(f).innerHTML="password cannot be blank!";



}
else if(!re.test(x.value)){


x.style.borderColor="red";

document.getElementById(f).innerHTML="password should be alphanumeric!";





}


else{


x.style.borderColor="green";


document.getElementById(f).innerHTML="";


}




}

function getHint(x,f){

var v=x.value;

var l=x.value.length;

    
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById(f).innerHTML = xmlhttp.responseText;

x.style.borderColor="red";

            }
        };
        xmlhttp.open("GET", "gethint.php?q=" +v, true);
        xmlhttp.send();
    }








