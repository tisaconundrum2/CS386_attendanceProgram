<?php
include("server.php");
if(is_prof($_SESSION['user']))
{
$result=$mysqli->query("update se_user set u_privlidge = 'y' where u_id=$_GET[id]");
$result=$mysqli->query("delete from se_keyword where uc_id in (select uc_id from se_uc where u_id=$_GET[id])");
$result=$mysqli->query("delete from se_uc where u_id=$_GET[id]");


if ($result){
	echo "</br>promotion successful";
	header('Location: userPage.php?id='.$_GET['id']);
}
else{
	echo "</br>failed";
	//header('Location: index.php');
}
}

?>
