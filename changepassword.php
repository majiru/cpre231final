<?php
session_start();
if(isset($_SESSION['user'])) {
     $username = $_SESSION['user'];
} else {
     header("Location: index.html");
}

include('password.php');

$mysqli = mysqli_connect($db_host, $db_user, $db_password, $db_name);
if($mysqli->connect_errno) {
     die("Failed to connect to database: " .mysqli_error($connection));
}

if(isset($_POST['submit'])) {
    if(!empty($_POST['password'])) {
        $password = $_POST['password'];
        $stmt = $mysqli->prepare("select username, password from UsernamePassword where username=? and password=?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $stmt->bind_result($daUsername, $daPassword);
        $stmt->fetch();
	$stmt->close();
          //$query = mysqli_query($connection, "SELECT * FROM UsernamePassword where username = '$username' AND password = '$_POST[password]'");
        //$row = mysqli_fetch_array($query, MYSQLI_BOTH);

        if($daUsername != NULL AND $daPassword != NULL) {
            $ustmt = $mysqli->prepare("UPDATE UsernamePassword SET password=? where username=? and password=?");
            $ustmt->bind_param("sss", $password, $daUsername, $daPassword);
            $ustmt->execute();
            $ustmt->close();

    	}
    header("Location: editprofile.php");
    }
}
?>
