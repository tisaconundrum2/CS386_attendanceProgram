 <?php  
//connect.php  
//start the session.
session_start();


$server = 'tund';  
$username   = 'ngf4';  
$password   = 'web212';  
$database   = 'ngf4';  
  
$cxn = mysql_connect($server, $username,  $password) or die("<p>Couldn't connect to the server, Sorry for the inconvenience.</p>");
$cxnerror = mysql_select_db($database) or die("An Error has occured: " . mysql_error());
?>  
