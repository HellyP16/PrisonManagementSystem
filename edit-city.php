<?php
include('connect.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ajax City Edit</title>

<style>
.state
{
	width:593px;
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
            	<th>City Id</th>
                <th>City Name</th>
                <th>City Status</th>
                <th>State Id</th>
                <th>State Name</th>
                <th>Country_id</th>
                <th>Country Name</th>
            </tr>
            
            <?php
			$a="SELECT city.city_id,city.city_name,city.city_status,city.state_id,state.state_name,city.country_id FROM city INNER JOIN state on state.state_id=city.state_id";
			$b=mysqli_query($conn,$a);
			$count=mysqli_num_rows($b);
			
			$q="SELECT country.country_name FROM country INNER JOIN city ON city.country_id=country.id";
			$w=mysqli_query($conn,$q);
			$count1=mysqli_num_rows($w);
			
			if($count>0 && $count1>0)
			{
				while(($row=mysqli_fetch_array($b)) && ($row1=mysqli_fetch_array($w)))
				{
					?>
           <tr>
           <td><?php echo $row['city_id'] ?></td>
           <td><?php echo $row['city_name'] ?></td>
           <td><?php echo $row['city_status'] ?></td>
           <td><?php echo $row['state_id'] ?></td>
           <td><?php echo $row['state_name'] ?> </td>
           <td><?php echo $row['country_id'] ?></td>
           <td><?php echo $row1['country_name'] ?></td>
           <td align="center"><input type="checkbox" name="ch1[]" value="<?php echo $row['city_id'] ?>" /></td>
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
            <button><a href="ajax-city.php">HOME</a></button>
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
		$edit="UPDATE `city` SET `city_status`='$status' WHERE city_id=$id[$i]";
		mysqli_query($conn,$edit);
	}
	echo"<script>alert('Edit DONE');window.location='edit-city.php';</script>";
}
?>