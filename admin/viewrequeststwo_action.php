<?php
session_start();
require( "connection.php" );
$idddd = $_SESSION[ 'finalid' ];
$email= $_SESSION['email'];


$pencilssessi = $_SESSION[ 'pencils' ];
$gumbottlessessi = $_SESSION[ 'gumbottles' ];
$penssessi = $_SESSION[ 'pens' ];

$querytwo = "select sum(pencils), sum(gumbottles), sum(pens) from items";
$resulttwo = mysqli_query( $con, $querytwo );
$countagain = mysqli_num_rows( $resulttwo );
if ( $countagain > 0 ) {
  $row = mysqli_fetch_array( $resulttwo );
  $noofpencils = $row[ 'sum(pencils)' ];
  $noofgumbottles = $row[ 'sum(gumbottles)' ];
  $noofpens = $row[ 'sum(pens)' ];


  $pencilsrem = $noofpencils - $pencilssessi;
  $gumbottlesrem = $noofgumbottles - $gumbottlessessi;
  $pensrem = $noofpens - $penssessi;

  if ( $pencilsrem < 0 || $gumbottlesrem < 0 || $pensrem < 0 ) {
    echo "Not enough items present in stock. Please <a href='viewitems.php'>click here.</a>";
    exit();
  } else {

    $query = "select * from requests where id='$idddd'";
    $result = mysqli_query( $con, $query );
    $count = mysqli_num_rows( $result );
    if ( $count > 0 ) {

      $query_update = "update requests set status='Approved' where id='$idddd'";
      mysqli_query( $con, $query_update );
      $countdup = mysqli_affected_rows( $con );

      if ( $countdup > 0 ) {
        $updatestatus = "done";
      } else {
        $updatestatus = "not done";
      }
      $pencilssubtr = 0 - $pencilssessi;
      $gumbottlessubtr = 0 - $gumbottlessessi;
      $penssubtr = 0 - $penssessi;
      $query_updatetwo = "insert items(pencils,gumbottles,pens,email) values('$pencilssubtr','$gumbottlessubtr','$penssubtr','$email') ";
      mysqli_query( $con, $query_updatetwo );
      $countthree = mysqli_affected_rows( $con );

    } else {

      $updatestatus = "failure";

    }


    if ( $countthree > 0 ) {
      $updatestatus = "done";
    } else {
      $updatestatus = "not done";
    }

  }
}

else {

  $updatestatus = "failure";

}


header( "location:viewrequeststwo.php?status=" . $updatestatus );

?>
