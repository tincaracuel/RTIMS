<script>
    $(function(){	$('textarea').autosize();    });
    $(function(){   $( "#start2" ).datepicker();    });
	$(function(){   $( "#end2" ).datepicker();    });

	$(document).ready(function(){
	$("#show_map_btn").click(function(){ //
		$("#show_map_div").fadeIn(500);
	});
});
</script>

<form class="addRoadwork" action='<?php echo base_url() ?>index.php/roadworksManager/addRoadwork' method='post'>
Contract number:&nbsp;  &nbsp;
<input type="text" name="cn2" id='cn2' value='<?php echo $details[0]['contract_no']; ?>' disabled="disabled"><br />

Roadwork name: &nbsp;  &nbsp; 
<input type="text" name="rwork_name2" id='rwork_name2' value='<?php echo $details[0]['rwork_name']; ?>' required ><br />

Classification: &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;
	<select name="type2" id="type2" required value='<?php echo $details[0]['rwork_type']; ?>'><br /><br />
		<option value="Construction"	 		<?php if ( $details[0]['rwork_type'] == "Construction") 		{ ?> selected <?php } ?> >Construction </option>
		<option value="Rehabilitation"	 		<?php if ( $details[0]['rwork_type'] == "Rehabilitation") 		{ ?> selected <?php } ?> >Rehabilitation </option>
		<option value="Renovation"		 		<?php if ( $details[0]['rwork_type'] == "Renovation") 			{ ?> selected <?php } ?> >Renovation </option>
		<option value="Riprapping"		 		<?php if ( $details[0]['rwork_type'] == "Riprapping") 			{ ?> selected <?php } ?> >Riprapping </option>
		<option value="Application"		 		<?php if ( $details[0]['rwork_type'] == "Application") 			{ ?> selected <?php } ?> >Application </option>
		<option value="Installation"	 		<?php if ( $details[0]['rwork_type'] == "Installation") 		{ ?> selected <?php } ?> >Installation </option>
		<option value="Reconstruction"	 		<?php if ( $details[0]['rwork_type'] == "Reconstruction") 		{ ?> selected <?php } ?> >Reconstruction </option>
		<option value="Concreting/Asphalting" 	<?php if ( $details[0]['rwork_type'] == "Concreting/Asphalting"){ ?> selected <?php } ?> >Concreting/Asphalting </option>
		<option value="Electrification"	 		<?php if ( $details[0]['rwork_type'] == "Electrification") 		{ ?> selected <?php } ?> >Electrification </option>
		<option value="Roadway Lighting" 		<?php if ( $details[0]['rwork_type'] == "Roadway Lighting")		{ ?> selected <?php } ?>>Roadway Lighting </option>
	</select><br /><br />

Description:
<textarea name="desc2" id="desc2" required><?php echo $details[0]['description']; ?></textarea><br /><br />

&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;Start date &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
End date &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
Progress/Status<br />
&nbsp; 
<input type="text" name="start2" id="start2" value='<?php echo $details[0]['start_date']; ?>' style="width:  120px; font-size: 16px; text-align:center;" required /> -
<input type="text" name="end2" id="end2" value='<?php if ($details[0]['end_date'] != '0000-00-00') echo $details[0]['end_date']; ?>'style="width: 120px; font-size: 16px; text-align:center;" />
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

<input type="number" name="status2" id="status2" min="0" max="100" style="width: 100px; font-size: 16px; text-align:center;" value='<?php echo $details[0]['status']; ?>' required /><br /><br />

<center> <b>LOCATION DETAILS</center></b><br />
Street: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
<input type="name" name="street2" id="street2"  value='<?php echo $details[0]['street']; ?>' required /> <br />

Barangay: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
<select name="brgy2" id="brgy2"  required value='<?php echo $details[0]['barangay']; ?>'>
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
<br />

Map Coordinates: &nbsp;  &nbsp; (<input type="text" name="lat2" id='lat2' style="width: 160px; border: 0px solid;" value='<?php echo $details[0]['latitude']; ?>' >, 
<input type="text" name="long2" id='long2' style="width: 160px; border: 0px solid;" value='<?php echo $details[0]['longitude']; ?>' />)
<br />


<br /> <br />
<center>
<input type="button" name="editRoadwork2" class="lightboxSubmitBtn" id="editRwBtn2" value="SAVE CHANGES" onclick='javascript:editSelectedRoadwork();'>
</center>