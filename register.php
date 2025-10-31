<style>
.regerr{
font-family: sans-serif;
color: red;
animation: blinker 1.3s linear infinite;
border: 2px solid red;
width: 400px;
}
@keyframes blinker{
50%{
opacity: 0;
}
}
</style>
<?php
if ($conn->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
     echo("Something went wrong :( please contact <a href='mailto:logandag11@gmail.com'>the webmaster</a> with the page your on and the error.");
    exit();
}
if (isset($_POST["submit"])){
$password = $_POST["password"];
$confopass = $_POST["confopass"];
$passcode = $_POST["passcode"];
$email = $_POST["email"];
$sql = "SELECT * FROM users";
$results = $conn->query($sql);
while($things= mysqli_fetch_array($results)){
$email2 = $things["email"];
$passcode2 = $things["unique_code"];
}
if ($email2 == $email){
echo "<center><div class='regerr>'Sorry that email is taken please chose another one.</div></center>";
}
else if ($passcode == $passcode2){
echo "<center><div class='regerr>'Sorry that unique code already exists. Please chose another one.</div></center>";
}
else if ($password != $confopass){
echo "<center><div class='regerr'>Your passwords don't match please fix this error.</div></center>";
}

else{
$age = "new";
$date = date("Y-m-d h:i:s");
$filesql = "SELECT * FROM file_list_versions WHERE age=('$age')";
$fileresult = $conn->query($filesql);
while ($fileinfo = mysqli_fetch_array($fileresult)){
$listver = $fileinfo["version_number"];
}
$sub = "/$passcode";
$tier = "1";
$paid = "0";
$role = "guest";
$password2 = md5($password);
$insert = "INSERT INTO users (password, email, unique_code, sub_directory, tier, paid_status, role, register_date, file_list_ver, updated_at) VALUES ('" . $password2 . "', '" . $email . "', '" . $passcode . "', '" . $sub . "', '" . $tier . "', '" . $paid . "', '" . $role . "', '" . $date . "', '" . $listver . "', '" . $date . "') ";
if($conn->query($insert) == true){
shell_exec("mkdir /var/www/html/lpdfs/{$passcode}");
shell_exec("chmod 777 /var/www/html/lpdfs/{$passcode}");
shell_exec("cp /var/www/html/lpdfs/files.php /var/www/html/lpdfs/{$passcode}/index.php");
shell_exec("cp /var/www/html/lpdfs/software_update.php /var/www/html/lpdfs/{$passcode}/software_update.php"); 
shell_exec("cp /var/www/html/lpdfs/loader.html /var/www/html/lpdfs/{$passcode}");
shell_exec("cp /var/www/html/lpdfs/loading.gif /var/www/html/lpdfs/{$passcode}");
echo "Please remember your passcode: $passcode";
}
else if ($conn->query($insert) == false){
echo "<title> LPDFS - ERROR</title>";
echo "Something went wrong! Please report the error message to <a href='mailto:email@email.com?subject=sign up insert error'>The support team</a> with the error message on screen in the email please.";
echo("Error description: " . mysqli_error($conn));
}
if ($conn->query($sql) == false){
echo "<title> LPDFS - ERROR</title>";
echo "Something went wrong! Please report the error message to <a href='mailto:email@email.com?subject=sign up insert error'>The support team</a> with the error message on screen in the email please.";
echo("Error description: " . mysqli_error($conn));
}
}
//end signup isset
}
?>
<html>
<form action="" method="post">
<title>File Service - Register</title>
<center>
<h3 id="main"> LPD FileService - Register</h3>
<input type="email" name="email" id="email" required  placeholder='Your email...' title='Enter your email...'><br><br>
<input type="password" name="password" id="password" required placeholder='Your Password...' title='Enter your password...'><br><br>
<input type="password" name="confopass" id="password" required placeholder="Confirm your password.." title="Confirm your password..."><br><br>
<input type="text" name="passcode" id="passcode" required placeholder="Enter a unique password that will be your sub-directory. only one word." title="Enter your unqiue password..."><br><br>
<input type="submit" name="submit" id="signup" value="Signup!" title="Register to the site"><br><br>
</form>
<h3 id="login">Already Registered? <a href='index.php'>Click here</a> to login!</h3>
</center>
<style>
#login{
font-family: sans-serif;
font-size: 20px;
text-decoration: none;
}
a {
color: red;
text-decoration: none;
}
a:hover{
color: blue;
text-decoration: underline;
}
#signup{
color: green;
width: 500px;
height: 50px;
background-color: lightgray;
font-size: 26px;
font-family: sans-serif;
}
#main{
font-family: sans-serif;
box-shadow: 2px 2px 4px 4px gray;
width: 300px;
color: red;
border: 1px solid lightgray;
}
#email{
padding: 4px;
border: 3px solid lightgray;
width: 500px;
border-radius: 2px;
}
#email:focus{
outline: none;
box-shadow: 2px 2px 5px 5px red;
border: 2px solid red;
}
#password{
padding: 4px;
border: 3px solid lightgray;
width: 500px;
border-radius: 2px;
}
#password:focus{
outline:none;
box-shadow: 2px 2px 5px 5px red;
border: 2px solid red;
}
#passcode{
padding: 4px;
border: 3px solid lightgray;
width: 500px;
border-radius: 2px;
}
#passcode:focus{
outline: none;
box-shadow: 2px 2px 5px 5px red;
border: 2px solid red;
}
                                                                                                                                                     
</style>
