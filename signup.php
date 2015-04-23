<?php
include("server.php");
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST["email"];
$password=$_POST["password"];
$result=$mysqli->query("select u_id from se_user");
$uqid=($result->num_rows) + 1;
$result=$mysqli->query("insert into se_user values ($uqid,'$fname','$lname','$email','$password','n')");


if ($result){
	echo "</br>register successful";
	$_SESSION['user']=$uqid;
	header('Location: selectClass.php');
}
else{
	echo "</br>failed";
	header('Location: index.php');
}

?>
