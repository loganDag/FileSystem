<?php
include ("loader.html");
$up34 = $_GET["up"];
//$sql = ("SELECT sub_directory, email, password, unique_code, tier FROM users WHERE unique_code=('$ps')");
$sql34 = ("SELECT * FROM users WHERE email=('$cookie')");
$result34 = $conn34->query($sql34);
while($info34 = mysqli_fetch_array($result34)){
$pw34 = $info34['password'];
        $sub34 = $info34['sub_directory'];
        $email34 = $info34['email'];
        $ps34 = $info34['unique_code'];
	$role = $info34["role"];
}

?>
<html>
<meta name="viewport" content="width=device-width, intial-scale=1">
<style>
ul 
{ 
list-style-type: none; 
margin: 0; 
padding: 0; 
overflow: hidden; 
background-color: #333; 
} 

.hi{
float:left;
}
/*
li { 
float: left; 
} 
*/
/*li .active { 
display: block; 
color: white; 
text-align: center; 
padding: 14px 16px; 
text-decoration: none; 
} */
.hi .active {
display: block;
color: white;
text-align: center;
padding: 14px 16px;
text-decoration: none;
}
/*li .active:hover { 
background-color: #111; 
} */
.hi .active:hover{
background-color: #119;
}
</style> 
</head> 
<body> 
<ul>
<div class="menu234"> 
<?php echo "<li class='hi' ><a class='active' href='/lpdfs/home.php?up=$ps34'>Home</a></li>";?> 
<li class="hi"><a class="active" href="/lpdfs/logout.php">Logout</a></li> 
<?php echo "<li class='hi' ><a class='active' href='$ps34/index.php?up=$ps34'>Go to your files $cookie</a></li>";?> 
<?php echo "<li class='hi' ><a class='active' href='/ldpfs/settings.php?up=$ps34'>Settings (not yet made)</a></li>";?>
<?php if ($role != 'admin'){}else{
echo "<li class='hi'><a class='active' href='/lpdfs/admin.php'>Admin Panel</a></li>";
}
?>
</ul> <br>
</div>
</html>
