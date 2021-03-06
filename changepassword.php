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
	$newPassword = $_POST['newpassword'];
        $stmt = $mysqli->prepare("select username, password from UsernamePassword where username=?");
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->bind_result($daUsername, $daPassword);
        $stmt->fetch();
        $stmt->close();
        if(!password_verify($password, $daPassword)){
            header("Location: editprofile.php");
        }
	$newPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        if($daUsername != NULL AND $daPassword != NULL) {
            $ustmt = $mysqli->prepare("UPDATE UsernamePassword SET password=? where username=? and password=?");
            $ustmt->bind_param("sss", $newPassword, $daUsername, $daPassword);
            $ustmt->execute();
            $ustmt->close();

    	}
    header("Location: editprofile.php");
    }
}
?>
