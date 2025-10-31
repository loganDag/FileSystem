<title>File Service - Admin panel</title>
<?php
$cookie = $_COOKIE["info"];
$connect = mysqli_connect("");
$sql = "SELECT * FROM users WHERE email=('$cookie')";
$result = $connect->query($sql);
while ($things = mysqli_fetch_array($result)){
	$role = $things["role"];
	$users = $things["email"];
}
mysqli_free_result($result);
$sql1 = "SELECT * FROM users";
$result1 = $connect->query($sql1);
while($things1 = $result1->fetch_assoc()){
      $userid = $things1["userid"];
	  $users1[] = $things1["email"];
}
mysqli_free_result($result1);
if ($role != 'admin'){
echo "Go back to home page! <a href='home.php'>Home</a>";
exit();
}else{}
include ("menu.php");
echo "<center>Registered users: <br>";
$x = 0;
while($x != sizeof($users1)){
echo"Email: " .$users1[$x]. "</center><br>";
$x += 1;
}
$title = "Software Update";
$body = "New update available!";
$date = date('Y-m-d h:i:s');
$reason = "Security and features";
$viewed = "0";
$viewed_at = date('Y-m-d h:i:s');
if (isset($_POST['notifyupdate'])){
foreach ($users1 as $users11){
$sql12 = "INSERT INTO notifications (title, body, date, user_email, reason, viewed, viewed_at) VALUES ('" . $title . "', '" . $body . "', '" . $date . "', '" . $users11 . "', '" . $reason . "', '" . $viewed . "', '" . $viewed_at . "')";
$result12 = mysqli_query($connect, $sql12); 
}
echo "Notifications sent! <br>";
}
else if (! $result12) { 
$result = mysqli_error($connect); 
}
if (isset($_POST["custom_notification"])){
	$body = $_POST["body"];
	$reason = $_POST["reason"];
	$title = $_POST["title"];
	foreach($users1 as $users11){
		$sql12 = "INSERT INTO notifications (title, body, date, user_email, reason, viewed, viewed_at) VALUES ('".$title."', '".$body."', '".$date."', '".$users11."', '".$reason."', '".$viewed."', '".$viewed_at."')";
		$result12 = mysqli_query($connect, $sql12);
	}
	echo "<center> Notifications sent to users</center>";
}
else if (!$result12){
	$result = mysqli_error($connect);
	echo "$result";
}
?>
<center>
<form action="" method="post">
<input type="submit" name="notifyupdate" value="Send software update Notification" id="notiupdate">
</form>

<form action="" method="post" class="custom_notification">
<br>
<br>
<input type="text" name="title" placeholder="Notification title" required class="notification_form">
<br>
<br>
<input type="text" name="body" placeholder="Notification Body" required class="notification_form">
<br>
<br>
<input type="text" name="reason" placeholder="Reason for notification" required class="notification_form">
<br>
<br>
<input type="submit" name="custom_notification" value="Send Custom Notification" class="notification_button">
</form>
</center>
<style>
.notification_form{
border: 2px solid gray;
width: 90%;
padding: 5px;
border-radius: 6px;
height: 25px;
font-size: 20px;
font-family: sans-serif;
}
.notification_form:focus{
border: 2px solid blue;
}
.notification_button{
font-size: 25px;
width: 50%;
font-family:sans-serif;
height: 35px;
text-align: center;
border-radius: 4px;
color: white;
background-color: #1f828f;
}
.notification_button:hover{
cursor: pointer;
background-color: #0b525c; 
}
.custom_notification{
position: fixed;
top:50%;
left: 50%;
transform: translate(-50%, -50%);
font-family: sans-serif;
width: 50%;
background-color: white;
align-content: center;
border-radius: 3px;
border: 2px solid gray;
}
</style>
</html>
