// JavaScript Document
function valid()
{
	var cname=document.getElementById("country").selectedIndex;
	if(cname==0)
	{
		alert("Select country");
		document.getElementById("country").focus();
		return false;
	}
	
	var sname=document.getElementById("state").value;
	if(sname.length==0)
	{
		alert("Please Enter state");
		document.getElementById("state").focus();
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
	
