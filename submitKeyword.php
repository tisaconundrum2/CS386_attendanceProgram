<?php
include("server.php");
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(-1);
$key=$_POST['key'];
if(is_prof($_SESSION['user'])){
	$result=$mysqli->query("select k_id from se_keyword");
	$uqid=($result->num_rows) + 1;
	$result=$mysqli->query("select uc_id from se_uc where u_id=$_SESSION[user] and c_id=$_GET[id]");
	$row=$result->fetch_array(MYSQLI_NUM);	
	$ucid=$row[0];
	$date = date('Y-m-d');
	$result=$mysqli->query("insert into se_keyword values ($uqid,$ucid,'$key','$date')");
	if ($result){
		echo "</br>key set successful";
		header('Location: selectClass.php');
	}
	else{
		echo "</br>failed";
		echo $mysqli->error;
		//header('Location: index.php');
	}
}
else
{
	$result=$mysqli->query("select k_id from se_keyword");
	$uqid=($result->num_rows) + 1;
	$result=$mysqli->query("select uc_id from se_uc where u_id=$_SESSION[user] and c_id=$_GET[id]");
	$row=$result->fetch_array(MYSQLI_NUM);	
	$ucid=$row[0];
	$date = date('Y-m-d');

	$result=$mysqli->query("select k_string from se_keyword where k_date='$date' and uc_id=(select uc_id from se_uc where u_id=$_SESSION[user] and c_id=$_GET[id])");
	if(($result->num_rows) > 0){
		echo "You already submitted today!";
		echo $mysqli->error;
		header('Location: keyword.php?id='.$_GET['id'].'&e=4');	
	}

	$result=$mysqli->query("select k_string from se_keyword where k_date='$date' and uc_id=(select uc_id from se_uc where u_id=(select u_professor from se_class where c_id=$_GET[id]) and c_id=$_GET[id])");
	if(!$result){
		echo "</br>failed";
		echo $mysqli->error;
		header('Location: keyword.php?id='.$_GET['id'].'&e=3');
	}
	if(($result->num_rows) == 0){
		echo "Professor has not submitted yet!";
		echo $mysqli->error;
		header('Location: keyword.php?id='.$_GET['id'].'&e=1');
		
	}
	$row=$result->fetch_array(MYSQLI_NUM);	
	$official=$row[0];
	echo '</br>'.$official;
	if(strtolower($official) == strtolower($key)){
		$result=$mysqli->query("insert into se_keyword values ($uqid,$ucid,'$key','$date')");
	if(!$result){
		echo "</br>failed";
		echo $mysqli->error;
}
else
		header('Location: keyword.php?id='.$_GET['id'].'&e=0');
	}
	else{
		echo "Wrong key!";
		echo $mysqli->error;
		header('Location: keyword.php?id='.$_GET['id'].'&e=2');
	}
}


