CHOOSE A ROADWORK:<br /><br />
<select name="contractNumber" id="contractNumber">
<?php
$count = 0;

foreach ($roadwork as $entry) {
	$count += 1;
	echo "<option value=".$entry['contract_no'].">".$entry['contract_no']."</option>";
}

if($count == 0){
	echo "<option value='none'>--No roadwork selected--</option>";
	echo "<script type=\"text/javascript\">";
	//echo "$('#editButton2').attr('disabled',true);";
	//echo "$('#deleteButton2').attr('disabled',true);";
	//echo "$('#viewButton1').attr('disabled',true);";
	echo "</script>";
}
else{
	echo "<script type=\"text/javascript\">";
	//echo "$('#editButton2').attr('disabled',false);";
	//echo "$('#deleteButton2').attr('disabled',false);";
	//echo "$('#viewButton1').attr('disabled',false);";
	echo "</script>";
}

?>
</select>

<!--<script type="text/javascript">
	$("#cashierName").change(function(){
        $("#cashierDetails1").empty();
    });
</script>-->