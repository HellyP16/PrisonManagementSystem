<?php
include('connect.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ajax Country Edit</title>

<style>
.country
{
	width:284px;
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
</head>

<body>

<div class="country">
	<form method="post">
    	<table border="2">
        	<tr>
            	<th>Id</th>
                <th>Country Name</th>
                <th>Country Status</th>
                <th>Edit</th>
            </tr>
            
            <?php
			$a="SELECT * FROM country";
			$b=mysqli_query($conn,$a);
			$count=mysqli_num_rows($b);
			if($count>0)
			{
				while($row=mysqli_fetch_array($b))
				{
					?>
           <tr>
           <td><?php echo $row['id'] ?></td>
           <td><?php echo $row['country_name'] ?></td>
           <td><?php echo $row['country_status'] ?></td>
           <td align="center"><input type="checkbox" name="ch1[]" value="<?php echo $row['id'] ?>" /></td>
           </tr>
           <?php
				}
			}
			?>
            
            <tr>
            <td colspan="4"><select name="status">
            <option value="null">--SELECT STATUS--</option>
            <option value="Active">ACTIVE</option>
            <option value="Inactive">INACTIVE</option>
            </select>
            </td>
            
            </tr>
            
            <tr>
            <td colspan="2" align="center">
            <input type="submit" name="submit" value="EDIT" />
            </td>
            <td colspan="2">
            <button><a href="ajax-country.php">HOME</a></button>
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
	$id=$_POST['ch1'];
	$status=$_POST['status'];
	$count=count($id);
	
	for($i=0;$i<$count;$i++)
	{
		$edit="UPDATE `country` SET `country_status`='$status' WHERE id=$id[$i]";
		mysqli_query($conn,$edit);
	}
	echo"<script>alert('Edit DONE');window.location='edit-country.php';</script>";
}
?>