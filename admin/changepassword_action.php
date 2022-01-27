<?php
session_start();

require( "connection.php" );

$email = $_SESSION[ 'email' ];

$oldpassword = $_REQUEST[ "Oldpassword" ];
$newpassword = $_REQUEST[ "Newpassword" ];

$query = "select * from admin_details where email='$email' and password='$oldpassword'";
$result = mysqli_query( $con, $query );

$count = mysqli_num_rows( $result );

if ( $count > 0 ) {

  $query_update = "update admin_details set password='$newpassword' where email='$email'";
  mysqli_query( $con, $query_update );
  $count = mysqli_affected_rows( $con );

  if ( $count > 0 ) {
    $updatestatus = "success";
  } else {
    $updatestatus = "failure";
  }

} else {

  $updatestatus = "failure, please type your old password correctly";

}

header( "location:status.php?status=" . $updatestatus );
?>