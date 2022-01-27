<?php
session_start();

if ( !isset( $_SESSION[ 'email' ] ) ) {
  header( 'location:login.php' );

}
else{
	include( 'loggedinheader.php' );

?>
<?php
require( "connection.php" );
$query = "select * from `requests`";
$result = mysqli_query( $con, $query );
$count = mysqli_num_rows( $result );
if ( $count > 0 ) {
  ?>
<html>
<head>
<style>
body {
    background-image: url("../images/grey-wallpaper-hd-download-free-grey-background-.jpg");
}
</style>
</head>
<body>
<table border="1">
  <tr>
	  <th>Row id</th>
    <th>Email</th>
    <th>Pencils</th>
    <th>Gumbottles</th>
    <th>Pens</th>
    <th>Status</th>
    <th>Action</th>
  </tr>
  <?php
  while ( $row = mysqli_fetch_array( $result ) ) {


    ?>
  <tr><?php
	  echo "<td>" . $row[ 'id' ] . "</td>";
	echo "<td>" . $row[ 'email_id' ] . "</td>";
    echo "<td>" . $row[ 'pencils' ] . "</td>";
    echo "<td>" . $row[ 'gumbottles' ] . "</td>";
    echo "<td>" . $row[ 'pens' ] . "</td>";
    $status = $row[ 'status' ];
    if ( $status == "" ) {
      echo "<td>Pending</td>";
    } else {
      echo "<td>" . $row[ 'status' ] . "</td>";
		
    }
	  echo "<td><a href='viewrequeststwo.php?id=". $row['id'] . "'> APPROVE </a></td></tr>";
    }
    ?>
</table>
</body>
</html>
<?php
} else {
  echo "error";
}
}

?>
