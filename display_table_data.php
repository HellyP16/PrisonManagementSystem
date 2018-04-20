<?php
include('connect.php');
?>

<?php

if(isset($_REQUEST['action'])=="del")
{

	$id=$_GET['id'];
	
	$a="SELECT * FROM `register_here` WHERE id='$id'";
	$b=mysqli_query($conn,$a);
	$row=mysql_fetch_array($b);
	unlink("image/".$row['image']);
	
	$del="DELETE FROM `register_here` WHERE id='$id'";
	mysqli_query($conn,$del);
	echo"<script>alert('DELETED');window.location='display_table_data.php';</script>";
	
}

?>

<?php
if(isset($_POST['delete']))
{
	$id=$_POST['ch1'];
	$count=count($id);
	
	for($i=0;$i<$count;$i++)
	{
		$q="SELECT * FROM `register_here` WHERE id=$id[$i]";
		$w=mysqli_query($conn,$q);
		$row1=mysqli_fetch_array($w);
		unlink("image/".$row1['image']);
		
		$del="DELETE FROM `register_here` WHERE id=$id[$i]";
		mysqli_query($conn,$del);
	}
	echo"<script>alert('Multiple Delete');window.location='display_table_data.php';</script>";
	
}
?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form method="post" action="" enctype="multipart/form-data">
<table border="2">
<tr>
<th>Id</th>
<th>Fname</th>
<th>Mname</th>
<th>Lname</th>
<th>Email</th>
<th>Phone</th>
<th>Gender</th>
<th>Dob</th>
<th>Country</th>
<th>State</th>
<th>City</th>
<th>Area</th>
<th>Hobby</th>
<th>Height</th>
<th>Password</th>
<th>Confirm_Pass</th>
<th>Image</th>
<th>Single Delete</th>
<th>Multiple Delete</th>
</tr>

<?php
$a="SELECT * FROM `register_here`";
$b=mysqli_query($conn,$a);
$count=mysqli_num_rows($b);
//$country=$_POST['country'];

if($count>0)
{
	while($row=mysqli_fetch_array($b))
	
	{
		?>
<tr>
<td><?php echo $row['id']; ?></td>
<td><?php echo $row['fname']; ?></td>
<td><?php echo $row['mname']; ?></td>
<td><?php echo $row['lname']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['phone_num']; ?></td>
<td><?php echo $row['gender']; ?></td>
<td><?php echo $row['dob']; ?></td>
<td><?php echo $row['country']; ?></td>
<td><?php echo $row['state']; ?></td>
<td><?php echo $row['city']; ?></td>
<td><?php echo $row['area']; ?></td>
<td><?php echo $row['hobby']; ?></td>
<td><?php echo $row['height']; ?></td>
<td><?php echo $row['password']; ?></td>
<td><?php echo $row['confirm_psw']; ?></td>
<td><img src="image/<?php echo $row['image']; ?>" width="100" height="100" /></td>
<td><a href="display_table_data.php?id=<?php echo $row['id'] ?>&amp;action=del">DELETE</a></td>
<td><input type="checkbox" name="ch1[]" value="<?php echo $row['id'] ?>" /></td>
<td><a href="edit_data.php?id=<?php echo $row['id'] ?>">EDIT</a></td>
</tr>

<?php
	}
}

else
{
	?>
<tr><td colspan="16">NO RECORD FOUND</td></tr>
<?php
}
?>

<tr>
<td colspan="18" align="right">
<input type="submit" name="delete" value="DELETE" />
</td>
</tr>

</table>
</form>
</body>
</html>