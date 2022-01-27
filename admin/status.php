<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Status of Updation</title>
<script language="javascript" type="text/javascript">
   window.history.forward();
</script>
<style>
body {
    background-image: url(../images/grey-wallpaper-hd-download-free-grey-background-.jpg);
}
span {
    position: fixed;
    left: 500px;
    top: 250px;
    font-size: 31px;
    color: #03C;
}
a {
    text-decoration: none;
    font-size: 23px;
}
a:link, a:visited {
    color: #999999;
}
header {
    background-color: #000;
    position: relative;
    height: 40px;
}
</style>
</head>

<body>
<header>
  <pre><a href="changepassword.php">change password</a>         <a href="updateprofile.php">update profile</a>         <a href="viewitems.php">view items</a>         <a href="additems.php">add items</a>		<a href="logout.php">log out</a></pre>
</header>
</body>
</html>
<?php
$message = $_REQUEST[ "status" ];
echo "<span>Your change is a $message.</span>";

?>