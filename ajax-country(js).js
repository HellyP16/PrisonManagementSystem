// JavaScript Document

function valid()
{
	var cname=document.getElementById("country").value;
	if(cname.length==0)
	{
		alert("Please Enter country");
		document.getElementById("country").focus();
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
	
