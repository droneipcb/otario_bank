<?php

session_start();
$error="";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
// username and password sent from form 

//proteção contra sql injection
//$myusername=addslashes($_POST['username']); 
//$mypassword=addslashes($_POST['password']); 

$myusername=$_POST['username']; 
$mypassword=$_POST['password']; 

$db = new SQLite3('/var/www/auth1.sqlite3',SQLITE3_OPEN_READONLY);
$db->busyTimeout(300); //para evitar database lock issues

//esta propositadamente vulneravel a SQL injection
$sqlQuery="SELECT * FROM users WHERE user='$myusername' and password='$mypassword'";
$stmt = $db->prepare($sqlQuery);

$results = $stmt->execute();
if ($row = $results->fetchArray()) {
	$db->close(); 

	$_SESSION['login_user']=$myusername;
	header("location: welcome.php");
}
else  {
	$db->close(); 
	$error="Your Login Name or Password is invalid";
}
}


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<head>
<link rel="stylesheet" type="text/css" href="styles.css">
<script src="jquery-3.3.1.min.js"></script>
<title>Login Page</title>
</head>

<script>
$(document).ready(function() {
    $("#auth").hide().fadeIn(1000);
});
</script>

<div id="auth" class="auth_div">

	<form action="" method="post">
		<label>UserName</label>
		<input id="username" type="text" name="username" class="box"/><br /><br />

		<label>Password</label>
		<input  id="password" type="password" name="password" class="box" /><br/><br />
		
		<input class="login_button" type="submit" value=" Login "/><br />
	</form>

	<center><div style="font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
</div>

</body>
</html>
