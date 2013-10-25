<script type="text/javascript">
	function validateReportForm()
	{
	var name=document.forms["reportForm"]["sender_name"].value;
	var email=document.forms["reportForm"]["sender_email"].value;
	var subject=document.forms["reportForm"]["subject"].value;
	var message = document.getElementById('report').value;
	var atpos=email.indexOf("@");
	var dotpos=email.lastIndexOf(".");
	var alphaExp=/^[a-zA-Z ]+$/;

	/*First name*/
	if (name==null || name==""){
	  alert("Name must be filled out");
	  return false;
	}else if(name.length<3){
	  alert("Name must have at least 3 characters.");
	  return false;
	}else if(!name.match(alphaExp)){
	  alert("Name must be from A-Z");
	  return false;
	}
	/*Email address*/
	else if (email==null || email==""){
	  alert("Email address must be filled out");
	  return false;
	}else if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length){
	  alert("Not a valid e-mail address");
	  return false;
	}
	/*Subject*/
	else if (subject==null || subject==""){
	  alert("Subject must be filled out");
	  return false;
	}
	/*Message*/
	else if (/^\s*$/g.test(message) || message.indexOf('\n') != -1) {
        alert('Enter your comment or message');
        return false;
    }else if (message.length<10) {
        alert('Comment or message must have at least 10 characters.');
        return false;
    }

	

}
</script>

<p id='report_header'>REPORT A PROBLEM</p>
<form id="reportForm" onsubmit="return validateReportForm()" action='<?php echo base_url() ?>index.php/logManager/submitNewReport' method="post" style="margin-bottom: -50px;">
	<table style="width:100%">
	<tr><td width="25%">Your Name:</td>
		<td><input type="text" name="sender_name" id="sender_name" maxlength="50" autofocus /></td></tr>

	<tr><td width="25%">Email address:</td> 
		<td><input type="text" name="sender_email" id="sender_email" maxlength="50" /></td></tr>

	<tr><td>&nbsp;&nbsp;</td> 
		<td>&nbsp;&nbsp;</td></tr>

	<tr><td width="25%">Subject:</td>
		<td><input type="text" name="subject" id="subject" maxlength="50" /></td></tr>


	<tr><td width="25%">Comments:</td>
		<td><textarea name='report' id='report' maxlength="350"> </textarea><td></tr>
	</table>
	<center><input type="submit" class="lightboxSubmitBtn"value="SUBMIT REPORT" style="width:50%"></center>
</form>
