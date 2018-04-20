<?php
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
if(isset($_REQUEST['submit']))
{
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$gender=$_POST['gender'];
$date1=$_POST['date1'];
$country=$_POST['country'];
$state=$_POST['state'];
$city=$_POST['city'];
$area=$_POST['area'];
$hobby=implode(",",$_POST['hobby']);
$height=$_POST['height'];
$pass=$_POST['pass'];
$cpass=$_POST['cpass'];
$image_file="image";

$file_name=$_FILES["upload"]["name"];
$file_tmpname=$_FILES["upload"]["tmp_name"];
$file_type=$_FILES["upload"]["type"];
$file_error=$_FILES["upload"]["error"];
$file_size=$_FILES["upload"]["size"];

$a="SELECT * FROM `register_here` WHERE `email`='$email'";
$b=mysqli_query($conn,$a);
$count=mysqli_fetch_array($b);

if($count==0)
{
	if(!is_dir($image_file))
	{
		mkdir($image_file,0777,true);	
	}
	
	if(file_exists("image/".$_FILES['upload']['name']))
	{
		$pic=rand(1,1000).$_FILES['upload']['name'];
	}
	else
	{
		$pic=$_FILES['upload']['name'];
	}
	move_uploaded_file($_FILES['upload']['tmp_name'],"image/".$pic);

$insert="INSERT INTO `register_here`(`fname`, `mname`, `lname`, `email`, `phone_num`, `gender`, `dob`, `country`, `state`, `city`, `area`, `hobby`, `height`, `password`, `confirm_psw`,`image`) VALUES('$fname','$mname','$lname','$email','$phone','$gender','$date1','$country', '$state','$city','$area','$hobby','$height','$pass','$cpass','$pic')";
mysqli_query($conn,$insert);
echo"<script>alert('Successfully Registered');window.location='full-form.php';</script>";
}

else
{
	echo"<script>alert('Email-Id already exists');window.location='full-form.php';</script>";	
}
}

?>
</body>
</html>