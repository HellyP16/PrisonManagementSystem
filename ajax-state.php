<?php
include('connect.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ajax State</title>

<style>
.state
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
<script src="ajax-state(js).js"></script>
</head>

<body>

<div class="state">
	<form method="post" onsubmit="return valid();">
    	<table border="2">
        	<tr>
            <td>Country</td>
            <td><select name="country" id="country">
            <option value="null">--SELECT COUNTRY--</option>
           	<?php
			$a="SELECT * FROM country WHERE `country_status`='Active'";
			$b=mysqli_query($conn,$a);
			$count=mysqli_num_rows($b);
			if($count>0)
			{
				while($row=mysqli_fetch_array($b))
				{
			?>
            <option value="<?php echo $row['id'] ?>"><?php echo $row['country_name'] ?></option>
            <?php
				}
			}
			?>
           
            </select></td>
            </tr>
            
            <tr>
            <td>State</td>
            <td><input type="text" name="state" id="state" />
            </td></tr>
            
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
            <input type="submit" name="submit" value="STATE" />
            <button><a href="edit-state.php">EDIT</a></button>
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
	$country_id=$_POST['country'];
	$state=$_POST['state'];
	$status=$_POST['status'];
	
	$q="SELECT * FROM country WHERE id='$country_id'";
	$w=mysqli_query($conn,$q);
	$row=mysqli_fetch_array($w);
	$country_name=$row['country_name'];
	
	$a="SELECT * FROM state WHERE `state_name`='$state'";
	$b=mysqli_query($conn,$a);
	$count=mysqli_num_rows($b);
	if($count>0)
	{
		echo"<script>alert('State Already Exists');window.location='ajax-state.php';</script>";
	}
	else
	{
		$inc="INSERT INTO `state`(`state_name`,`state_status`,`country_id`,`country_name`) VALUES('$state','$status','$country_id','$country_name')";
		mysqli_query($conn,$inc);
		echo"<script>alert('State Added');window.location='ajax-state.php';</script>";
	}
	
}
?>

