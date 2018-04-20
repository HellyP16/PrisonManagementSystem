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
<select name="state" id="state" onchange="getCity('ajax-getCity.php?state_id='+this.value)">
<option value="null">--SELECT STATE--</option>
<?php
$country_id=$_GET['id'];
$a="SELECT * FROM state WHERE `country_id`='$country_id' AND `state_status`='Active'";
$b=mysqli_query($conn,$a);

while($row=mysqli_fetch_array($b))
{
	?>

<option value="<?php echo $row['state_id'] ?>"><?php echo $row['state_name'] ?></option>
<?php
}
?>
</select>
</body>
</html>