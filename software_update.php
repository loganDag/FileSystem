<?php
$cookie = $_COOKIE["info"];
$code = $_POST["unique_code"];
shell_exec("rm index.php");
shell_exec("cp /var/www/html/lpdfs/files.php /var/www/html/lpdfs/{$code}/index.php");
shell_exec("rm software_update.php");
shell_exec("cp /var/www/html/lpdfs/software_update.php /var/www/html/lpdfs/{$code}/software_update.php");
?>
<title>Updating software</title>
<h3 id='update'>Updating your file viewing software and updater. After this is updated you will be taken back to the home page.</h3>
<?php
header("refresh: 3 ../home.php");
?>
