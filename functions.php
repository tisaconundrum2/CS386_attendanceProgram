<?php
function is_prof($id){
	$mysqli = new mysqli('localhost', 'waffo', 'ferret', 'bedrock');
	$result=$mysqli->query("select u_privlidge from se_user where u_id=$id");
	$row=$result->fetch_array(MYSQLI_NUM);
	if ($row[0]=='y')
		return 1;
	else
		return 0;
}

function mres($in){
	return mysqli_real_escape_string($mysqli,$in);
}
?>
