<?php
include("server.php");
$email=$_POST["email-r"];
$password=$_POST["password-r"];
$query=$mysqli->query("select * from se_user where u_email='$email' and u_password='$password'");
if ($query->num_rows == 1)
	echo "log in successful";
else
	echo "log in failed";
