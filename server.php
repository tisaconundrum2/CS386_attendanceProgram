<?php
session_start();
//phpinfo();
ini_set('display_errors', 1);
error_reporting(E_ALL);
$username = "waffo";
$password = "ferret";
$hostname = "localhost";

$mysqli = new mysqli($hostname, $username, $password, 'bedrock');
/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//print_r( $_POST );
if (!isset($_SESSION['user'])||($_SESSION['user']==-1&&$_SERVER['REQUEST_URI']!='/index.php')){$_SESSION['user']=-1;header('Location: index.php');}
//print_r( $_SESSION );
?>

