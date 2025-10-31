<?php
$up123 = $_GET['up'];
$cookie = $_COOKIE["info"];
//$ps1 = $_GET["up"];
if (!$up123){
die("PLEASE LOGIN <a href='../login.php'>HERE</a>");
}
$conn123 = mysqli_connect("");
if(!$conn123){
die("Connection failed: " . mysqli_connect_error());
}
$query123 = "SELECT * FROM users WHERE email=('$cookie')";
$result123 = $conn123->query($query123);
while($info123 = mysqli_fetch_array($result123)){
$email123 = $info123["email"];
$unique123 = $info123["unique_code"];
}

$query1234 = "SELECT * FROM users WHERE unique_code=('$up123')";
$result1234 = $conn123->query($query1234);
while($info1234 = mysqli_fetch_array($result1234)){
$email1234 = $info1234["email"];
$unique1234 = $info1234["unique_code"];
$code = $info1234["file_list_ver"];
}
   

/*if(isset($_POST["delete"])){
shell_exec("rm {$file}");
}else{
echo "Not deleted";
}*/
if ($unique123 == $unique1234){
include("../menu.php");
echo "<br /><br />";
$files = glob("*");
$files = preg_replace('/(.*).php/i', 'Can not change', $files);
foreach($files as $file)
{
echo "<a href=$file target='_blank' class='files1234'>".basename($file)."</a><form action='' method='post'><input type='submit' name='delete' value='Delete $file (fixing)'></form>";
}
$size = shell_exec("du -h");
}else{
die("THIS IS NOT YOUR SUBDIRECTORY <a href='../login.php'>GO TO LOGIN</a>");
}
?>
<title>LPD - FileService - Your sub-directory</title>
<?php echo "<div class='dirsize'>Your Directory size is $size</div>";?>
<div class="softupdate">
<form action="software_update.php" method="post">
<input type="text" name="unique_code" id="code" placeholder="Your Unique Passcode" required><br>
<input type="submit" name="submit" id='update' value="Update File Listing software">
</form></div>
<div class="softcode">
<?php
$ssql = "SELECT * FROM file_list_versions WHERE version_number=('$code') ";
$rresult = $conn123->query($ssql);
while($ghj = mysqli_fetch_array($rresult)){
$beta = $ghj["beta_name"];
$released = $ghj["date_released"];
$ver_name = $ghj["version_name"];
}
?>
<?php echo "<h3><br>Software Version: $code</h3><br><h4>Version name: $ver_name"; ?>
</div>
<style>
.softcode{
position: fixed;
right: 0px;
border: 3px solid lightgray;
border-radius:5px;
bottom: 0px;
font-family: sans-serif;
}
.files1234{
width: 300px;
color: red;
font-family: monospace;
font-size: 15px;
}
.dirsize{
position: fixed;
right: 0px;
top: 100px;
font-family: sans-serif;
}
.softupdate{
position: fixed;
right: 0px;
top: 150px;
font-family: sans-serif;
}
a {
text-decoration: none;
}
a:hover{
text-decoration: underline overline;
color: blue;
}
</style>
