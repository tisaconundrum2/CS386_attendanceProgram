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

<h1>Forum Home</h1>

<?php
if($_SERVER['REQUEST_METHOD'] != 'POST')
{
	//someone is calling the file directly, which we don't want
		echo '<p>This file cannot be called directly.';
}
else
{
	//check for sign in status
	if(!$_SESSION['signed_in'])
	{
		echo '<p>You must be signed in to post a reply.';
	}
	else
	{
		//a real user posted a real reply
		$sql = "INSERT INTO 
					posts(post_content,
						  post_date,
						  post_topic,
						  post_by) 
				VALUES ('" . $_POST['reply-content'] . "',
						NOW(),
						" . mysql_real_escape_string($_GET['id']) . ",
						" . $_SESSION['user_id'] . ")";
						
		$result = mysql_query($sql);
						
		if(!$result)
		{
			echo '<p>Your reply has not been saved, please try again later.';
		}
		else
		{
			echo '<p>Your reply has been saved, check out <a href="topic.php?id=' . htmlentities($_GET['id']) . '">the topic</a>.';
		}
	}
}
?>

</div>

<!--Footer-->

<?php include_once('forum_footer.php');?>

</body>
</html>


