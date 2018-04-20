// JavaScript Document
function valid()
{
	var cname=document.getElementById("country").selectedIndex;
	if(cname==0)
	{
		alert("Please Enter country");
		document.getElementById("country").focus();
		return false;
	}
	
	var sname=document.getElementById("state").selectedIndex;
	if(sname==0)
	{
		alert("Please Enter state");
		document.getElementById("state").focus();
		return false;
	}
	
	var cityname=document.getElementById("city").value;
	if(cityname.length==0)
	{
		alert("Please Enter city");
		document.getElementById("city").focus();
		return false;
	}

	var status=document.getElementById("status").selectedIndex;
	if(status==0)
	{
		alert("Select status");
		document.getElementById("status").focus();
		return false;
	}

	return true;
}
