<?php
session_start();

if ( !isset( $_SESSION[ 'email' ] ) ) {
  header( 'location:login.php' );

}

else{
	include 'loggedinheader.php';
?>
<html>
<head>
<meta charset="utf-8">
<title>Adminfinal</title>
<style>
h1 {
    font-size: 80px;
    color: black;
}
body {
    background-image: url("../images/mountains_clouds_sky_tops_103244_1920x1080.jpg");
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: 100% 100%;
}
p {
    font-size: 23px;
}
</style>
</head>

<body>
<h1>ADMIN HOME</h1>
<?php
$name = $_SESSION[ "name" ];
?>
<p>Welcome <?php echo $name; ?> </p>
</body>
</html>
<?php 
}

?>