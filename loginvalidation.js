function validation()
{
	if(document.myform.userid.value=="")
	{
		alert("Plz provide UserID");
		document.myform.userid.focus();
		return false;
	}
	if(document.myform.pass.value=="")
	{
		alert("Plz provide Password");
		document.myform.pass.focus();
		return false;
	}
	return true;
	
}