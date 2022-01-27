<?php
include( 'header.php' );
?>
<!doctype html>
<html>
<head>

<title>Adminlogin</title>
<style>
body {
    background-image: url(../images/grey-wallpaper-hd-download-free-grey-background-.jpg);
}
span {
    position: fixed;
    left: 300px;
    top: 100px;
    font-size: 25px;
    color: #03C;
}
</style>
<script>
function cat()
{
var email=document.getElementById("Email");
var password=document.getElementById("Password");

if(email.value=="")
{
alert("Enter an email id");
email.focus();
return false;	
}
else if(email.value.indexOf("@")==-1)
{
alert("Enter a valid email id");
email.focus();
return false;	
}
else if(email.value.indexOf(".com")==-1)
{
alert("Enter a valid email id");
email.focus();
return false;	
}
else if(password.value=="")
{
alert("Enter a password");
password.focus();
return false;	
}
else
{
return true;	
}	
}
</script>
</head>

<body>
	<div class="container-fluid">
<form action="login_action.php" onSubmit="return cat()" method="post">
  <span>
  <pre>Email   :<input type="text" id="Email" name="txtemail"><br>
Password:<input type="password" id="Password" name="txtpsd"><br>
<input type="submit" value="Submit">
</pre>
  </span>
</form>
		</div>
</body>
</html>