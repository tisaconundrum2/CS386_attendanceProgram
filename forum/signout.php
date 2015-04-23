<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php 
include_once('forum_facebook.php');
include_once('connect.php');
?>


<!--Header-->
<style type="text/css">
<!--

-->
</style>
</html>
<html xmlns="http://www.w3.org/1999/xhtml">
<link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php include_once('forum_sidebar.php');?>
<br />
<?php include_once('forum_header.php');?>

<div id="Content">


<?php
//signout.php
echo '<h1>Sign out</h1>';

//check if user if signed in
if($_SESSION['signed_in'] == true)
{
	//unset all variables
	$_SESSION['signed_in'] = NULL;
	$_SESSION['user_name'] = NULL;
	$_SESSION['user_id']   = NULL;

	echo '<p>Succesfully signed out, thank you for visiting.';
}
else
{
	echo '<p>You are not signed in. Would you <a href="signin.php">like to</a>?';
}

?>

</div>

<!--Footer-->

<?php include_once('forum_footer.php');?>

</body>
</html>


