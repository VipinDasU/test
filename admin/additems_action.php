<?php
session_start();
?>
<?php
require( "connection.php" );

$email = $_SESSION[ 'email' ];
$pencils = $_REQUEST[ "pencils" ];
$gumbottles = $_REQUEST[ "gumbottles" ];
$pens = $_REQUEST[ "pens" ];
$query = "insert into `items`(`pencils`,`gumbottles`,`pens`,`email`) values('$pencils','$gumbottles','$pens','$email')";
mysqli_query( $con, $query );
$count = mysqli_affected_rows( $con );
if ( $count > 0 ) {
  $status = "sucess";
} else {
  $status = "failure";
}
header( "location:additems.php?submission=" . $status );
?>