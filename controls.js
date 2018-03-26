//Customer
var loginmodal=document.getElementById("loginmodal");
var signupmodal=document.getElementById("signupmodal")
var signup=document.getElementById("signupbtn");
var login=document.getElementById("loginbtn");

signup.onclick=function(){
    loginmodal.style.display="none";
    signupmodal.style.display="block";
}

login.onclick=function(){
    signupmodal.style.display="none";
    loginmodal.style.display="block";
}
