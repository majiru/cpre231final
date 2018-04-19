<?php
session_start();
if(isset($_SESSION['user'])){
  $username = $_SESSION['user'];
}
else{
header("Location: index.html");
}
?>

<html>
  <head>
    <title>Edit Profile: <?php echo htmlspecialchars($username) ?></title>
	<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
<div id="wrap">
<div id="regbar">
<h2>    Edit <?php echo htmlspecialchars($username) ?>'s Profile</h2>
</div>
</div>
    <hr>
    <form method="POST" action="changeusername.php">
      Change Username (max 40 chars):
      <br>
      <input type="text" name="newusername" size="40">
      <br>
      <input id="button" type="submit" name="submit" value="ChangeUsername">
    </form>
    <br>
    <form method="POST" action="changepassword.php">
      Change Password (max 40 chars):
      <br>
      Current Password: <input type="text" name="password" size="40">
      <br>
      New Password: <input type="text" name="newpassword" size="40">
      <br>
      <input id="button" type="submit" name="submit" value="ChangePassword">
    </form>
    <hr>
    <form method="POST" action="logout.php">
      <input type="submit" value="Log Out">
    </form>
   </body>
</html>
