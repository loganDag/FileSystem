<meta name="viewport" content="width=device-width, intial-scale=1">
<title>LPD - File Service - Login</title>
<style>
.logerr{
border: 3px solid red;
width: 300px;
}
</style>
<?php
include("loader.html");
if (isset($_POST["submit"])){
$cookie_name = "info";
$cookie_value = $_POST["email"];
setcookie($cookie_name, $cookie_value, time() + (86400 * 14), "/"); //cookie is set for 14 days
//include("cookie_set.php");                                                                                                                                              
/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
     echo("Something went wrong :( please contact <a href='mailto:logandag11@gmail.com'>the webmaster</a> with the page your on and the error.");
    exit();
}
$em = $_POST["email"];
                                                                                                                                                     
$query = "SELECT * FROM users WHERE email=('$em')";
$result = $mysqli->query($query);
while($info = mysqli_fetch_array($result)){                                                                                    
$pw = $info['password'];
        $sub = $info['sub_directory'];
	$uc = $info["unique_code"];
	$email = $info["email"];
}
//start isset
//if (isset($_POST["submit"])){
$pw2 = $_POST["password"];
$passcode = $_POST["passcode"];
$pw3 = md5($pw2);
//start database checks
if ($em != $email){
echo ("<center><div class='logerr'>The email you entered is wrong! Please <a href='login.php'>Click here </a> to continue</div></center>");
exit();
}else{}
if ($pw3 !=$pw){
echo ("<center><div class='logerr'>The password you entered was wrong! Please <a href='login.php'>Click here </a> to continue</div></center>");
exit();
}else{}
session_start();
header("Location: home.php");
$_SESSION['loggedin'] = true; 
$_SESSION['email'] = $em;
//end isset with bracket below
}
?>
<form action="" method="post">
<title>File Service - Login</title>
<center>
<h3 id="main"> LPD File Service - Login</h3>
<input type="email" name="email" id="email" required  placeholder='Your email...' title='Enter your email...'><br><br>
<input type="password" name="password" id="password" required placeholder='Your Password...' title='Enter your password...'><br><br>
<!--<input type="password" name="passcode" id="passcode" required placeholder="Your Unique Passcode..." title='Enter your passcode that was sent to you via email to keep...'><br><br>-->
<input type="submit" name="submit" id="Login" value="Login" title="Login to the site"><br><br>
</form>
<h3 id="signup">Don't have an account? <a href='index.php'>Click here</a> to sign up</h3>
</center>
<style>
#signup{
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
cursor: help;
}
#Login{ 
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
