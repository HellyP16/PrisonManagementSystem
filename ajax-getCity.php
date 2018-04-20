<?php
include('connect.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ajax Get State</title>
</head>

<body>
<select name="city" id="city">
<option value="null">--SELECT CITY--</option>
<?php
$state_id=$_GET['state_id'];
$a="SELECT * FROM city WHERE `state_id`='$state_id' AND `city_status`='Active'";
$b=mysqli_query($conn,$a);

while($row=mysqli_fetch_array($b))
{
	?>

<option value="<?php echo $row['city_id'] ?>"><?php echo $row['city_name'] ?></option>
<?php
}
?>
</select>
</body>
</html>