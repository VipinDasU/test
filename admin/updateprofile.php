<?php
session_start();

if ( !isset( $_SESSION[ 'email' ] ) ) {
  header( 'location:login.php' );

}
else{
	
include( 'loggedinheader.php' );

require( "connection.php" );
$email = $_SESSION[ 'email' ];
$query = "select * from admin_details where email='$email'";
$result = mysqli_query( $con, $query );
$count = mysqli_num_rows( $result );
if ( $count > 0 ) {
  $row = mysqli_fetch_array( $result );
  $name = $row[ 'name' ];
  $age = $row[ 'age' ];
  $city = $row[ 'city' ];
  $email = $row[ 'email' ];

}
?>
<html>
<head>
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
var name=document.getElementById("NAME");
var age=document.getElementById("AGE");
var city=document.getElementById("CITY");

if(name.value=="")
{
   alert("Enter the name.");
   name.focus();
   return false;	
}
else if(age.value=="")
{
   alert("Enter the age.");
   age.focus();
   return false;	
}
else if(isNaN(age.value)==true)
{
   alert("Enter the age");
   age.focus();
   return false;	
}
else if(city.value=="")
{
   alert("Enter the city");
   city.focus();
   return false;
}
	else if(isNaN(name.value)==false)
{
   alert("Name should not be a number");
   name.focus();
   return false;	
}
	else if(isNaN(city.value)==false)
{
   alert("City should not be a number");
   city.focus();
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
<form action="updateprofile_action.php" method="post" onSubmit="return man()">
  <pre>
<span>Name :<input type="text" value="<?php echo $name;?>" name="Name" id="NAME"/>
Age  :<input type="text" value="<?php echo $age;?>" name="Age" id="AGE"/>
City :<input type="text" value="<?php echo $city;?>" name="City" id="CITY"/>
Email:<input type="text" value="<?php echo $email;?>" readonly/>
<input type="submit" value="submit" ></span>
</pre>
</form>
</body>
</html>
<?php
}

?>