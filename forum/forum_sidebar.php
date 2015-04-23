<?php
//template
$text = <<<MARKER
<div id="pageholdframe">
<!--content here-->

<div id = "header">
<center>
  <ul>
  	<div id = "menu">
    <a href="../index.php" class="header">Robotics Home</a> - 
    <a href="index.php" class="header">Forum Home</a> - 		
	<a href="create_topic.php" class="header">Create a Topic</a> - 
	<a href="create_category.php" class="header">Create a Category</a> - 

MARKER;

echo $text;

		if($_SESSION['signed_in'])
		{
			echo '<null class="header">Hello ' . htmlentities($_SESSION['user_name']) . '</null> - ';
			echo '<a href="signout.php" class="header">Not you? Sign out</a>';
			echo '</div>';
			}
		else
		{
			echo '<a href="signin.php" class="header">Sign in</a> - ';
			echo '<a href="signup.php" class="header">Create an account</a>';
			echo '</div>';			
			}
?>  	

</center>
</div>

