<?php

session_start();
include('connect.php');

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

if(isset($_REQUEST['login']))
{
	$email=$_POST['email'];
	$pas=$_POST['pas'];
	
	$a="SELECT * FROM `register_here` WHERE email='$email' AND phone='$pas'";
	$b=mysqli_query($conn,$a);
	$count=mysqli_num_rows($b);
	if($count==0)
	{
		echo"<script>alert('Wrong Email Id and Phone No');window.location='full-form.html';</script>";
	}
	else
	{
		$_SESSION['email']=$email;
		echo"<script>alert('Matched Found');window.location='user_page.php';</script>";
	}
	
}


?>



</body>
</html>