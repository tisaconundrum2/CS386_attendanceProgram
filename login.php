<?php
include("server.php");
$email=$_POST["email-r"];
$password=$_POST["password-r"];
$query=$mysqli->query("select u_id from se_user where u_email='$email' and u_password='$password'");
if ($query->num_rows == 1){
	echo "</br>log in successful";
	$row=$query->fetch_array(MYSQLI_NUM);
	$_SESSION['user']=$row[0];
	echo "</br>User: ";
	echo $row[0];
	echo "</br>";
	print_r($_SESSION);
}
else
	header('Location: index.php?p=l');
