function criminalvalidation()
{
	
	if(document.addformC.cage.value<18)
	{
		alert("Age must be atleast 18");
		document.addformC.cage.focus();
		
		return false;
	}
	
	if(document.addformC.ccnic.value.length!=13)
	{
		alert("invalid CNIC");
		
		return false;
	}
	if(document.addformC.cphone.value.length!=13)
	{
		alert("invalid Cell Number");
		document.addformC.cphone.focus();
		
		return false;
	}
	if(document.addformC.cid.value.length!=4)
	{
		alert("Criminal ID lenght must be 4");
		document.addformC.cid.focus();
		
		return false;
	}
	
}


function prisonvalidation()
{
	if(document.formprison.pid.value.length!=4)
	{
		alert("Prison ID Must be of Lenght 4");
		document.formprison.pid.focus();
		return false;
	}
}
