<?php
include('connect.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ajax State Edit</title>

<style>
.state
{
	width:345px;
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

<div class="state">
	<form method="post">
    	<table border="2">
        	<tr>
            	<th>Id</th>
                <th>State Name</th>
                <th>State Status</th>
                <th>Country_id</th>
                <th>Country Name</th>
            </tr>
            
            <?php
			$a="SELECT state.state_id,state.state_name,state.state_status,state.country_id,country.country_name FROM state INNER JOIN  country ON country.id=state.country_id";
			$b=mysqli_query($conn,$a);
			$count=mysqli_num_rows($b);
			if($count>0)
			{
				while($row=mysqli_fetch_array($b))
				{
					?>
           <tr>
           <td><?php echo $row['state_id'] ?></td>
           <td><?php echo $row['state_name'] ?></td>
           <td><?php echo $row['state_status'] ?></td>
           <td><?php echo $row['country_id'] ?></td>
           <td><?php echo $row['country_name'] ?></td>
           <td align="center"><input type="checkbox" name="ch1[]" value="<?php echo $row['state_id'] ?>" /></td>
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
            <button><a href="ajax-state.php">HOME</a></button>
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
		$edit="UPDATE `state` SET `state_status`='$status' WHERE state_id=$id[$i]";
		mysqli_query($conn,$edit);
	}
	echo"<script>alert('Edit DONE');window.location='edit-state.php';</script>";
}
?>