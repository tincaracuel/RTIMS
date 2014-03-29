<script type="text/javascript">
	function validateIncReport()
	{
	var name=document.forms["incReportForm"]["sender_name"].value;
	var email=document.forms["incReportForm"]["sender_email"].value;
	var contact=document.forms["incReportForm"]["sender_contact"].value;
	var inc_id=document.forms["incReportForm"]["inc_id"].value;
	var message = document.getElementById('inc_report').value;
	var atpos=email.indexOf("@");
	var dotpos=email.lastIndexOf(".");
	var alphaExp=/^[a-zA-Z ]+$/;
	var numExp=/^[0-9]+$/;


	/*First name*/
	if (name==null || name==""){
	  alert("Name must be filled out");
	  return false;
	}else if(name.length<3){
	  alert("Name must have at least 3 characters.");
	  return false;
	}else if(!name.match(alphaExp)){
	  alert("Name must be from A-Z.");
	  return false;
	}
	/*Email address*/
	else if (email==null || email==""){
	}
	else if (email!=null || email!=""){
	  if (atpos<1 || dotpos<atpos+2 || dotpos+2>=email.length){
	  alert("Not a valid e-mail address");
	  return false;
	  }
	}
	/*Contact Number*/
	if (contact==null || contact==""){
	   alert("Contact number must be filled out");
	  return false;
	}
	else if(!contact.match(numExp)){
	  alert("Contact number must not contain letters.");
	  return false;
	}
	/*Incident*/
	else if (inc_id==null || inc_id==""){
	  alert("Choose an incident from the list.");
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

<?php
    if($ongoing_inc == NULL){ ?>
            <center><?php echo '<br /><br /><br /><br />There are no ongoing activities.<br /><br />'; ?>
            </center>
            <?php
    }else{ ?>
       	<p id='report_header'>INCIDENT REPORT</p>
		<form id="incReportForm" onsubmit="return validateIncReport()" action='<?php echo base_url() ?>index.php/logManager/submitIncidentReport' method="post" style="margin-bottom: -50px;">
			
			<table style="width:100%;">
			<tr><td width="25%">Your Name:</td>
				<td><input type="text" name="sender_name" id="sender_name" maxlength="50" autofocus /></td></tr>

			<tr><td width="25%">Email address:</td> 
				<td><input type="text" name="sender_email" id="sender_email" maxlength="50" /></td></tr>

			<tr><td width="25%">Contact number:</td> 
				<td><input type="text" name="sender_contact" id="sender_contact" placeholder="09xxxxxxxxx" maxlength="20" /></td></tr>

			<tr><td>&nbsp;&nbsp;</td> 
				<td>&nbsp;&nbsp;</td></tr>

			<tr><td width="25%">Choose incident:</td>
				<td><select name="inc_id" id="inc_id" style="font-size: 14px;" ><br /><br />
					<option selected> </option>

				        <?php foreach($ongoing_inc as $row){
		            	?><option value="<?php echo $row['0']->inc_id ?>: <?php echo $row['0']->inc_type ?>"> <?php echo $row['0']->description.' @ '.$row['0']->barangay; ?> </option>
		            	<?php } ?>

			        </select></td></tr>


			<tr><td width="25%">Comments:</td>
				<td><textarea name='inc_report' id='inc_report' maxlength="350"> </textarea><td></tr>
			</table>
			<center><input type="submit" class="lightboxSubmitBtn" value="SUBMIT REPORT" style="width:50%"></center>
			</form>


       
<?php }?>