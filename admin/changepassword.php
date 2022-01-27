<?php
session_start();

if ( !isset( $_SESSION[ 'email' ] ) ) {
  header( 'location:login.php' );

}
else{
	
include( 'loggedinheader.php' );
?>
<html>
<head>
<meta charset="utf-8">
<title>changepassword</title>
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
function man()
{
var oldpassword=document.getElementById("OLDPASSWORD");
var newpassword=document.getElementById("NEWPASSWORD");
var confirmpassword=document.getElementById("CONFIRMPASSWORD");

if(oldpassword.value=="")
{
   alert("Enter the old password.");
   oldpassword.focus();
   return false;	
}
else if(newpassword.value=="")
{
	alert("Enter the new password.");
	newpassword.focus();
	return false;
}
else if(confirmpassword.value=="")
{
   alert("Enter the new password again.");
   confirmpassword.focus();
   return false;	
}
else if(confirmpassword.value!=newpassword.value)
{
   alert("Enter the same new password");
   confirmpassword.focus();
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
<form action="changepassword_action.php" method="post" onsubmit="return man()">
  <pre>
<span>OLD PASSWORD    :<input type="password" id="OLDPASSWORD" name="Oldpassword"><br>
NEW PASSWORD    :<input type="password" id="NEWPASSWORD" name="Newpassword"><br>
CONFIRM PASSWORD:<input type="password" id="CONFIRMPASSWORD" name="Confirmpassword"><br>
<input type="submit" value="submit" >
</span></pre>
</form>
</body>
</html>
<?php
	
	}
?>
