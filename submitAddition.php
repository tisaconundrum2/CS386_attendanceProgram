<?php
include("server.php");
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
$id=$_GET['id'];
$result=$mysqli->query("select uc_id from se_uc");
$uqid=($result->num_rows) + 1;
$result=$mysqli->query("insert into se_uc values ($uqid,$_SESSION[user],$id)");

if ($result){
	echo "</br>class enrollment successful";
	header('Location: selectClass.php');
}
else{
	echo "</br>failed";
	echo $mysqli->error;
	header('Location: index.php');
}

