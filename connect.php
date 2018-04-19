<?php
include('password.php');

$mysqli = mysqli_connect($db_host, $db_user, $db_password, $db_name);

if($mysqli->connect_errno){
	die("Failed to connect to database: " .mysqli_error($connection));
}


if(isset($_POST['submit'])) {
	session_start();
	if(!empty($_POST['user']) AND !empty($_POST['password'])){
	//	$query = mysqli_query($connection, "SELECT * FROM UsernamePassword where username = '$_POST[user]' AND password = '$_POST[password]'");
            //    $row = mysqli_fetch_array($query, MYSQLI_BOTH);

            $password = $_POST['password'];
            $username = $_POST['username'];

            $stmt = $mysqli->prepare("select username, password from UsernamePassword where username=? and password=?");
            $stmt->bind_param("ss", $username, $password);
            $stmt->execute();
            $stmt->bind_result($daUsername, $daPassword);
            $stmt->fetch();
            $stmt->close();

            if($daUsername != null AND $daPassword != null){
                $_SESSION['user'] = $daUsername;
                header("Location: profile.php");
            }else{
                header("Location: index.html");
            }
}
?>
