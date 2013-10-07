Contract number:&nbsp;  &nbsp;
<input type="text" name="cn2" id='cn2' value='<?php echo $details[0]['contract_no']; ?>' disabled="disabled"><br />

Roadwork name: &nbsp;  &nbsp; 
<input type="text" name="rwork_name2" id='rwork_name2' value='<?php echo $details[0]['rwork_name']; ?>' ><br />

Classification: &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; 
	<select name="type2" id="type2" required value='<?php echo $details[0]['rwork_type']; ?>'><br /><br />
		<option value="Construction"	 <?php if ( $details[0]['rwork_type'] == "Construction") 	{ ?> selected <?php } ?> >Construction </option>
		<option value="Rehabilitation"	 <?php if ( $details[0]['rwork_type'] == "Rehabilitation") 	{ ?> selected <?php } ?> >Rehabilitation </option>
		<option value="Renovation"		 <?php if ( $details[0]['rwork_type'] == "Renovation") 		{ ?> selected <?php } ?> >Renovation </option>
		<option value="Riprapping"		 <?php if ( $details[0]['rwork_type'] == "Riprapping") 		{ ?> selected <?php } ?> >Riprapping </option>
		<option value="Application"		 <?php if ( $details[0]['rwork_type'] == "Application") 	{ ?> selected <?php } ?> >Application </option>
		<option value="Installation"	 <?php if ( $details[0]['rwork_type'] == "Installation") 	{ ?> selected <?php } ?> >Installation </option>
		<option value="Reconstruction"	 <?php if ( $details[0]['rwork_type'] == "Reconstruction") 	{ ?> selected <?php } ?> >Reconstruction </option>
		<option value="Concreting"		 <?php if ( $details[0]['rwork_type'] == "Concreting")		{ ?> selected <?php } ?> >Concreting/Asphalting </option>
		<option value="Electrification"	 <?php if ( $details[0]['rwork_type'] == "Electrification") { ?> selected <?php } ?> >Electrification </option>
		<option value="Roadway Lighting" <?php if ( $details[0]['rwork_type'] == "Roadway Lighting"){ ?> selected <?php } ?>>Roadway Lighting </option?
	</select><br />

Description:&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br />
<textarea name="desc2" id="desc2" required><?php echo $details[0]['description']; ?></textarea><br /><br />

&nbsp; &nbsp;Start date &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;End date &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Progress/Status<br />
<input type="text" name="start2" id="start2" value='<?php echo $details[0]['start_date']; ?>' style="width: 78px; font-size: 14px; text-align:center;" required /> -
<input type="text" name="end2" id="end2" value='<?php echo $details[0]['end_date']; ?>'style="width:78px; font-size: 14px; text-align:center;" />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

<input type="number" name="status2" id="status2" min="0" max="100" value='<?php echo $details[0]['status']; ?>' required /><br /><br />

Location: &nbsp;
<?php if($details[0]['street']!=NULL) echo $details[0]['street'].', '; ?>
<?php echo $details[0]['barangay'].'<br /><small>( '.$details[0]['latitude'].' , '.$details[0]['longitude'].' )</small>'; ?><br />

<br />

<input type="button" name="editRoadwork2" class="edit_delete_input_btn" id="editRwBtn2" value="SAVE CHANGES" onclick='javascript:editSelectedRoadwork();'>