<?php
include('connect.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ajax Country</title>

<style>
.country
{
	width:242px;
	/*background-color:#333333;*/
	box-shadow:2px 3px 20px #000066;
	height:auto;
	margin:150px auto;
}

a
{
	text-decoration:none;
}
</style>

<script src="ajax-country(js).js"></script>
</head>

<body>

<div class="country">
	<form method="post" onsubmit="return valid();">
    	<table border="2">
        	<tr>
            <td>Country</td>
            <td><input type="text" name="country" id="country" /></td>
            </tr>
            
            <tr>
            <td>Status</td>
            <td><select name="status" id="status">
            <option value="null">--SELECT STATUS--</option>
            <option value="Active">ACTIVE</option>
            <option value="Inactive">INACTIVE</option>
            </select>
            </td>
            </tr>
            
            <tr>
            <td colspan="2" align="center">
            <input type="submit" name="submit" value="COUNTRY" />
            <button><a href="edit-country.php">EDIT</a></button>
            </td>
            </tr>
        </table>
    </form>
</div>
</body>
</html>

<?php
if(isset($_POST['submit']))
{
	$country=$_POST['country'];
	$status=$_POST['status'];
	
	$a="SELECT * FROM country WHERE `country_name`='$country'";
	$b=mysqli_query($conn,$a);
	$count=mysqli_num_rows($b);
	if($count>0)
	{
		echo"<script>alert('Country Already Exists');window.location='ajax-country.php';</script>";
	}
	else
	{
		$inc="INSERT INTO `country`(`country_name`,`country_status`) VALUES('$country','$status')";
		mysqli_query($conn,$inc);
		echo"<script>alert('Country Added');window.location='ajax-country.php';</script>";
	}
	
}
?>

