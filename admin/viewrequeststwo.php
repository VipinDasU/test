<?php
session_start();

if ( !isset( $_SESSION[ 'email' ] ) ) {
  header( 'location:login.php' );
} else {
  include( 'loggedinheader.php' );


  if ( isset( $_REQUEST[ "id" ] ) ) {
    $iddd = $_REQUEST[ "id" ];
    $_SESSION[ 'finalid' ] = $iddd;

    require( "connection.php" );

    $query = "select * from requests where id='$iddd'";
    $result = mysqli_query( $con, $query );

    $count = mysqli_num_rows( $result );
    if ( $count > 0 ) {
      $row = mysqli_fetch_array( $result );
      $id = $row[ 'id' ];
      $email_id = $row[ 'email_id' ];
      $pencils = $row[ 'pencils' ];
      $gumbottles = $row[ 'gumbottles' ];
      $pens = $row[ 'pens' ];
		
	  $_SESSION[ 'pencils' ] = $pencils;
	  $_SESSION[ 'gumbottles' ] = $gumbottles;
	  $_SESSION[ 'pens' ] = $pens;
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
</head>
<body>
<form action="viewrequeststwo_action.php" method="post">
  <pre>
<span>Row id :<?php echo $id;?></br>
Email  :<?php echo $email_id;?></br>
Pencils Requested :<?php echo $pencils;?></br>
Gumbottles requested:<?php echo $gumbottles;?></br>
Pens requested:<?php echo $pens;?></br>
<input type="submit" value="Approve" ></span>

</pre>
</form>
</body>
</html>
<?php
}
if ( isset( $_REQUEST[ "status" ] ) ) {
  $message = $_REQUEST[ "status" ];
  echo "<span>Updation $message.</span>";
}
}

?>
