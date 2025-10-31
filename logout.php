<title>LPD FileService - Logout</title>

<?php
session_start(); 
session_unset(); 
session_destroy(); 
$cookie_name = "info";
setcookie("info", "",time()-3600, "/");
setcookie("PHPSESSID", "",time()-3600, "/");
header("refresh: 1 index.php"); 
echo "<h1>Logging you out</h1>";
exit(); 
?>

