<script>
    $(function(){   $( "#start2" ).datepicker();    });
	$(function(){   $( "#end2" ).datepicker();    });
	$(function(){   $('textarea').autosize();            }); 
</script>

<table style="width:100%;">
	<tr><td width="25%">Incident number:</td>
		<td><input type="text" name="in2" id='in2' value='<?php echo $details[0]['inc_id']; ?>' disabled="disabled"></td></tr>

	<tr><td width="25%">Classification:</td>
		<td><select name="type2" id="type2" required value='<?php echo $details[0]['inc_type']; ?>'><br /><br />
			<option value="Accident"	 <?php if ( $details[0]['inc_type'] == "Accident") 		{ ?> selected <?php } ?> >Accident </option>
			<option value="Obstruction"	 <?php if ( $details[0]['inc_type'] == "Obstruction") 	{ ?> selected <?php } ?> >Obstruction </option>
			<option value="Public Event" <?php if ( $details[0]['inc_type'] == "Public Event") 	{ ?> selected <?php } ?> >Public Event </option>
			<option value="Funeral"		 <?php if ( $details[0]['inc_type'] == "Funeral") 		{ ?> selected <?php } ?> >Funeral </option>
			<option value="Flood"		 <?php if ( $details[0]['inc_type'] == "Flood") 		{ ?> selected <?php } ?> >Flood </option>
			<option value="Strike"	     <?php if ( $details[0]['inc_type'] == "Strike") 		{ ?> selected <?php } ?> >Strike </option>
		</select></td></tr>

	<tr><td width="25%">Description:</td>
		<td><textarea name="desc2" id="desc2" maxlength="100" required><?php echo $details[0]['description']; ?></textarea></td></tr>

	</table>

	<table style="width:100%;">
	<tr><td width="33%" style="text-align:center;">Start date</td>
		<td width="33%" style="text-align:center;">End date</td>
		<td width="33%" style="text-align:center;">Progress/Status</td>
	</tr>

	<tr><td width="33%" style="text-align:center;"><input type="text" name="start2" id="start2" value='<?php echo $details[0]['start_date']; ?>' style="width:  120px; font-size: 16px; text-align:center;" required /></td>
		<td width="33%" style="text-align:center;"><input type="text" name="end2" id="end2" value='<?php if ($details[0]['end_date'] != '0000-00-00') echo $details[0]['end_date']; ?>'style="width: 120px; font-size: 16px; text-align:center;" /></td>
		<td width="33%" style="text-align:center;"><input type="number" name="status2" id="status2" min="0" max="100" style="width: 100px; font-size: 16px; text-align:center;" value='<?php echo $details[0]['status']; ?>' required /></td>
	</tr>
	</table>


	<br />
	<center> <b>LOCATION DETAILS</center></b><br />
	<table style="width:100%;">
		<tr><td width="25%">Street:</td>
			<td><input type="text" name="street2" id="street2"  maxlength="50" value='<?php echo $details[0]['street']; ?>' required /></td></tr>

	<tr><td width="25%">Barangay:</td>
		<td><select name="brgy2" id="brgy2"  required value='<?php echo $details[0]['barangay']; ?>'>
			<option value="Bagong Kalsada"	 		<?php if ( $details[0]['barangay'] == "Bagong Kalsada") 		{ ?> selected <?php } ?> >Bagong Kalsada </option>
			<option value="Banadero"	 			<?php if ( $details[0]['barangay'] == "Bańadero") 				{ ?> selected <?php } ?> >Bańadero </option>
			<option value="Banlic"		 			<?php if ( $details[0]['barangay'] == "Banlic") 				{ ?> selected <?php } ?> >Banlic </option>
			<option value="Barandal"		 		<?php if ( $details[0]['barangay'] == "Barandal") 				{ ?> selected <?php } ?> >Barandal </option>
			<option value="Barangay 1"		 		<?php if ( $details[0]['barangay'] == "Barangay 1") 			{ ?> selected <?php } ?> >Barangay 1 </option>
			<option value="Barangay 2"	 			<?php if ( $details[0]['barangay'] == "Barangay 2") 			{ ?> selected <?php } ?> >Barangay 2 </option>
			<option value="Barangay 3"	 			<?php if ( $details[0]['barangay'] == "Barangay 3") 			{ ?> selected <?php } ?> >Barangay 3 </option>
			<option value="Barangay 4"	 			<?php if ( $details[0]['barangay'] == "Barangay 4") 			{ ?> selected <?php } ?> >Barangay 4 </option>
			<option value="Barangay 5"	 			<?php if ( $details[0]['barangay'] == "Barangay 5") 			{ ?> selected <?php } ?> >Barangay 5 </option>
			<option value="Barangay 6"	 			<?php if ( $details[0]['barangay'] == "Barangay 6") 			{ ?> selected <?php } ?> >Barangay 6 </option>
			<option value="Barangay 7"	 			<?php if ( $details[0]['barangay'] == "Barangay 7") 			{ ?> selected <?php } ?> >Barangay 7 </option>
			<option value="Batino"	 				<?php if ( $details[0]['barangay'] == "Batino") 				{ ?> selected <?php } ?> >Batino </option>
			<option value="Bubuyan"	 				<?php if ( $details[0]['barangay'] == "Bubuyan") 				{ ?> selected <?php } ?> >Bubuyan </option>
			<option value="Bucal"	 				<?php if ( $details[0]['barangay'] == "Bucal") 					{ ?> selected <?php } ?> >Bucal </option>
			<option value="Bungo"	 				<?php if ( $details[0]['barangay'] == "Bungo") 					{ ?> selected <?php } ?> >Bungo </option>
			<option value="Burol"	 				<?php if ( $details[0]['barangay'] == "Burol") 					{ ?> selected <?php } ?> >Burol </option>
			<option value="Camaligan"	 			<?php if ( $details[0]['barangay'] == "Camaligan") 				{ ?> selected <?php } ?> >Camaligan </option>
			<option value="Canlubang"	 			<?php if ( $details[0]['barangay'] == "Canlubang") 				{ ?> selected <?php } ?> >Canlubang </option>
			<option value="Halang"	 				<?php if ( $details[0]['barangay'] == "Halang") 				{ ?> selected <?php } ?> >Halang </option>
			<option value="Hornalan"	 			<?php if ( $details[0]['barangay'] == "Hornalan") 				{ ?> selected <?php } ?> >Hornalan </option>
			<option value="Kay-Anlog"				<?php if ( $details[0]['barangay'] == "Kay-Anlog") 				{ ?> selected <?php } ?> >Kay-Anlog </option>
			<option value="La Mesa"					<?php if ( $details[0]['barangay'] == "La Mesa") 				{ ?> selected <?php } ?> >La Mesa</option>
			<option value="Laguerta"	 			<?php if ( $details[0]['barangay'] == "Laguerta") 				{ ?> selected <?php } ?> >Laguerta </option>
			<option value="Lawa"	 				<?php if ( $details[0]['barangay'] == "Lawa") 					{ ?> selected <?php } ?> >Lawa </option>
			<option value="Lecheria"	 			<?php if ( $details[0]['barangay'] == "Lecheria") 				{ ?> selected <?php } ?> >Lecheria </option>
			<option value="Lingga"	 				<?php if ( $details[0]['barangay'] == "Lingga") 				{ ?> selected <?php } ?> >Lingga </option>
			<option value="Looc"	 				<?php if ( $details[0]['barangay'] == "Looc") 					{ ?> selected <?php } ?> >Looc </option>
			<option value="Mabato"	 				<?php if ( $details[0]['barangay'] == "Mabato") 				{ ?> selected <?php } ?> >Mabato </option>
			<option value="Majada"	 				<?php if ( $details[0]['barangay'] == "Majada") 				{ ?> selected <?php } ?> >Majada </option>
			<option value="Makiling"	 			<?php if ( $details[0]['barangay'] == "Makiling") 				{ ?> selected <?php } ?> >Makiling </option>
			<option value="Mapagong"	 			<?php if ( $details[0]['barangay'] == "Mapagong") 				{ ?> selected <?php } ?> >Mapagong </option>
			<option value="Masili"	 				<?php if ( $details[0]['barangay'] == "Masili") 				{ ?> selected <?php } ?> >Masili </option>
			<option value="Maunong"	 				<?php if ( $details[0]['barangay'] == "Maunong") 				{ ?> selected <?php } ?> >Maunong </option>
			<option value="Mayapa"	 				<?php if ( $details[0]['barangay'] == "Mayapa") 				{ ?> selected <?php } ?> >Mayapa </option>
			<option value="Paciano"	 				<?php if ( $details[0]['barangay'] == "Paciano") 				{ ?> selected <?php } ?> >Paciano </option>
			<option value="Palingon"	 			<?php if ( $details[0]['barangay'] == "Palingon") 				{ ?> selected <?php } ?> >Palingon </option>
			<option value="Palo Alto"	 			<?php if ( $details[0]['barangay'] == "Palo Alto") 				{ ?> selected <?php } ?> >Palo Alto </option>
			<option value="Pansol"	 				<?php if ( $details[0]['barangay'] == "Pansol") 				{ ?> selected <?php } ?> >Pansol </option>
			<option value="Parian"	 				<?php if ( $details[0]['barangay'] == "Parian") 				{ ?> selected <?php } ?> >Parian </option>
			<option value="Prinza"	 				<?php if ( $details[0]['barangay'] == "Prinza") 				{ ?> selected <?php } ?> >Prinza </option>
			<option value="Punta"	 				<?php if ( $details[0]['barangay'] == "Punta") 					{ ?> selected <?php } ?> >Punta </option>
			<option value="Puting Lupa"	 			<?php if ( $details[0]['barangay'] == "Puting Lupa") 			{ ?> selected <?php } ?> >Puting Lupa </option>
			<option value="Real"	 				<?php if ( $details[0]['barangay'] == "Real") 					{ ?> selected <?php } ?> >Real </option>
			<option value="Saimsim"	 				<?php if ( $details[0]['barangay'] == "Saimsim") 				{ ?> selected <?php } ?> >Saimsim </option>
			<option value="Sampiruhan"	 			<?php if ( $details[0]['barangay'] == "Sampiruhan") 			{ ?> selected <?php } ?> >Sampiruhan </option>
			<option value="San Cristobal"			<?php if ( $details[0]['barangay'] == "San Cristobal") 			{ ?> selected <?php } ?> >San Cristobal </option>
			<option value="San Jose"	 			<?php if ( $details[0]['barangay'] == "San Jose") 				{ ?> selected <?php } ?> >San Jose </option>
			<option value="San Juan"	 			<?php if ( $details[0]['barangay'] == "San Juan") 				{ ?> selected <?php } ?> >San Juan </option>
			<option value="Sirang Lupa"	 			<?php if ( $details[0]['barangay'] == "Sirang Lupa") 			{ ?> selected <?php } ?> >Sirang Lupa </option>
			<option value="Sucol"	 				<?php if ( $details[0]['barangay'] == "Sucol") 					{ ?> selected <?php } ?> >Sucol </option>
			<option value="Tulo"	 				<?php if ( $details[0]['barangay'] == "Tulo") 					{ ?> selected <?php } ?> >Tulo </option>
			<option value="Turbina"	 				<?php if ( $details[0]['barangay'] == "Turbina") 				{ ?> selected <?php } ?> >Turbina </option>
			<option value="Ulango"	 				<?php if ( $details[0]['barangay'] == "Ulango") 				{ ?> selected <?php } ?> >Ulango </option>
			<option value="Uwisan"	 				<?php if ( $details[0]['barangay'] == "Uwisan") 				{ ?> selected <?php } ?> >Uwisan </option>
	</select>
	</td></tr>

	<tr><td width="25%">Coordinates:</td>
	 	<td>(<input type="text" name="lat2" id='lat2' maxlength='20' value='<?php echo $details[0]['latitude']; ?>' >, 
	<input type="text" name="long2" id='long2' maxlength='20' value='<?php echo $details[0]['longitude']; ?>' />)</td></tr>
		
	</table>

	<br /> <br />
	<center>
	<input type="button" name="editIncident2" class="lightboxSubmitBtn" id="editIncBtn2" value="SAVE CHANGES" onclick='javascript:editSelectedIncident();'>
	</center>
	<br />