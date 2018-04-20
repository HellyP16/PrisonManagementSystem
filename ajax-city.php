<?php
include('connect.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Ajax City</title>

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
<script src="ajax-city(js).js"></script>

<!--AJAX CODE-->
<script>
function getState(strURL)
{
	var xmlhttp;
	if(window.XMLHttpRequest)
	{//Firefox,Opera, Chrome, Safari, IE7
		xmlhttp=new XMLHttpRequest();
	}
	else
	{//IE5 and IE6
	xmlhttp=new ActiveXObject("MICROSOFT.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("stateid").innerHTML=xmlhttp.responseText;
		}
	}
xmlhttp.open("GET",strURL,true);
xmlhttp.send();
}
</script>
</head>

<body>

<div class="state">
	<form method="post" onsubmit="return valid();">
    	<table border="2">
        	<tr>
            <td>Country</td>
            <td><select name="country" id="country" onchange="getState('ajax-getState.php?id='+this.value)">
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
            <td>
            <div id="stateid">
            <select name="state" id="state">
            <option value="null">--SELECT STATE--</option>
            </select>
            </div>
            </td></tr>
            
            <tr>
            <td>City</td>
            <td>
            <input type="text" name="city" id="city" />
            </td>
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
            <input type="submit" name="submit" value="CITY" />
            <button><a href="edit-city.php">EDIT</a></button>
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
	$state_id=$_POST['state'];
	$city=$_POST['city'];
	$status=$_POST['status'];
	
	$a="SELECT * FROM city WHERE `city_name`='$city'";
	$b=mysqli_query($conn,$a);
	$count=mysqli_num_rows($b);
	if($count>0)
	{
		echo"<script>alert('City Already Exists');window.location='ajax-city.php';</script>";
	}
	else
	{
		$inc="INSERT INTO `city`(`city_name`,`city_status`,`state_id`,`country_id`) VALUES('$city','$status','$state_id','$country_id')";
		mysqli_query($conn,$inc);
		echo"<script>alert('City Added');window.location='ajax-city.php';</script>";
	}
	
}
?>

