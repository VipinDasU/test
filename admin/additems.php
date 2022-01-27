<?php
session_start();


if ( !isset( $_SESSION[ 'email' ] ) ) {
  header( 'location:login.php' );

}
else{
	
include( 'loggedinheader.php' );
require( "connection.php" );
$email = $_SESSION[ 'email' ];
$query = "select * from items";
$result = mysqli_query( $con, $query );
$count = mysqli_num_rows( $result );
if ( $count > 0 ) {
  $row = mysqli_fetch_array( $result );
  $pencils = $row[ 'pencils' ];
  $gumbottles = $row[ 'gumbottles' ];
  $pens = $row[ 'pens' ];

}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Update items</title>
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
   var pencils=document.getElementById("PENCILS");
   var gumbottles=document.getElementById("GUMBOTTLES");
   var pens=document.getElementById("PENS");
   if(pencils.value=="")
   {
	   alert("Enter the number of pencil");
	   pencils.focus();
	   return false;
   }
   else if(gumbottles.value=="")
   {
	   alert("Enter the number of gumbottles");
	   gumbottles.focus();
	   return false;
   }
	   else if(pens.value=="")
   {
	   alert("Enter the number of pens");
	   pens.focus();
	   return false;
   }
   else if(isNaN(pencils.value)==true)
   {
	   alert("Enter numeric value");
	   pencils.focus();
	   return false;
   }
	   else if(isNaN(gumbottles.value)==true)
   {
	   alert("Enter numeric value");
	   gumbottles.focus();
	   return false;
   }
	   else if(isNaN(pens.value)==true)
   {
	   alert("Enter numeric value");
	   pens.focus();
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
<form action="additems_action.php" method="post" onSubmit="return man()">
  <pre>
<span>Pencils   :<input type="text" id="PENCILS" name="pencils" value="<?php echo $pencils;?>">
Gumbottles  :<input type="text" id="GUMBOTTLES" name="gumbottles" value="<?php echo $gumbottles;?>">
Pens :<input type="text" id="PENS" name="pens" value="<?php echo $pens;?>">

<input type="submit" value="submit"></span></pre>
</form>
</body>
</html>
<?php
if ( isset( $_REQUEST[ "submission" ] ) ) {
  $status = $_REQUEST[ "submission" ];
  echo( "<script>alert('Your submission is a " . $status . "');</script>" );
}
}

?>