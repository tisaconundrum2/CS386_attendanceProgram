<?php
include("server.php");

echo "</br>log out successful";
$_SESSION['user']=-1;
header('Location: index.php?p=l');

?>
