<?php
$cookie = $_COOKIE["info"];
session_start();
if (!$cookie){
	echo "<center> PLEASE LOGIN. REDIRECTING YOU.</center>";
	header ('refresh: 2 /login.php');
	exit();
}
$sql = "SELECT * FROM users WHERE email=('$cookie')";
$result = $conn->query($sql);
while($info = mysqli_fetch_array($result)){
$pw = $info['password'];
        $sub = $info['sub_directory'];
        $email = $info['email'];
	$ps2 = $info['unique_code'];
}
include("menu.php");
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { 
session_start();
$un2 = $_SESSION["username"];
echo "<center><div class='welcome'>Welcome to the member's area, $email! Remember, you can only upload one file at a time unless its a zipped file.</div></center>"; 
} else { 
die ("Please log in first to see this page. <a href='login.php'>Login</a>"); 
}
//start file service
$mysqli = new mysqli("localhost", "root", "4107010668", "file");
if ($mysqli->connect_errno){
printf("Connection failed: %s\n", $mysqli->connect_error);
echo ("Something happened. Please contact <a href='mailto: logandag11@gmail.com'>The webmaster</a> with the error on your page.");
exit();
}
$query = "SELECT email, sub_directory, unique_code FROM users WHERE email=('$cookie')";
$result2 = $mysqli->query($query);
while($info2 = mysqli_fetch_array($result2)){
$sub2 = $info2['unique_code'];
$sub3 = $info2['sub_directory'];
}
$currentDir = getcwd();
	$uploadDirectory = "$sub3/";
$errors = [];
$fileName = $_FILES['myfile']['name'];
$fileSize = $_FILES['myfile']['size'];
$fileTmpName = $_FILES['myfile']['tmp_name'];
$fileType = $_FILES['myfile']['type'];
$fileExtension = strtolower(end(explode('.',$fileName)));

$uploadPath = $currentDir . $uploadDirectory . basename($fileName);
//start upload side
if (isset($_POST["submit"])){
if (empty($errors)){
$didUpload = move_uploaded_file($fileTmpName, $uploadPath);

if ($didUpload){
echo "The file <u><i><b>" . basename($fileName) . " </u></i></b>has ben uploaded<br><br>";
}else{
echo "An error occurred somewhere. try again or contact <a href='mailto:email@email.com'>The admin</a>";
}
}else{
foreach ($errors as $error){
echo $error . "These are the errors" . "\n";
}
}
                                                                                                                                                                                                               
//end file service
}
include ("noti.php");
?>
<head>
<meta charset="UTF-8">
<title>LPD - File Service - Upload/Home</title>
</head>
<body>
<center>
<form id="upload_form" action=""  method="post" enctype="multipart/form-data">
Upload a file:<br><br><br>
<input type="file" name="myfile" id="myfile"><br><br><br>
<input type="submit" name="submit" value="Upload File Now!" class="upload"><br>
</form>
<style>
.upload{
color: red;
border: green;
padding: 4px;
}
.logout{
position: fixed;
top: 20px;
right: 10px;
}
</style>
</center>
</html>
