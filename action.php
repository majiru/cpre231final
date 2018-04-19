<?php
$file = 'comments.txt';
if(isset($_POST['field1']) && isset($_POST['field2'])) {
	$fh = fopen($file,"a+");
	$string = $_POST['field1'].': '.$_POST['field2']."\r\n\r\n";
	fwrite($fh,$string);
	fclose($fh);
}
header("Location: profile.php");
?>

