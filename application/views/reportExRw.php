<!--FORM FOR SUBMIT REPORT ON EXISTING ROADWORK-->

<script type="text/javascript">
	function validateRwReport(){
		var name=document.forms["rwReportForm"]["sender_name"].value;
		var email=document.forms["rwReportForm"]["sender_email"].value;
		var contact=document.forms["rwReportForm"]["sender_contact"].value;
		var rwork_cn=document.forms["rwReportForm"]["rwork_cn"].value;
		var message = document.getElementById('rw_report').value;
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
		/*Roadwork*/
		else if (rwork_cn==null || rwork_cn==""){
		  alert("Choose a roadwork from the list.");
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
    if($ongoing_rw == NULL){ ?>
            <center><?php echo '<br /><br /><br /><br />There are no existing roadworks.<br /><br />'; ?>
            </center>
            <?php
    }else{ ?>
       	
		<form id="rwReportForm" onsubmit="return validateRwReport()" action='<?php echo base_url() ?>index.php/logManager/submitRoadworkReport' method="post" style="margin-bottom: -50px;">
			<p id='report_header'>ROADWORK REPORT</p>
			<table style="width:100%;">
			<tr><td width="25%">Your Name:</td>
				<td><input type="text" name="sender_name" id="sender_name" maxlength="50" autofocus /></td></tr>

			<tr><td width="25%">Email address:</td> 
				<td><input type="text" name="sender_email" id="sender_email" maxlength="50" /></td></tr>

			<tr><td width="25%">Contact number:</td> 
				<td><input type="text" name="sender_contact" id="sender_contact" placeholder="09xxxxxxxxx" maxlength="20" /></td></tr>

			<tr><td>&nbsp;&nbsp;</td> 
				<td>&nbsp;&nbsp;</td></tr>

			<tr><td width="25%">Choose roadwork:</td>
				<td><select name="rwork_cn" id="rwork_cn" style="font-size: 14px;" ><br /><br />
					<option selected> </option>

				        <?php foreach($ongoing_rw as $row){
		            	?><option value="<?php echo $row['0']->contract_no ?>"> <?php echo $row['0']->rwork_name.' @ '.$row['0']->barangay; ?> </option>
		            	<?php } ?>

			        </select></td></tr>

			<tr><td width="25%">Comments:</td>
				<td><textarea name='rw_report' id='rw_report' maxlength="350"> </textarea><td></tr>

			</table>

			<center><input type="submit" class="lightboxSubmitBtn" value="SUBMIT REPORT" style="width:60%" ></center>
			</form>
       
<?php }?>