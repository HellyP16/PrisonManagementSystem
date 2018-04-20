<?php

include('connect.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>


<style>
table
{
	background-color:#6FC;
	float:left;
}

table:hover
{
	box-shadow:2px 3px 50px #666666;
}

input[type=submit]
{
	font-weight:bolder;
	background-color:#303;
	color:#FFF;
	border-radius:50px;
	line-height:25px;
	width:30%;
}

</style>
</head>
<body>
<?php
    $id=$_GET['id'];
	
	$a="SELECT * FROM `register_here` WHERE id='$id'";
	$b=mysqli_query($conn,$a);
	$row=mysqli_fetch_array($b);
?>

   <fieldset>
            <legend align="center">REGISTRATION</legend>
            <form method="post" enctype="multipart/form-data">
            <table border="2">
            <tr>
            <td>FULL NAME</td>
            <td><input type="text" name="fname" id="fname" placeholder="Enter First Name" value="<?php echo $row['fname'] ?>"/></td>			           
            <td><input type="text" name="mname" id="mname" placeholder="Enter Middle Name" value="<?php echo $row['mname'] ?>" /></td>
            <td><input type="text" name="lname" id="lname" placeholder="Enter Last Name" value="<?php echo $row['lname'] ?>"/></td>
            </tr>
            
            <tr>
            <td>EMAIL-ID</td>
            <td><input type="text" name="email" id="email" placeholder="ENter Email" value="<?php echo $row['email'] ?>" /></td>
            </tr>
            
            <tr>
            <td>PHONE</td>
            <td><input type="text" name="phone" id="phone" placeholder="Enter phone" value="<?php echo $row['phone'] ?>"/></td>
            </tr>
            
            <tr>
            <td>GENDER</td>
            <td><input type="radio" name="gender" id="male" value="MALE" 
            <?php

			if($row['gender']=='male')
			{
				echo "checked=checked";
			}
			?>
            />MALE
            <input type="radio" name="gender" id="female" value="FEMALE" 
             <?php

			if($row['gender']=='female')
			{
				echo "checked=checked";
			}
			?>
            />FEMALE</td>
            </tr>
            
            <tr>
            <td>DOB</td>
            <td><input type="date" name="date1" id="date1" value="<?php echo $row['dob'] ?>"/></td>
            </tr>
            
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
            <div id="cityid">
            <select name="city" id="city">
            <option value="null">--SELECT CITY--</option>
            </select>
            </div>
            </td>
            </tr>
            
            <tr>
            <td>AREA</td>
            <td><input type="text" name="area" id="area" /></td>
            </tr>
                         
                      
            
            <tr>
            <td>HOBBY</td>
            <td>
            <?php
			$hobby=explode(",",$row['hobby']);
			$m0=$hobby[0];
			$m1=$hobby[1];
			$m2=$hobby[2];
			$m3=$hobby[3];
			?>
			<input type="checkbox" name="hobby[]" id="read" value="read"
			<?php
			if($m0=='read')
			{
				echo "checked=checked";
			}
			?>
		    />READ
			
            <input type="checkbox" name="hobby[]" id="dance" value="dance" 
			<?php
			if($m0=='dance' || $m1=='dance')
			{
				echo "checked=checked";
			}
			?>
			/>DANCE
			
            <input type="checkbox" name="hobby[]" id="draw" value="draw"
			<?php
			if($m0=='draw' || $m1=='draw' || $m2=='draw' )
			{
				echo "checked=checked";
			}
			?>
			/>DRAW
            
			<input type="checkbox" name="hobby[]" id="swim" value="swim" 
			<?php
			if($m0=='swim' || $m1=='swim' || $m2=='swim' || $m3=='swim' )
			{
				echo "checked=checked";
			}
			?>
			/>SWIM
                       
            <tr>
          	<td>HEIGHT</td>
            <td><select name="height" id="height">
            <option value="<?php echo $row['height'] ?>" <?php if($row['height']) { echo "selected"; } ?>><?php 			echo $row['height'] ?> Foot</option>
            <option value="4">4 FOOT</option>
            <option value="5">5 FOOT</option>
            <option value="6">6 FOOT</option>
            <option value="7">7 FOOT</option>
            </select></td>
            </tr>
            
      		<tr>
            <td>PASSWORD</td>
            <td><input type="text" name="pass" id="pass" value="<?php echo $row['password'] ?>" /></td>
            </tr>
            
            <tr>
            <td>CONFIRM PASSWORD</td>
            <td><input type="text" name="cpass" id="cpass" value="<?php echo $row['confirm_psw'] ?>" /></td			>
            </tr>
      
           <tr>
            <td>Image</td>
            <td><input type="hidden" name="hidden" value="<?php echo $row['image']; ?>" />
            <input type="file" name="upload" accept="image/gif,image/jpeg,image/jpg,image/png" />
            <br />
            <img src="image/<?php echo $row['image'] ?>" width="100" height="100" />
            </td>
            </tr>
 
            <tr>
            <td colspan="4" align="center"><input type="submit" name="submit" value="EDIT" /></td>
            </tr>
            
            </table>
            </form>
            </fieldset>
		
</body>
</html>

<?php
if(isset($_REQUEST['submit']))
{
$fname=$_POST['fname'];
$mname=$_POST['mname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$phone=$_POST['phone'];
$gender=$_POST['gender'];
$date1=$_POST['dob'];
$count=$_POST['country'];
$state=$_POST['state'];
$city=$_POST['city'];
$area=$_POST['area'];
$hobby=implode(",",$_POST['hobby']);
$height=$_POST['height'];
$pass=$_POST['pass'];
$cpass=$_POST['cpass'];
$a="SELECT * FROM `register_here` WHERE email='$email' AND id!='$id'";
$b=mysqli_query($conn,$a);
$count=mysqli_num_rows($b);

if($count>0)
{
	echo"<script>alert('Email Id Already Exist');window.location='edit_data.php?id=".$row['id']."';</script>";
}
else
{
$file_name=$_FILES["upload"]["name"];
$file_tmpname=$_FILES["upload"]["tmp_name"];
$file_type=$_FILES["upload"]["type"];
$file_error=$_FILES["upload"]["error"];
$file_size=$_FILES["upload"]["size"];

if($file_name=="")
{
	$upload=$_POST['hidden'];
}

if($file_name!="")
{
		if(file_exists("image/".$file_name))
		{
			$upload=rand(1001,1500).$file_name;
		}
		else
		{
			$upload=$file_name;
		}
		move_uploaded_file($_FILES['upload']['tmp_name'],"image/".$upload);
}
$update="UPDATE `register_here` SET `fname`='$fname', `mname`='$mname', `lname`='$lname', `email`='$email', `phone_num`='$phone', `gender`='$gender', `dob`='$date1', `country`='$count', `state`='$state', `city`='$city',`area`='$area', `hobby`='$hobby', `height`='$height', `password`='$pass', `confirm_psw`='$cpass', `image`='$upload' WHERE id='$id'";
mysqli_query($conn,$update);
echo"<script>alert('Edited');window.location='display_table_data.php';</script>";
}

	
}
?> 