<?php
//$ps1 = $_GET["up"];
$cookie1 = $_COOKIE["info"];
if(!$conn1){
die("Connection failed: " . mysqli_connect_error());
}
$query1 = "SELECT * FROM users WHERE email=('$cookie1')";
$result1 = $conn1->query($query1);
while($info1 = mysqli_fetch_array($result1)){
$email1 = $info1["email"];
$unique1 = $info1["unique_code"];
}
$sql1 = "SELECT COUNT(*) AS 'unread' FROM notifications WHERE user_email=('$email1') AND viewed=('0')";
$result3 = $conn1->query($sql1);
while($notnum = mysqli_fetch_array($result3)){
$notnum3 = $notnum['unread'];
}
$sql5 = "SELECT * FROM notifications WHERE user_email=('$email1')";
$row345 = $conn1->query($sql5);
while($row123 = mysqli_fetch_array($row345)){
$id = $row123["id"];
}

$date = date("Y/m/d H:i:s");

if(isset($_POST["read"])){
$sql4 = "UPDATE notifications SET viewed=('1'), viewed_at=('$date') WHERE user_email=('$email1') ";
$read = $conn1->query($sql4);
header("Location: home.php");
}
?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.notibox{
display: none;
}
#check:checked ~ .notibox{
border: 2px solid red;
position: fixed;
display: block;
max-width: 9%;
font-family: monospace;
border-radius: 7px;
background-color: #d14d5e;
}
.unread{
border: 2px solid #a84848;
border-radius: 50%;
width: 1.5%;
background-color: #a84848;
text-align: center;
font-family: monospace;
font-size: 18px;
}
#read{
background-color: lightgray;
color: red;
font-family: monospace;
max-width: 170px;
outline: none;
border: red;
}
#read:hover{
box-shadow: 2px 2px 6px 4px red;
}
</style>
<label id="notifications">Show Notifications</label>
<input type="checkbox" name="check" role="button" id="check"><br>
<form action='' method='post'><input type='submit' value='Mark all as read' id='read' name='read'></form>
<?php echo "<div class='unread'>$notnum3</div>"; ?>
<div class="notibox">
<?php 
$servername = "localhost"; 
$username = "root"; 
$password = "4107010668"; 
$dbname = "file"; 
// Create connection 
$conn = new mysqli($servername, $username, $password, $dbname); 
// Check connection 
if ($conn->connect_error) { 
die("Connection failed: " . $conn->connect_error); 
} 
$sql = "SELECT * FROM notifications WHERE user_email=('$email1') AND viewed=('0')"; 
$result = $conn->query($sql); 
if ($result->num_rows > 0) 
{ 
// output data of each row 
while($row = $result->fetch_assoc()) 
{
$body = $row["body"];
$title = $row["title"];
$date = $row["date"];
echo "<div class='notitle'>$title</div><br>";
echo "<div class='body'>$body <br> Sent at: $date</div><br />";
echo "<br><br>";   
} 
} else { 
echo "0 unread notifications"; 
}
$conn->close(); 
?>
</div>

