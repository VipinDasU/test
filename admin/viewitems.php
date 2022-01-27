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
$email = $_SESSION[ 'email' ];
$query = "select sum(pencils), sum(gumbottles), sum(pens) from items";
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
    <th>Pencils</th>
    <th>Gumbottles</th>
    <th>Pens</th>
  </tr>
  <tr>
    <?php
    $row = mysqli_fetch_array( $result );
    echo "<td>" . $row[ 'sum(pencils)' ]. "</td>";
    echo "<td>" . $row[ 'sum(gumbottles)' ] . "</td>";
    echo "<td>" . $row[ 'sum(pens)' ] . "</td>";
    ?>
  </tr>
</table>
</body>
</html>
<?php
} else {
  echo "error";
}
}

?>
