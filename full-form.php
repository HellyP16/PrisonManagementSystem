<?php

include('connect.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>DATABASE MAIN</title>
<link rel="stylesheet" href="fullformcss.css" />
<script src="fullform.js"></script>
<!--AJAX CODE-->
<script>
function getState(strURL)
{
	var xmlhttp;
	if(window.XMLHttpRequest)
	{//Firefox,Opera, Chrome, Safari, IE7+
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

function getCity(strURL)
{
	var xmlhttp;
	if(window.XMLHttpRequest)
	{
		xmlhttp=new XMLHttpRequest();
	}
	else
	{
		xmlhttp=new ActiveXObject("MICROSOFT.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if(xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			document.getElementById("cityid").innerHTML=xmlhttp.responseText;
		}
	}

xmlhttp.open("GET",strURL,true);
xmlhttp.send();	
}
</script>

</head>

<body style="margin:0px; padding:0px">
<div id="main">
	<div id="header">
    	<div id="logo"></div>
    </div>
    <div id="menu">
    	<div class="dropdown">
   		    <button class="dropdown-button">HOME</button>
        	<div class="dropdown-content">    
                <a href="CA4RH72I.jpg" target="_blank">DEMO</a>
                <a href="file:///C|/images/CAAJ1MRM.jpg" target="_blank">DEMO1</a>
                <a href="file:///C|/images/CACTIFWL.jpg" target="_blank">DEMO2</a>
                <a href="file:///C|/images/CAD3ZHVH.jpg" target="_blank">DEMO3</a>
			</div>            
        </div>

		<div class="dropdown">
		    <button class="dropdown-button">HOME</button>
        	<div class="dropdown-content">
                <a href="file:///C|/images/CA4RH72I.jpg" target="_blank">DEMO</a>
                <a href="file:///C|/images/CAAJ1MRM.jpg" target="_blank">DEMO1</a>
                <a href="file:///C|/images/CACTIFWL.jpg" target="_blank">DEMO2</a>
                <a href="file:///C|/images/CAD3ZHVH.jpg" target="_blank">DEMO3</a>
			</div>            
        </div>

		<div class="dropdown">
             <button class="dropdown-button">HOME</button>
             <div class="dropdown-content">
                <a href="file:///C|/images/CA4RH72I.jpg" target="_blank">DEMO</a>
                <a href="file:///C|/images/CAAJ1MRM.jpg" target="_blank">DEMO1</a>
                <a href="file:///C|/images/CACTIFWL.jpg" target="_blank">DEMO2</a>
                <a href="file:///C|/images/CAD3ZHVH.jpg" target="_blank">DEMO3</a>
			</div>            
        </div>

		<div class="dropdown">
       		<button class="dropdown-button">HOME</button>
            <div class="dropdown-content">    
                <a href="file:///C|/images/CA4RH72I.jpg" target="_blank">DEMO</a>
                <a href="file:///C|/images/CAAJ1MRM.jpg" target="_blank">DEMO1</a>
                <a href="file:///C|/images/CACTIFWL.jpg" target="_blank">DEMO2</a>
                <a href="file:///C|/images/CAD3ZHVH.jpg" target="_blank">DEMO3</a>
			</div>            
        </div>

    </div>

	<div class="content">
    	<div class="cont-left">
        <img src="CAG1ED3K.jpg" style="float:left; margin:7px; width:90%" />
        </div>
        <div class="cont-mid">
            <fieldset>
            <legend align="center">REGISTRATION</legend>
            <form onsubmit="return valid();" method="post" action="registration.php" enctype="multipart/form-data">
            <table border="2">
            <tr>
            <td>FULL NAME</td>
            <td><input type="text" name="fname" id="fname" placeholder="Enter First Name" /></td>			            <td><input type="text" name="mname" id="mname" placeholder="Enter Middle Name" /></td>
            <td><input type="text" name="lname" id="lname" placeholder="Enter Last Name" /></td>
            </tr>
            
            <tr>
            <td>EMAIL-ID</td>
            <td><input type="text" name="email" id="email" placeholder="ENter Email" /></td>
            </tr>
            
            <tr>
            <td>PHONE</td>
            <td><input type="text" name="phone" id="phone" placeholder="Enter phone" /></td>
            </tr>
            
            <tr>
            <td>GENDER</td>
            <td><input type="radio" name="gender" id="male" value="MALE" />MALE
            <input type="radio" name="gender" id="female" value="FEMALE" />FEMALE</td>
            </tr>
            
            <tr>
            <td>DOB</td>
            <td><input type="date" name="date1" id="date1" /></td>
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
            <td><input type="checkbox" name="hobby[]" id="read" value="read" />READ
            <input type="checkbox" name="hobby[]" id="dance" value="dance" />DANCE
            <input type="checkbox" name="hobby[]" id="draw" value="draw" />DRAW
            <input type="checkbox" name="hobby[]" id="swim" value="swim" />SWIM</td>
            </tr>
            
            <tr>
          	<td>HEIGHT</td>
            <td><select name="height" id="height">
            <option value="">--SELECT HEIGHT--</option>
            <option value="4">4 FOOT</option>
            <option value="5">5 FOOT</option>
            <option value="6">6 FOOT</option>
            <option value="7">7 FOOT</option>
            </select></td>
            </tr>
            
      		<tr>
            <td>PASSWORD</td>
            <td><input type="password" name="pass" id="pass" /></td>
            </tr>
            
            <tr>
            <td>CONFIRM PASSWORD</td>
            <td><input type="password" name="cpass" id="cpass" /></td>
            </tr>
      
            <tr>
            <td>IMAGE</td>
            <td><input type="file" name="upload" id="upload" accept="image/gif,image/jpeg,image/jpg,image/png"/></td>
            </tr>
            
            <tr>
            <td colspan="4" align="center"><input type="submit" name="submit" value="REGISTER" /></td>
            </tr>
            
            </table>
            </form>
            </fieldset>
            
            <br/>
            <form method="post" action="Login.php">
            <table border="2">
            <tr>
            <td>Email Id</td>
            <td><input type="email" name="email" id="email" /></td> 
            </tr>
            
            <tr>
            <td>Phone No</td>
            <td><input type="password" name="pas" id="pas" /></td>
            </tr>
            
            <tr>
            <td colspan="2" align="center">
            <input type="submit" name="login" value="LOGIN" />
            </td>
            </tr>
            </table>
            </form>
            
			</div>          

        
        <div class="cont-right">
        <img src="CAEDT9G2.jpg" style="float:left; margin:7px; width:90%" />
            
        </div>
    </div>
    
	<footer>COPY RIGHT&copy;</footer>

</div>

</body>
</html>
