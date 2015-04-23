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
echo '<h1>Sign up</h1><br />';

if($_SERVER['REQUEST_METHOD'] != 'POST')
{
    /*the form hasn't been posted yet, display it
	  note that the action="" will cause the form to post to the same page it is on */
    echo '
        <form method="post" action="">
		<p>
        <label for="user_name">Username: </label> <input type="text" name="user_name" /><br />
        <label for="user_pass">Password: </label> <input type="password" name="user_pass"><br />
        <label for="user_pass_check">Retype Password: </label> <input type="password" name="user_pass_check"><br />
        <label for="user_email">Email: </label> <input type="email" name="user_email"><br />
        <input type="submit" value="Sign Up" />
        </form>';
}
else
{
    /* so, the form has been posted, we'll process the data in three steps:
		1.	Check the data
		2.	Let the user refill the wrong fields (if necessary)
		3.	Save the data 
	*/
	$errors = array(); /* declare the array for later use */
	
	if(isset($_POST['user_name']))
	{
		//the user name exists
		if(!ctype_alnum($_POST['user_name']))
		{
			$errors[] = '<p>The username can only contain letters and digits.';
		}
		if(strlen($_POST['user_name']) > 30)
		{
			$errors[] = '<p>The username cannot be longer than 30 characters.';
		}
	}
	else
	{
		$errors[] = '<p>The username field must not be empty.';
	}
	
	
	if(isset($_POST['user_pass']))
	{
		if($_POST['user_pass'] != $_POST['user_pass_check'])
		{
			$errors[] = '<p>The two passwords did not match.';
		}
	}
	else
	{
		$errors[] = '<p>The password field cannot be empty.';
	}
	
	if(!empty($errors)) /*check for an empty array, if there are errors, they're in this array (note the ! operator)*/
	{
		echo '<p>Uh-oh.. a couple of fields are not filled in correctly..<br /><br />';
		echo '<ul>';
		foreach($errors as $key => $value) /* walk through the array so all the errors get displayed */
		{
			echo '<li>' . $value . '</li>'; /* this generates a nice error list */
		}
		echo '</ul>';
		
		//I tried to set it up so it would fit in a variable but it wasn't cooperating with me
    echo '
        <form method="post" action="">
		<p>
        <label for="user_name">Username: </label> <input type="text" name="user_name" /><br />
        <label for="user_pass">Password: </label> <input type="password" name="user_pass"><br />
        <label for="user_pass_check">Retype Password: </label> <input type="password" name="user_pass_check"><br />
        <label for="user_email">Email: </label> <input type="email" name="user_email"><br />
        <input type="submit" value="Sign Up" />
        </form>';;
	}
	
	else
	{
		//the form has been posted without, so save it
		//notice the use of mysql_real_escape_string, keep everything safe!
		//also notice the sha1 function which hashes the password
		$sql = "INSERT INTO
					users(user_name, user_pass, user_email ,user_date, user_level)
				VALUES('" . mysql_real_escape_string($_POST['user_name']) . "',
					   '" . sha1($_POST['user_pass']) . "',
					   '" . mysql_real_escape_string($_POST['user_email']) . "',
						NOW(),
						0)";
						
		$result = mysql_query($sql);
		/*$existuser = mysql_query("insert into users (username) values ('$username')")or die('Username has already been taken please try again. <br /> <br />
		<form method="post" action="">
		<label for="user_name">Username: </label> <input type="text" name="user_name" /><br />
		<label for="user_pass">Password: </label> <input type="password" name="user_pass"><br />
		<label for="user_pass_check">Retype Password: </label> <input type="password" name="user_pass_check"><br />
		<label for="user_email">Email: </label> <input type="email" name="user_email"><br />
		<input type="submit" value="Sign Up" />
		</form>');*/

		if(!$result)
		{
			//something went wrong, display the error
		echo '
		<p>It looks that user name is already used.
        <form method="post" action="">
		<p>
        <label for="user_name">Username: </label> <input type="text" name="user_name" /><br />
        <label for="user_pass">Password: </label> <input type="password" name="user_pass"><br />
        <label for="user_pass_check">Retype Password: </label> <input type="password" name="user_pass_check"><br />
        <label for="user_email">Email: </label> <input type="email" name="user_email"><br />
        <input type="submit" value="Sign Up" />
        </form>';
			//echo mysql_error(); //debugging purposes, uncomment when needed
		}
		else
		{
			echo '<p>Succesfully registered. You can now <a href="signin.php">sign in</a> and start posting! :-)';
		}
	}
}
?>

</div>

<!--Footer-->

<?php include_once('forum_footer.php');?>

</body>
</html>


