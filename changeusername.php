<?php
session_start();
if(isset($_SESSION['user'])) {
    $username = $_SESSION['user'];
} else {
    header("Location: index.html");
}

include('password.php');

$connection = mysqli_connect($db_host, $db_user, $db_password, $db_name);
if($connection->connect_errno) {
die("Failed to connect to database: " .mysqli_error($connection));
}
$db = mysqli_select_db($connection, $db_name) or die("Failed to select database: " .mysqli_error());

if(isset($_POST['submit'])) {
    if(!empty($_POST['newusername'])) {
    $newname = $_POST['newusername'];
    $stmt - $mysqli->prepare("UPDATE UsernamePassword SET username=? WHERE username=?");
    $stmt->bind_param("ss", $newname, $username);
    stmt->execute();
    //$connection->query("UPDATE UsernamePassword SET username = '$_POST[newusername]' WHERE username = '$username'");

    $_SESSION['user'] = $_POST['newusername'];
    }
    header("Location: editprofile.php");
}
?>
