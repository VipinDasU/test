<?php
$con = mysqli_connect( "localhost", "root", "" );
if ( !$con ) {
  die( "SQL connection error" );
}
mysqli_select_db( $con, "db_sample" );
?>