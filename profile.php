<?php
session_start();
if(isset($_SESSION['user'])){
  $username = $_SESSION['user'];
}
else{
header("Location: login.php");
}
?>

<html>
  <head>
	<link rel="stylesheet" href="css/style.css">
    <title><?php echo $username ?>'s Profile</title>
  </head>
  <body>
	<div id="wrap">
	<div id="regbar">
	<div class="div-left">
<h2>    Hello! You are logged in as <?php echo $username ?>. </h2>
	</div><div class="div-right">
<h3>    <a href="editprofile.php">Edit Profile</a></h3>
	</div>
	</div>
	</div>
	<div class="form">
	<form action="action.php" method="post">
	Name: <br>
	<input type="text" name="field1"><br>
	Post: <br>
	<input type="text" name="field2"><br>
	<input type="submit" value="Submit">

	</form>
	</div>
	<div class="comments">
	<?php
	$fh = fopen("comments.txt",'r');
	$text = fread($fh, 25000);
	echo nl2br($text);
	?>
	</div>
  </body>
</html>
