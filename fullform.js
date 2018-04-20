// JavaScript Document
function valid()
{
	var fname=document.getElementById("fname").value;
	if(fname.length==0)
	{
		alert("Please Enter Fname");
		document.getElementById("fname").focus();
		return false;
	}
	
	if(fname.length>0)
	{
		var r=/[^A-Za-z]/;
		if(fname.match(r)!=null)
		{
			alert("Enter Only Characters");
			document.getElementById("fname").focus();
			return false;
		}
	}
	
	var mname=document.getElementById("mname").value;
	if(mname.length==0)
	{
		alert("Please Enter Mname");
		document.getElementById("mname").focus();
		return false;
	}
	
	if(mname.length>0)
	{
		var r=/[^A-Za-z]/;
		if(mname.match(r)!=null)
		{
			alert("Enter Only Characters");
			document.getElementById("mname").focus();
			return false;
		}
	}


	var lname=document.getElementById("lname").value;
	if(lname.length==0)
	{
		alert("Please Enter lname");
		document.getElementById("lname").focus();
		return false;
	}
	

	if(lname.length>0)
	{
		var r=/[^A-Za-z]/;
		if(lname.match(r)!=null)
		{
			alert("Enter Only Characters");
			document.getElementById("lname").focus();
			return false;
		}
	}

	var email=document.getElementById("email").value;
	if(email.length==0)
	{
		alert("Enter Email Id");
		document.getElementById("email").focus();
		return false;
	}
	
	if(email.length>0)
	{
		var r=/^[a-z0-9._]+@[a-z]+\.[a-z]{2,3}$|\.[a-z]{2}$/;
		if(email.match(r)==null)
		{
			alert("Enter Valid Email ID");
			document.getElementById("email").focus();
			return false;
		}
	}
	
	var phone=document.getElementById("phone").value;
	if(phone.length==0)
	{
		alert("Please Insert Your Num");
		document.getElementById("phone").focus();
		return false;
	}
	
	
	if(phone.length>0)
	{
		var r=/^\d{10}$/;
		if(phone.match(r)==null)
		{
			alert("This Dield Accepts only 10 digits");
			document.getElementById("phone").focus();
			return false;
		}
	}
	
	var male=document.getElementById("male").checked;
	var female=document.getElementById("female").checked;
	if((male==false) && (female==false))
	{
		alert("Please Select Atleast One Gender");
		document.getElementById("male").focus();
		return false;
	}
	
	var dob=document.getElementById("date1").value;
	if(dob.length==0)
	{
		alert("Please Enter birth date");
		document.getElementById("date1").focus();
		return false;
	}

	
	var country=document.getElementById("country").selectedIndex;
	if(country==0)
	{
		alert("Select country");
		document.getElementById("country").focus();
		return false;
	}
	
	var state=document.getElementById("state").selectedIndex;
	if(state==0)
	{
		alert("Select state");
		document.getElementById("state").focus();
		return false;
	}
	
	var city=document.getElementById("city").selectedIndex;
	if(city==0)
	{
		alert("Select city");
		document.getElementById("city").focus();
		return false;
	}
	
	var area=document.getElementById("area").value;
	if(area.length==0)
	{
		alert("Enter Area");
		document.getElementById("area").focus();
		return false;
	}
	
	var read=document.getElementById("read").checked;
	var dance=document.getElementById("dance").checked;
	var swim=document.getElementById("swim").checked;
	var draw=document.getElementById("draw").checked;
	if((read==false) && (dance==false) && (swim==false) && (draw==false))
	{
		alert("Select Atleast One Hobby");
		document.getElementById("read").focus();
		return false;
	}
	
	var height=document.getElementById("height").selectedIndex;
	if(height==0)
	{
		alert("Select Height");
		document.getElementById("height").focus();
		return false;
	}
	
	var pass=document.getElementById("pass").value;
	var cpass=document.getElementById("cpass").value;
	
	if(pass.length==0)
	{
		alert("Please Enter password");
		document.getElementById("pass").focus();
		return false;
	}
	
	if(pass.length>0)
	{
		var f=/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%&*+]).{6,15}$/;
		if(pass.match(f)==null)
		{
			alert("Please Enter atleast one lowercase char"+"\n"+"atlease one UPPERCASE char"+"\n"+"Atleast one special char(!@#$%^&*+)"+"\n"+"password length 6 to 15 char");
			document.getElementById("pass").focus();
			return false;
		}
		
		if(pass.match(f)!=null)
		{
			if(pass!=cpass)
			{
				alert("Entered password is not correct");
				document.getElementById("cpass").focus();
				return false;
			}
		}
	}
	
	
	
	

	var file=document.getElementById("upload").value;
	if(file==0)
	{
		alert("Select Image File");
		document.getElementById("upload").focus();
		return false;
	}

	
	return true;
}