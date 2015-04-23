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
echo '<h1>Create a category</h1>';
if($_SESSION['signed_in'] == false | $_SESSION['user_level'] != 1 )
{
	//the user is not an admin
	echo '<p>Sorry, you do not have sufficient rights to access this page.';
}
else
{
	//the user has admin rights
	if($_SERVER['REQUEST_METHOD'] != 'POST')
	{
		//the form hasn't been posted yet, display it
		echo '<form method="post" action=""><p>
			Category name: <input type="text" name="cat_name" /><br />
			Category description:<br /> <textarea name="cat_description" /></textarea><br /><br />
			<input type="submit" value="Add category" />
		 </form>';
	}
	else
	{
		//the form has been posted, so save it
		$sql = "INSERT INTO categories(cat_name, cat_description)
		   VALUES('" . mysql_real_escape_string($_POST['cat_name']) . "',
				 '" . mysql_real_escape_string($_POST['cat_description']) . "')";
		$result = mysql_query($sql);
		if(!$result)
		{
			//something went wrong, display the error
			echo '<p>Error' . mysql_error();
		}
		else
		{
			echo '<p>New category succesfully added.';
		}
	}
}

?>

</div>

<!--Footer-->

<?php include_once('forum_footer.php');?>

</body>
</html>


