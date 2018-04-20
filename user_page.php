<?php

include('connect.php');
session_start();

if(!isset($_SESSION['email']))
{
	header('Location:full-form.html');
}


?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>USER PAGE</title>
</head>

<?php

$a="SELECT * FROM `register_here` WHERE email='".$_SESSION['email']."'";
$b=mysqli_query($conn,$a);
$row=mysqli_fetch_array($b);

echo"WELCOME"." ". strtoupper($row['fname']);


?>
<br />

<button><a href="user-logout.php">LOGOUT</a></button>

<body>
</body>
</html>