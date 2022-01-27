<?php
session_start();

$email = $_REQUEST[ "txtemail" ];
$psd = $_REQUEST[ "txtpsd" ];
require( "connection.php" );
$query = "select * from admin_details where email='$email' and password='$psd'";
$result = mysqli_query( $con, $query );

$count = mysqli_num_rows( $result );
if ( $count > 0 ) {
  $_SESSION[ "email" ] = $email;
  $row = mysqli_fetch_array( $result );
  $name = $row[ "name" ];
  $_SESSION[ "name" ] = $name;

  header( "location:final.php" );
} else {
  header( "location:login.php?loginstatus=fail" );
}
?>