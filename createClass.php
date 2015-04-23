<?php
include("server.php");
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
$title=$_POST['title'];
$number=$_POST['classno'];
$semester=$_POST['semester'];
$year=$_POST['year'];
$time=$_POST['time'];
$result=$mysqli->query("select c_id from se_class");
$uqid=($result->num_rows) + 1;
echo "hello".$uqid;
$result=$mysqli->query("insert into se_class values ($uqid,'$title','$number','$semester$year','$time',$_SESSION[user],NULL)");

if ($result){
	echo "</br>class creation successful";
	$_SESSION['user']=$uqid;
	$result=$mysqli->query("select uc_id from se_uc");
	$uqid2=($result->num_rows) + 1;
	$result=$mysqli->query("insert into se_uc values ($uqid2,$_SESSION[user],$uqid)");
	header('Location: selectClass.php');
}
else{
	echo "</br>failed";
	echo $mysqli->error;
	header('Location: index.php');
}

